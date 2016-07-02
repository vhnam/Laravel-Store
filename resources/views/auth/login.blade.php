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
                <a href="/">
                    <h1>Laravel Store</h1>
                </a>
            </div><!-- /.login-logo -->

            <div class="login-box-body">
                <form action="login" method="post">
                    <div class="form-group has-feedback">
                        <input type="email" class="form-control" placeholder="Email">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="{{ trans('auth/login.password') }}">
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

