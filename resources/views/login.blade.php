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

        <title>Admin</title>
    </head>
    <body>
    <div class="container">
        <div class="row main">
            <div class="panel-heading">
                <div class="panel-title text-center">
                    <h1 class="title">Login</h1>
                </div>
            </div>
            <div class="main-login main-center">
                <form class="form-horizontal" action="{{ action('Auth\GitHubAuthController@postLogin') }}" method="POST">
                    {{ csrf_field() }}
                    <p>Your login details for GitHub</p>

                    <div class="form-group">
                        <label for="email" class="cols-sm-2 control-label ">Email</label>
                        <div class="cols-sm-10">
                            <div class="input-group {{ $errors->first('email') ? 'has-error' : '' }}">
                                <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
                            </div>
                            @if($errors->first('email'))<p class="error">{{ $errors->first('email') }}</p>@endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="cols-sm-2 control-label">Password</label>
                        <div class="cols-sm-10">
                            <div class="input-group {{ $errors->first('password') ? 'has-error' : '' }}">
                                <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                <input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
                            </div>
                            @if($errors->first('password'))<p class="error">{{ $errors->first('password') }}</p>@endif
                        </div>
                    </div>

                    <div class="form-group ">
                        <button type="submit" class="btn btn-primary btn-lg btn-block login-button">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="{{ elixir('js/lib/main.js') }}"></script>
    </body>
</html>