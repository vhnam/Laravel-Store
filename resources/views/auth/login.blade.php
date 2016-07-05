<!DOCTYPE HTML>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ trans('auth/login.title') }} | Laravel Store</title>
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Ubuntu+Condensed">

        <link rel="stylesheet" href="{{ asset('assets/css/back.css') }}">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h1 class="panel-title">
                                <a href="/">Laravel Store</a>
                            </h1>
                        </div>
                        <div class="panel-body">
                            @if (session()->has('error'))
                                @include('partials/error', [
                                    'type' => 'danger',
                                    'message' => session('error')
                                ]);
                            @endif

                            <form action="/admin/login" method="post" role="form">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="{{ trans('auth/login.password') }}" name="password" type="password">
                                    </div>
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-lg btn-success btn-block">
                                        {{ trans('auth/login.login') }}
                                    </button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="{{ asset('assets/js/back.js') }}"></script>
    </body>
</html>

