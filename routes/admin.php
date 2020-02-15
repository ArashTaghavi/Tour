<?php
Route::middleware(['web','auth:web','IsAdmin'])->group(function () {

    Route::get('/admin', 'DefaultController@index');

    Route::get('/admin/{all}', 'DefaultController@index')->where(['all' => '.*']);

    Route::prefix('api/admin')->name('admin.')->group(function () {
        Route::get('/', 'DefaultController@index');

        // ============================== Tours ==============================
        Route::name('tours.')->prefix('tours')->group(function () {
            Route::get('/', 'TourController@our_tours')->name('our_tours');
            Route::get('/{id}', 'TourController@get')->name('get');
            Route::post('/', 'TourController@store')->name('store');
            Route::put('/{id}', 'TourController@update')->name('update');
            Route::delete('/{id}', 'TourController@destroy')->name('destroy');
        });
        // ============================== Tours ==============================

        // ============================== Images Tours ==============================
        Route::name('image-tours.')->prefix('image-tours')->group(function () {
            Route::get('/{id}', 'ImageTourController@index')->name('index');
            Route::post('/{id}', 'ImageTourController@store')->name('store');
            Route::put('/field-update/{id}/{field}', 'ImageTourController@fieldUpdate')->name('field-update');
            Route::delete('/{id}', 'ImageTourController@destroy')->name('destroy');


        });
        // ============================== Images Tour ==============================



        // ============================== Itinerary Tours ==============================
        Route::name('itinerary-tours.')->prefix('itinerary-tours')->group(function () {
            Route::get('/{id}', 'ItineraryTourController@index')->name('index');
            Route::post('/{id}', 'ItineraryTourController@store')->name('store');
            Route::put('/field-update/{id}/{field}', 'ItineraryTourController@fieldUpdate')->name('field-update');
            Route::delete('/{id}', 'ItineraryTourController@destroy')->name('destroy');

        });
        // ============================== Itinerary Tours ==============================

        // ============================== Tour Leaders ==============================
        Route::name('tour-leaders.')->prefix('tour-leaders')->group(function () {
            Route::get('/', 'TourLeaderController@index')->name('index');
            Route::post('/', 'TourLeaderController@store')->name('store');
            Route::put('/{id}', 'TourLeaderController@update')->name('update');
            Route::put('/field-update/{id}/{field}', 'TourLeaderController@fieldUpdate')->name('field-update');
            Route::delete('/{id}', 'TourLeaderController@destroy')->name('destroy');

        });
        // ============================== Tour Leaders ==============================
    });

});


