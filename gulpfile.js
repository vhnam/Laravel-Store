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

    mix.scripts([
        'front/jquery-1.9.0.min.js',
        'front/jquery.openCarousel.js',
        'front/easing.js',
        'front/move-top.js',
        'front/navigation.js',
        'front/script.js'
    ], 'public/assets/js/front.js');
});
