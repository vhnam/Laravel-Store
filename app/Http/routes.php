<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['web']], function () {

    // Homepage
    Route::get('/', [
        'uses' => 'HomeController@index',
        'as' => 'home'
    ]);

    // Administrator
    Route::get('admin', [
        'uses' => 'AdminController@index',
        'as' => 'admin',
        'middleware' => 'admin'
    ]);

    // Authentication routes...
    Route::get('auth/login', 'Auth\AuthController@getLogin');
    Route::post('auth/login', 'Auth\AuthController@postLogin');
});