<!DOCTYPE HTML>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ trans('auth/login.title') }} | Laravel Store</title>
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Ubuntu+Condensed">

        <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <h1><a href="/">Laravel Store</a></h1>
            </div><!-- /.login-logo -->

            <div class="login-box-body">
                <form action="/admin/login" method="post">
                    @if (session()->has('error'))
                        @include('partials/error', [
                            'type' => 'danger',
                            'message' => session('error')
                        ]);
                    @endif

                    <div class="form-group has-feedback">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" name="password" class="form-control" placeholder="{{ trans('auth/login.password') }}">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-8"></div>
                        <div class="col-xs-4">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-primary btn-block btn-flat">
                                {{ trans('auth/login.login') }}
                            </button>
                        </div>
                    </div>
                </form>

            </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->

        <script src="{{ asset('assets/js/login.js') }}"></script>
    </body>
</html>

