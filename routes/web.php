<?php

Route::get('/', function () {
    return view('welcome');
})->name('front');

Route::group([
    'namespace' => 'Auth',
], function () {

    // Authentication Routes...
    Route::get('login', 'LoginController@showLoginForm')->name('login_page');
    Route::post('login', 'LoginController@login')->name('login');
    Route::post('logout', 'LoginController@logout')->name('logout');
    Route::get('logout', 'LoginController@logout')->name('logout_page');

    // Registration Routes...
    Route::get('register', 'RegisterController@showRegistrationForm')->name('register_page');
    Route::post('register', 'RegisterController@register')->name('register');
    Route::get('register/activate/{token}', 'RegisterController@confirm')->name('email_confirm');

   

    // Password Reset Routes...
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'ResetPasswordController@reset');

});

Route::get('home', 'UserController@index')->name('home');
Route::get('settings', 'UserController@settings')->name('settings');
Route::get('settings/update', 'UserController@settingsUpdate')->name('settings.update');

// GST DETAILS
Route::get('gst', 'GstController@index')->name('gst');
Route::get('gst/register', 'GstController@register_form')->name('gst.register_form');

Route::get('gst/existing_register', 'GstController@existing_register_form')->name('gst.existing_register_form');
Route::post('gst/existing', 'GstController@storeExistingRegister')->name('gst.existing');


Route::post('gst/individual', 'GstController@storeIndividual')->name('gst.individual');
Route::post('gst/firm', 'GstController@storeFirm')->name('gst.firm');
Route::post('gst/company', 'GstController@storeCompany')->name('gst.company');
Route::get('gst/business', 'GstController@businessStatus')->name('gst.business_status');
Route::get('gst/copyofreturns', 'GstController@copyOfReturns')->name('gst.copy_of_returns');
Route::post('gst/copyofreturns', 'GstController@copyOfReturns')->name('gst.copy_of_returns.filter');
Route::post('gst/queryraised', 'GstController@queryRaised')->name('gst.query_raised');
Route::get('gst/uploaddocuments', 'GstController@uploadDocuments')->name('gst.uploaddocuments');
Route::post('userSettings', 'GstController@userSettings')->name('userSettings');

Route::post('gst/gettradename', 'GstController@getTradeName')->name('gst.gettradename');
Route::post('gst/uploaddocumentscreate', 'GstController@uploadDocumentsCreate')->name('gst.uploaddocumentscreate');

Route::post('gst/download/approved/file', 'GstController@approvedFile')->name('approvedFile');
Route::post('gst/download/uploaddocument/file', 'GstController@uploadDocumentFile')->name('uploadDocumentFile');
Route::post('gst/download/raised/file', 'GstController@raisedFile')->name('raisedFile');



Route::post('gst/getformtype', 'GstController@getFormType')->name('gst.getformtype');
Route::post('gst/getyear', 'GstController@getYear')->name('gst.getyear');
Route::post('gst/getmonth', 'GstController@getMonth')->name('gst.getmonth');
Route::post('gst/getquarter', 'GstController@getQuarter')->name('gst.getquarter');
Route::post('gst/download/copyofreturns/file', 'GstController@copyofreturnsFile')->name('copyofreturnsFile');

//PAN DETAILS 
Route::get('pan/register', 'PanController@register_form')->name('pan.register_form');
Route::post('pan/register', 'PanController@storePan')->name('pan.register');

//TAN DETAILS 
Route::get('tan/register', 'TanController@register_form')->name('tan.register_form');
Route::post('tan/register', 'TanController@storeTan')->name('tan.register');


//Epf DETAILS 
Route::get('epf/register', 'EpfController@register_form')->name('epf.register_form');
Route::post('epf/company', 'EpfController@storeEpfCompany')->name('epf.register.company');
Route::post('epf/others', 'EpfController@storeEpfOthers')->name('epf.register.others');



//ESIC DETAILS 
Route::get('esic/register', 'ESICController@register_form')->name('esic.register_form');
Route::post('esic/company', 'ESICController@storeEsicCompany')->name('esic.register.company');
Route::post('esic/others', 'ESICController@storeEsicOthers')->name('esic.register.others');

//TradeMark DETAILS 
Route::get('trademark/register', 'TradeMarkController@register_form')->name('trademark.register_form');
Route::post('trademark/company', 'TradeMarkController@storeTrademarkCompany')->name('trademark.register.company');
Route::post('trademark/others', 'TradeMarkController@storeTrademarkOthers')->name('trademark.register.others');

//Company Regitration DETAILS 
Route::get('company/register', 'CompanyController@register_form')->name('company.register_form');
Route::post('company', 'CompanyController@storeCompany')->name('company.register');