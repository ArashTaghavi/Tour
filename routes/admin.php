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


    });

});


