<?php
Route::middleware(['web', 'auth:web'])->group(function () {

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
        // ============================== Images Tours ==============================


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

        // ================================ Categories ================================
        Route::prefix('categories')->name('categories.')->group(function () {
            Route::get('/', 'CategoryController@index')->name('index');
            Route::post('/', 'CategoryController@store')->name('store');
            Route::delete('/{category}', 'CategoryController@destroy')->name('destroy');
            Route::put('/field-update/{category}/{field}', 'CategoryController@fieldUpdate')->name('field-update');
            Route::put('/published/{category}', 'CategoryController@published')->name('published');
        });
        // ================================ Categories ================================

        // ================================ Posts ================================
        Route::prefix('posts')->name('posts.')->group(function () {
            Route::get('/', 'PostController@index')->name('index');
            Route::get('/{id}', 'PostController@get')->name('get');
            Route::post('/', 'PostController@store')->name('store');
            Route::put('/{id}', 'PostController@update')->name('update');
            Route::delete('/{post}', 'PostController@destroy')->name('destroy');
            Route::get('/{post_id}/comments', 'PostController@comments')->name('comments');
        });
        // ================================ Posts ================================


        // ============================== Hotels ==============================
        Route::name('hotels.')->prefix('hotels')->group(function () {
            Route::get('/', 'HotelController@our_hotels')->name('our_hotels');
            Route::get('/{id}', 'HotelController@get')->name('get');
            Route::post('/', 'HotelController@store')->name('store');
            Route::put('/{id}', 'HotelController@update')->name('update');
            Route::delete('/{id}', 'HotelController@destroy')->name('destroy');
        });
        // ============================== Hotels ==============================

        // ============================== Hotel Images ==============================
        Route::name('hotel-images.')->prefix('hotel-images')->group(function () {
            Route::get('/{id}', 'HotelImageController@index')->name('index');
            Route::post('/{id}', 'HotelImageController@store')->name('store');
            Route::delete('/{id}', 'HotelImageController@destroy')->name('destroy');

        });
        // ============================== Hotel Images ==============================


        // ============================== Hotel Rooms ==============================
        Route::name('hotel-rooms.')->prefix('hotel-rooms')->group(function () {
            Route::get('/{id}','HotelRoomController@index')->name('index');
            Route::get('/get/{id}','HotelRoomController@get')->name('get');
            Route::post('/{id}','HotelRoomController@store')->name('store');
            Route::put('/{id}','HotelRoomController@update')->name('update');
            Route::put('/discount/{id}','HotelRoomController@discountUpdate')->name('discount-update');
            Route::put('/handle-reserve/{id}','HotelRoomController@handleReserve')->name('handle-reserve');
            Route::delete('/{id}','HotelRoomController@destroy')->name('destroy');
        });
        // ============================== Hotel Rooms ==============================

        // ============================== Image Rooms ==============================
        Route::name('image-rooms.')->prefix('image-rooms')->group(function () {
            Route::get('/{id}', 'ImageRoomController@index')->name('index');
            Route::post('/{id}', 'ImageRoomController@store')->name('store');
            Route::delete('/{id}', 'ImageRoomController@destroy')->name('destroy');

        });
        // ============================== Image Rooms ==============================


        // ================================ Comments ================================
        Route::prefix('comments')->name('comments.')->group(function () {
            Route::get('/', 'CommentController@index')->name('index');
            Route::get('/approved', 'CommentController@approved')->name('approved');
            Route::get('/pending', 'CommentController@pending')->name('pending');
            Route::put('/{comment}', 'CommentController@doApprove')->name('do-approve');
            Route::delete('/{comment}', 'CommentController@destroy')->name('destroy');
            Route::get('/{approved}/search', 'CommentController@search')->name('search');
        });
        // ================================ Comments ================================

        // ================================ Contacts ================================
        Route::prefix('contacts')->name('contacts.')->group(function () {
            Route::get('/', 'ContactController@index')->name('index');
            Route::delete('/{contact}', 'ContactController@destroy')->name('destroy');
        });
        // ================================ Contacts ================================

        // ================================ Settings ================================
        Route::prefix('settings')->name('settings.')->group(function () {
            Route::get('/', 'SettingController@index')->name('index');
            Route::put('/field-update/{setting}/{field}', 'SettingController@fieldUpdate')->name('field-update');

        });
        // ================================ Settings ================================


    });

});


