<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Website CSS style -->
        <link rel="stylesheet" type="text/css" href="{{ elixir('css/main.css') }}">
        <link rel="stylesheet" href="{{ elixir('css/lib/main.css') }}" />

        <!-- Google Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

        <title>Repo Details</title>
    </head>
    <body>
    <div class="container">
        <div class="row main">
            <div class="col col-md-12">
                <a target="_blank" href="{{ $repoInformation['url'] }}">
                    <h1>Repo Details - {{ $repoInformation['name'] }}</h1>
                </a>
                <ul>
                    @foreach($repoInformation['commits'] as $commit)
                        <li>
                            <a target="_blank" href="{{ $commit['url'] }}"><h3>{{ $commit['message'] }}</h3></a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="{{ elixir('js/lib/main.js') }}"></script>
    </body>
</html>