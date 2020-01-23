<?php
Route::middleware(['web', 'auth:web', 'IsUser'])->group(function () {

    Route::get('/user', 'DefaultController@index');

    Route::get('/user/{all}', 'DefaultController@index')->where(['all' => '.*']);

    Route::prefix('api/user')->name('user.')->group(function () {
        Route::get('/', 'DefaultController@index');
        Route::get('/user-info', 'DefaultController@user_info')->name('user-info');

        // ============================== Reserved Tours ==============================
        Route::name('reserved-tours.')->prefix('reserved-tours')->group(function () {
            Route::get('/', 'ReservedTourController@index')->name('index');
        });
        // ============================== Reserved Tours ==============================

    });

});


