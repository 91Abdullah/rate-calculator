const { mix } = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/app.js', 'public/js')
    .copy('resources/assets/js/rate.js', 'public/js/rate.js')
    .copy('resources/assets/json/cities.json', 'public/json/cities.json')
    .copy('resources/assets/json/cities_text.json', 'public/json/cities_text.json')
   .sass('resources/assets/sass/app.scss', 'public/css');
