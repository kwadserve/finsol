<?php

Route::group([
    'namespace' => 'Auth',
], function () {
    // Authentication Routes...
    Route::get('login', 'LoginController@showLoginForm')->name('login_page');
    Route::post('login', 'LoginController@login')->name('login');
    Route::post('logout', 'LoginController@logout')->name('logout');
});

Route::group([
    'middleware' => [
        'auth:admin',
    ],
], function () {

    // for all admins
    Route::get('/', 'AdminController@index')->name('dashboard');
    Route::get('home', 'AdminController@index')->name('dashboard');
    Route::get('dashboard', 'AdminController@index')->name('dashboard');

    // for administrator
    Route::group(['middleware' => ['role:administrator']], function () {
        // users
        Route::group(['prefix' => 'users', 'as' => 'users.',], function () {
            Route::get('all', 'UserController@index')->name('index');
            Route::get('ajax', 'UserController@ajax')->name('ajax');
            Route::get('show/{id}', 'UserController@show'); // ->where('id', '[0-9]+');
            // Route::post('change_status', 'UserController@change_status')->name('change_status');
            Route::post('delete', 'UserController@delete')->name('delete');

            // Route::get('gst/details/{id}', 'UserGstController@index')->name('gstDetails');


        });
        Route::group(['prefix' => 'user', 'as' => 'user.',], function () {
            Route::get('gst/details/{id}', 'UserGstController@index')->name('gstDetails');
            Route::post('gst/change_status', 'UserGstController@change_status')->name('change_status');
            Route::get('profile/{id}', 'UserGstController@profile')->name('user-profile'); 
            Route::get('gst/statusview/{id}', 'UserGstController@statusview')->name('gstStatusView');
            Route::get('gst/uploaddocuments/{id}', 'UserUploadDocumentsController@index')->name('useruploaddocuments');  
            Route::post('gst/download/uploaddocument/file/{id}', 'UserUploadDocumentsController@adminuserUploadDocumentFile')->name('adminuserUploadDocumentFile');
            Route::post('gst/download/additional/file/{id}', 'UserGstController@additionalFile')->name('additionalFile');

            // Upload Documents make it approve 
            Route::get('gst/change_approve/{id}', 'UserUploadDocumentsController@change_approve')->name('change_approve');


            Route::get('gst/copyofreturns/{id}', 'CopyofreturnsController@index')->name('copyofreturnslist');  
            Route::post('gst/download/copyofreturns/file/{id}', 'CopyofreturnsController@adminusercopyofreturnsFile')->name('adminusercopyofreturnsFile');
            Route::post('gst/gettradename', 'CopyofreturnsController@getTradeName')->name('gettradename');
            Route::post('gst/copyofreturns/create/{id}', 'CopyofreturnsController@create')->name('copyofreturns.create');
            Route::get('gst/copyofreturns/delete/{id}', 'CopyofreturnsController@delete')->name('copyofreturns.delete');


            // gst profile details 
            Route::get('gsttype/details/{id}', 'UserGstController@gstProfile')->name('gstTypeDetails'); 
        });

        // Route::get('gst/statusview/{id}', 'UserGstController@statusview')->name('gstStatusView');
        
        
    });
   

    // for moderators
    Route::group([
        'middleware' => ['role:administrator|moderator'],
    ], function () {
        // users
        Route::group(['prefix' => 'users', 'as' => 'users.',], function () {
            Route::get('all', 'UserController@index')->name('users-all');
        });
    });

    // for managers
    Route::group(['middleware' => ['role:administrator|moderator|manager']], function () {
        // products
        Route::group(['prefix' => 'products', 'as' => 'products.',], function () {
            Route::get('all', 'ProductController@index')->name('index');
            Route::get('ajax', 'ProductController@ajax')->name('ajax');
            Route::get('create', 'ProductController@create')->name('create');
            Route::get('show/{id}', 'ProductController@show')->name('show'); // ->where('id', '[0-9]+');
            Route::get('edit/{id}', 'ProductController@edit')->name('edit'); // ->where('id', '[0-9]+');
            Route::post('change_status', 'ProductController@change_status')->name('change_status');
        });
    });

});