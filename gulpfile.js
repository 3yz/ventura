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
    mix.scripts([
        "vendor/jquery.js",
        "plugins.js",
        "app.js"
    ], 'public/js/all.js')
    .scripts(['checklist.js'], 'public/js/checklist.js')
    .sass('app.scss')
    .version(['css/app.css', 'js/all.js'])
    .browserSync({proxy: 'localhost:8000'});
});
