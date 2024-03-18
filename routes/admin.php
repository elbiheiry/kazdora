<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'admin' , 'namespace' => 'Admin'], function () {
    Route::group(['namespace' => 'Auth'], function () {
        Route::get('/login', ['as' => 'admin.auth', 'uses' => 'LoginController@getLogin']);
        Route::post('/login', ['as' => 'admin.auth', 'uses' => 'LoginController@postLogin']);
        Route::get('/logout', 'LoginController@getLogout')->name('admin.logout');
    });

    Route::group(['middleware' => 'auth.admin'], function () {

        //dashboard route
        Route::get('/', ['as' => 'admin.dashboard', 'uses' => 'DashboardController@getIndex']);

        /**
         * amenities routes
         */
        Route::group(['prefix' => 'amenities'] ,function (){
            Route::get('/' ,['as' => 'admin.amenities' ,'uses' => 'AmenityController@getIndex']);
            Route::post('/' ,['as' => 'admin.amenities' ,'uses' => 'AmenityController@postIndex']);
            Route::get('/info/{id}' ,['as' => 'admin.amenities.info' ,'uses' => 'AmenityController@getInfo']);
            Route::post('/edit/{id}' ,['as' => 'admin.amenities.edit' ,'uses' => 'AmenityController@postEdit']);
            Route::get('/delete/{id}' ,['as' => 'admin.amenities.delete' ,'uses' => 'AmenityController@getDelete']);
        });

        /**
         * cities routes
         */
        Route::group(['prefix' => 'cities'] ,function (){
            Route::get('/' ,['as' => 'admin.cities' ,'uses' => 'CityController@getIndex']);
            Route::post('/' ,['as' => 'admin.cities' ,'uses' => 'CityController@postIndex']);
            Route::get('/info/{id}' ,['as' => 'admin.cities.info' ,'uses' => 'CityController@getInfo']);
            Route::post('/edit/{id}' ,['as' => 'admin.cities.edit' ,'uses' => 'CityController@postEdit']);
            Route::get('/delete/{id}' ,['as' => 'admin.cities.delete' ,'uses' => 'CityController@getDelete']);
        });
    });

});