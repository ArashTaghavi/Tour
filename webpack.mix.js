const mix = require('laravel-mix');

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

mix.js('resources/assets/Admin/app.js', 'public/admin-js');
mix.js('resources/assets/User/app.js', 'public/user-js');
mix.js('resources/assets/Hostel/app.js', 'public/hostel-js');
mix.js('resources/assets/Hotel/app.js', 'public/hotel-js');

