var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.styles([
        'front/easy-responsive-tabs.css',
        'front/etalage.css',
        'front/style.css'
    ], 'public/assets/css/front.css');

    mix.styles([
        'back/bootstrap.min.css',
        'back/font-awesome.min.css',
        'back/ionicons.min.css',
        'back/AdminLTE.min.css',
        'back/_all-skins.min.css',
        'back/blue.css',
        'back/morris.css',
        'back/jquery-jvectormap-1.2.2.css',
        'back/datepicker3.css',
        'back/daterangepicker-bs3.css',
        'back/bootstrap3-wysihtml5.min.css'
    ], 'public/assets/css/back.css');

    mix.styles([
        'back/bootstrap.min.css',
        'back/font-awesome.min.css',
        'back/ionicons.min.css',
        'back/AdminLTE.min.css',
        'back/blue.css',
        'back/style.css'
    ], 'public/assets/css/login.css');

    mix.scripts([
        'front/jquery-1.9.0.min.js',
        'front/jquery.openCarousel.js',
        'front/easing.js',
        'front/move-top.js',
        'front/navigation.js',
        'front/script.js'
    ], 'public/assets/js/front.js');

    mix.scripts([
        'back/jQuery-2.1.4.min.js',
        'back/tether.js',
        'back/bootstrap.min.js',
        'back/icheck.min.js',
        'back/auth.js'
    ], 'public/assets/js/login.js');

    mix.scripts([
        'back/tether.js',
        'back/jQuery-2.1.4.min.js',
        'back/jquery-ui.min.js',
        'back/bootstrap.min.js',
        'back/raphael.min.js',
        'back/morris.min.js',
        'back/jquery.sparkline.min.js',
        'back/jquery-jvectormap-1.2.2.min.js',
        'back/jquery-jvectormap-world-mill-en.js',
        'back/jquery.knob.js',
        'back/moment.min.js',
        'back/daterangepicker.js',
        'back/bootstrap-datepicker.js',
        'back/bootstrap3-wysihtml5.all.min.js',
        'back/jquery.slimscroll.min.js',
        'back/fastclick.min.js',
        'back/app.min.js',
        'back/dashboard.js',
        'back/demo.js',
        'back/script.js'
    ], 'public/assets/js/back.js');
});
