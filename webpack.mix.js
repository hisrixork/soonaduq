let mix = require('laravel-mix');

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

mix.styles([
    'resources/assets/mdbootstrap/css/bootstrap.css',
    'resources/assets/mdbootstrap/css/mdb.css',
    'resources/assets/font-awesome/css/all.css',
    'resources/assets/font-awesome/css/fontawesome.css',
    'resources/assets/swal/sweetalert.css',
], 'public/css/app.css')
    .scripts([
        'resources/assets/mdbootstrap/js/jquery-3.3.1.min.js',
        'resources/assets/mdbootstrap/js/popper.min.js',
        'resources/assets/mdbootstrap/js/bootstrap.js',
        'resources/assets/mdbootstrap/js/mdb.js',
        'resources/assets/swal/sweetalert.js',
        'resources/assets/js/moment.js',
        'resources/assets/js/axios.js',
    ], 'public/js/app.js');
