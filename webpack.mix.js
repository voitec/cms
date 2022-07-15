const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.copyDirectory('resources/css', 'public/css')
    .copyDirectory('resources/js', 'public/js')
    .copyDirectory('resources/images', 'public/images')
    .copyDirectory('resources/rs-plugin', 'public/rs-plugin')
    .copyDirectory('resources/fonts', 'public/fonts')
    .copyDirectory('vendor/tinymce/tinymce', 'public/js/tinymce')
    .browserSync('moodart.localhost');
