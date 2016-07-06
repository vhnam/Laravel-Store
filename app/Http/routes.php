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

Route::group(['middleware' => ['guest']], function () {

    // Homepage
    Route::get('/', [
        'uses' => 'HomeController@index',
        'as' => 'home'
    ]);

    // Authentication routes...
    Route::get('admin/login', [
        'uses' => 'Auth\AuthController@getLogin',
        'as' => 'login'
    ]);

    Route::post('admin/login', [
        'uses' => 'Auth\AuthController@postLogin',
        'as' => 'login'
    ]);
});

Route::group(['middleware' => ['auth']], function() {
    // Administrator
    Route::get('admin', [
        'uses' => 'AdminController@index',
        'as' => 'admin'
    ]);

    // Authentication routes...
    Route::get('admin/logout', [
        'uses' => 'Auth\AuthController@logout',
        'as' => 'logout'
    ]);

    // Brands
    Route::get('admin/brands', [
        'uses' => 'BrandController@showBackendBrands',
        'as' => 'brands'
    ]);

    Route::get('admin/brands/create', [
        'uses' => 'BrandController@create',
        'as' => 'brands'
    ]);

    Route::post('admin/brands/create', [
        'uses' => 'BrandController@handleCreate',
        'as' => 'brands'
    ]);

    Route::get('admin/brands/{brand}', [
        'uses' => 'BrandController@update',
        'as' => 'brands'
    ]);

    Route::post('admin/brands/{brand}', [
        'uses' => 'BrandController@handleUpdate',
        'as' => 'brands'
    ]);

    // Types
    Route::get('admin/types', [
        'uses' => 'TypeController@showBackendTypes',
        'as' => 'types'
    ]);

    Route::get('admin/types/create', [
        'uses' => 'TypeController@create',
        'as' => 'types'
    ]);

    Route::post('admin/types/create', [
        'uses' => 'TypeController@handleCreate',
        'as' => 'types'
    ]);

    Route::get('admin/types/{type}', [
        'uses' => 'TypeController@update',
        'as' => 'types'
    ]);

    Route::post('admin/types/{type}', [
        'uses' => 'TypeController@handleUpdate',
        'as' => 'types'
    ]);

    // Categories
    Route::get('admin/categories', [
        'uses' => 'CategoryController@showBackendCategories',
        'as' => 'categories'
    ]);

    Route::get('admin/categories/create', [
        'uses' => 'CategoryController@create',
        'as' => 'categories'
    ]);

    Route::post('admin/categories/create', [
        'uses' => 'CategoryController@handleCreate',
        'as' => 'categories'
    ]);

    Route::get('admin/categories/{category}', [
        'uses' => 'CategoryController@update',
        'as' => 'categories'
    ]);

    Route::post('admin/categories/{category}', [
        'uses' => 'CategoryController@handleUpdate',
        'as' => 'categories'
    ]);
});