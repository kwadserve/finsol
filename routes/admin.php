<?php
use App\Http\Controllers\DropdownController;

Route::group(
    [
        'namespace' => 'Auth',
    ],
    function () {
        // Authentication Routes...
        Route::get('login', 'LoginController@showLoginForm')->name('login_page');
        Route::post('login', 'LoginController@login')->name('login');
        Route::post('logout', 'LoginController@logout')->name('logout');

        Route::get('get-districts/{stateId}', [DropdownController::class, 'getDistricts']);
        Route::get('get-blocks/{districtId}', [DropdownController::class, 'getBlocks']);
    },
);

Route::group(
    [
        'middleware' => ['auth:admin'],
    ],
    function () {
        // for all admins
        Route::get('/', 'AdminController@index')->name('dashboard');
        Route::get('home', 'AdminController@index')->name('dashboard');
        Route::get('dashboard', 'AdminController@index')->name('dashboard');

        // for administrator
        Route::group(['middleware' => ['role:administrator']], function () {
            // users
            Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
                Route::get('all', 'UserController@index')->name('index');
                Route::get('ajax', 'UserController@ajax')->name('ajax');
                Route::get('show/{id}', 'UserController@show'); // ->where('id', '[0-9]+');
                // Route::post('change_status', 'UserController@change_status')->name('change_status');
                Route::post('delete', 'UserController@delete')->name('delete');

                // Route::get('gst/details/{id}', 'UserGstController@index')->name('gstDetails');
                Route::get('addform', 'UserController@addUserForm')->name('addUserForm');
                Route::post('adduser', 'UserController@addUser')->name('addUser');
            });
            Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
                Route::get('gst/details/{id}', 'UserGstController@index')->name('gstDetails');
                Route::post('gst/change_status', 'UserGstController@change_status')->name('change_status');
                Route::get('profile/{id}', 'UserGstController@profile')->name('user-profile');
                Route::get('gst/statusview/{id}', 'UserGstController@statusview')->name('gstStatusView');
                Route::get('gst/uploaddocuments/{id}', 'UserUploadDocumentsController@index')->name('useruploaddocuments');
                Route::post('gst/download/uploaddocument/file/{id}', 'UserUploadDocumentsController@adminuserUploadDocumentFile')->name('adminuserUploadDocumentFile');
                Route::post('gst/download/additional/file/{id}', 'UserGstController@additionalFile')->name('additionalFile');
                Route::post('gst/download/approved/file/{id}', 'UserGstController@approvedFile')->name('approvedFile');

                // Upload Documents make it approve
                Route::get('gst/change_approve/{id}', 'UserUploadDocumentsController@change_approve')->name('change_approve');

                Route::get('gst/copyofreturns/{id}', 'CopyofreturnsController@index')->name('copyofreturnslist');
                Route::post('gst/download/copyofreturns/file/{id}', 'CopyofreturnsController@adminusercopyofreturnsFile')->name('adminusercopyofreturnsFile');
                Route::post('gst/gettradename', 'CopyofreturnsController@getTradeName')->name('gettradename');
                Route::post('gst/copyofreturns/create/{id}', 'CopyofreturnsController@create')->name('copyofreturns.create');
                Route::get('gst/copyofreturns/delete/{id}', 'CopyofreturnsController@delete')->name('copyofreturns.delete');

                // gst profile details
                Route::get('gsttype/details/{id}', 'UserGstController@gstProfile')->name('gstTypeDetails');
                Route::post('gst/files/{id}', 'UserGstController@downloadGstFile')->name('downloadGstFile');

                // Display all form related to this user on registration tab
                Route::get('forms/dashboard/details/{id}', 'FormsDashboardController@index')->name('form_dashboard');
                Route::post('forms/change_status', 'FormsDashboardController@change_status')->name('form_dashboard_change_status');
                Route::get('forms/statusview', 'FormsDashboardController@statusview')->name('form_statusView');
                Route::post('forms/additional/file/{id}', 'FormsDashboardController@additionalFile')->name('form_additionalFile');
                Route::post('forms/approved/file/{id}', 'FormsDashboardController@approvedFile')->name('form_approvedFile');
                Route::get('forms/details/{name}/{id1}', 'FormsDashboardController@allProfile')->name('allformProfile');
                Route::post('files/{id}', 'FormsDashboardController@allProfileDocDownload')->name('allprofiledocdownload');

                // Display all form related to this user on Companies Act tab

                Route::get('companiesact/dashboard/details/{id}', 'CompaniesActDashboardController@index')->name('companiesact_dashboard');
                Route::post('companiesact/change_status', 'CompaniesActDashboardController@change_status')->name('companiesact_dashboard_change_status');
                Route::get('companiesact/statusview', 'CompaniesActDashboardController@statusview')->name('companiesact_statusView');
                Route::post('companiesact/additional/file/{id}', 'CompaniesActDashboardController@additionalFile')->name('companiesact_additionalFile');
                Route::post('companiesact/approved/file/{id}', 'CompaniesActDashboardController@approvedFile')->name('companiesact_approvedFile');
                Route::get('companiesact/details/{name}/{id1}', 'CompaniesActDashboardController@allProfile')->name('companiesact_allformProfile');
                Route::post('cafiles/{id}', 'CompaniesActDashboardController@allProfileDocDownload')->name('companiesact_allprofiledocdownload');

                // Display all form related to this user on Companies Act tab

                Route::get('certification/dashboard/details/{id}', 'CertificationDashboardController@index')->name('certification_dashboard');
                Route::post('certification/change_status', 'CertificationDashboardController@change_status')->name('certification_dashboard_change_status');
                Route::get('certification/statusview', 'CertificationDashboardController@statusview')->name('certification_statusView');
                Route::post('certification/additional/file/{id}', 'CertificationDashboardController@additionalFile')->name('certification_additionalFile');
                Route::post('certification/approved/file/{id}', 'CertificationDashboardController@approvedFile')->name('certification_approvedFile');
                Route::get('certification/details/{name}/{id1}', 'CertificationDashboardController@allProfile')->name('certification_allformProfile');
                Route::post('cafiles/{id}', 'CertificationDashboardController@allProfileDocDownload')->name('certification_allprofiledocdownload');
            });

            // Route::get('gst/statusview/{id}', 'UserGstController@statusview')->name('gstStatusView');
        });

        // for moderators
        Route::group(
            [
                'middleware' => ['role:administrator|moderator'],
            ],
            function () {
                // users
                Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
                    Route::get('all', 'UserController@index')->name('users-all');
                });
            },
        );

        // for managers
        Route::group(['middleware' => ['role:administrator|moderator|manager']], function () {
            // products
            Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
                Route::get('all', 'ProductController@index')->name('index');
                Route::get('ajax', 'ProductController@ajax')->name('ajax');
                Route::get('create', 'ProductController@create')->name('create');
                Route::get('show/{id}', 'ProductController@show')->name('show'); // ->where('id', '[0-9]+');
                Route::get('edit/{id}', 'ProductController@edit')->name('edit'); // ->where('id', '[0-9]+');
                Route::post('change_status', 'ProductController@change_status')->name('change_status');
            });
        });
    },
);