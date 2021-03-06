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

Route::get('/', 'HomeController@index');

Auth::routes();
Route::group(['middleware' => 'auth'], function(){
    
    Route::get('/home', 'HomeController@home');

    Route::get('/users', 'HomeController@users');
    Route::get('/users/active/{id}', 'HomeController@active');
    Route::get('/users/delete/{id}', 'HomeController@delete');

    Route::get('/mails', 'LocalMail\LocalMailController@index');
    Route::get('/mails/create', 'LocalMail\LocalMailController@create');
    Route::post('/mails/store', 'LocalMail\LocalMailController@store');
    Route::get('/mails/view/{id}', 'LocalMail\LocalMailController@view');
    Route::get('/mails/delete/{id}', 'LocalMail\LocalMailController@delete');
    Route::get('/mails/sent', 'LocalMail\LocalMailController@sent');
    // Route::get('document/create', 'Document\DocumentController@create');
    // Route::post('document/store', 'Document\DocumentController@store');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
