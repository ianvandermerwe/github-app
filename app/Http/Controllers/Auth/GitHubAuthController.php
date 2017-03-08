<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\GithubLoginRequest;
use GrahamCampbell\GitHub\GitHubManager;

class GitHubAuthController extends Controller
{
    protected $gitHubManager;

    /**
     * GitHubAuthController constructor.
     *
     * @param GitHubManager $gitHubManager
     */
    public function __construct(GitHubManager $gitHubManager)
    {
        $this->gitHubManager = $gitHubManager;
    }

    public function loadLogin()
    {
        if(session()->get('user_email') != null && session()->get('user_password') != null)
        {
            $this->gitHubManager->authenticate(session()->get('user_email'),session()->get('user_password'));

            return $this->fetchRepoInformation();
        }

        return view('login');
    }

    public function postLogin(GithubLoginRequest $request)
    {
        session()->put('user_email',$request->get('email'));
        session()->put('user_password',$request->get('password'));

        $this->gitHubManager->authenticate($request->get('email'),$request->get('password'));

        $this->fetchRepoInformation();
    }

    public function fetchRepoInformation()
    {
        $repositoriesArray = $this->gitHubManager->me()->repositories();
        $user = (object) $this->gitHubManager->currentUser()->show();

        $count = count($repositoriesArray) - 1;
        $randomRepo = (object) $repositoriesArray[rand(0,$count)];

        $commitObj = $this->gitHubManager->repo()->commits()->all($user->login, $randomRepo->name,[]);

        $commitMessage1 = array_pop($commitObj)['commit']['message'];
        $commitMessage1Url = array_pop($commitObj)['html_url'];

        $commitMessage2 = array_pop($commitObj)['commit']['message'];
        $commitMessage2Url = array_pop($commitObj)['html_url'];

        $commitMessage3 = array_pop($commitObj)['commit']['message'];
        $commitMessage3Url = array_pop($commitObj)['html_url'];

        $repoInformation = [
            'name' => $randomRepo->full_name,
            'url' => $randomRepo->html_url,
            'commits' => [
                [
                    'message' => $commitMessage1,
                    'url' => $commitMessage1Url
                ],
                [
                    'message' => $commitMessage2,
                    'url' => $commitMessage2Url
                ],
                [
                    'message' => $commitMessage3,
                    'url' => $commitMessage3Url
                ],
            ]
        ];

        return view('repo_details', compact('repoInformation'));
    }
}
