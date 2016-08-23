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

/*elixir(function(mix) {
    mix.sass('app.scss')
        .version(['public/css/app.css']);
});*/

var paths = {
    'jquery': 'public/bower_components/jquery/',
    'bootstrap': 'node_modules/bootstrap-sass/assets/'
}

elixir(function(mix) {
    mix.sass('app.scss', 'public/css/', {includePaths: [paths.bootstrap + 'stylesheets']})
        .copy(paths.bootstrap + 'fonts/bootstrap/**', 'public/fonts')
        .scripts([
            paths.jquery + 'dist/jquery.js',
            paths.bootstrap + 'javascripts/bootstrap.js'
        ],'public/js/app.js', './')
        .version(['public/css/app.css', 'public/js/app.js']);
});
