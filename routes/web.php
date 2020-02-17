<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'Site\SiteController@index')->name('index');

Route::middleware(['web'])->namespace('Site')->group(function () {

    Route::name('site.')->group(function () {
        // ============================== Tours ==============================
        Route::name('tours.')->prefix('tours')->group(function () {
            Route::get('/', 'TourController@index')->name('index');
            Route::get('/search', 'TourController@search')->name('search');
            Route::get('/{slug}', 'TourController@tour')->name('tour');
        });
        // ============================== Tours ==============================

        // ============================== Reserved Tours ==============================
        Route::name('reserved-tours.')->prefix('reserved-tours.')->group(function () {
            Route::post('/{slug}', 'ReservedTourController@store')->name('store');
        });
        // ============================== Reserved Tours ==============================
    });
});


Route::middleware(['web'])->group(function () {
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
    Route::post('/login', 'Auth\LoginController@login')->name('doLogin');
    Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('/register', 'Auth\RegisterController@create')->name('doRegister');
});