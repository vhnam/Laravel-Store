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

    // Front-End
    mix.styles([
        'front/easy-responsive-tabs.css',
        'front/etalage.css',
        'front/style.css'
    ], 'public/assets/css/front.css');

    mix.scripts([
        'front/jquery-1.9.0.min.js',
        'front/jquery.openCarousel.js',
        'front/easing.js',
        'front/move-top.js',
        'front/navigation.js',
        'front/script.js'
    ], 'public/assets/js/front.js');

    // Back-End
    mix.styles([
        'back/bootstrap.min.css',
        'back/font-awesome.min.css',
        'back/metisMenu.min.css',
        'back/timeline.css',
        'back/jquery.datatables.min.css',
        'back/sb-admin-2.css',
        'back/custom.css'
    ], 'public/assets/css/back.css');

    mix.scripts([
        'back/jquery.min.js',
        'back/bootstrap.min.js',
        'back/metisMenu.min.js',
        'back/jquery.datatables.min.js',
        'back/sb-admin-2.js',
        'back/script.js'
    ], 'public/assets/js/back.js');
});
