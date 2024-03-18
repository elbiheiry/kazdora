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

Route::group(['namespace' => 'Auth'] , function (){
    Route::get('/login' , ['as' => 'site.login' , 'uses' => 'LoginController@showLoginForm']);
    Route::post('/login' , ['as' => 'site.login' , 'uses' => 'LoginController@login']);
    Route::get('/register' , ['as' => 'site.register' , 'uses' => 'RegisterController@showRegistrationForm']);
    Route::post('/register' , ['as' => 'site.register' , 'uses' => 'RegisterController@register']);
    Route::get('login/{provider}', 'LoginController@redirect')->name('social.redirect');
    Route::get('login/{provider}/callback','LoginController@Callback')->name('social.callback');
    Route::get('/logout' , ['as' => 'site.logout' , 'uses' => 'LoginController@logout']);

    // Password Reset Routes...
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'ResetPasswordController@reset')->name('password.update');
});

Route::group(['namespace' => 'Site'] ,function (){
    Route::get('/' ,['as' => 'site.index' , 'uses' => 'HomeController@getIndex']);

    Route::group(['middleware' => 'auth'] , function (){
        Route::group(['prefix' => 'profile'] , function (){
            Route::get('/' ,['as' => 'site.profile' , 'uses' => 'ProfileController@getIndex']);
            Route::post('/' ,['as' => 'site.profile' , 'uses' => 'ProfileController@postIndex']);

            Route::group(['prefix' => 'settings'] , function (){
                Route::get('/' , ['as' => 'site.profile.settings' , 'uses' => 'ProfileController@getSetting']);
                Route::post('/email' , ['as' => 'site.profile.email' , 'uses' => 'ProfileController@postEditEmail']);
                Route::post('/password' , ['as' => 'site.profile.password' , 'uses' => 'ProfileController@postEditPassword']);
            });

            Route::group(['prefix' => 'ads'] , function (){
                Route::get('/' ,['as' => 'site.profile.ads' , 'uses' => 'AdController@getIndex']);
                Route::get('/add' ,['as' => 'site.profile.ads.add' , 'uses' => 'AdController@getAddAd']);
                Route::post('/add' ,['as' => 'site.profile.ads.add' , 'uses' => 'AdController@postIndex']);
                Route::get('/edit/{slug}' , ['as' => 'site.profile.ads.edit' , 'uses' => 'AdController@getEditAd']);
                Route::get('/delete/{id}' ,['as' => 'site.profile.ads.delete' ,'uses' => 'AdController@getDeleteProduct']);
            });

            Route::group(['prefix' => 'wishlist'] , function (){
                Route::get('/' ,['as' => 'site.profile.wishlist' , 'uses' => 'ProfileController@getWishlist']);
                Route::get('/delete/{id}' , ['as' => 'site.profile.wishlist.delete' , 'uses' => 'ProfileController@getDeleteWishlist']);
            });
        });
    });

    Route::group(['prefix' => 'ad'] , function (){
        Route::get('/{slug}' , ['as' => 'site.ad' , 'uses' => 'AdController@getSingleAd']);
        Route::post('/wishlist/{id}' , ['as' => 'site.ads.wishlist' , 'uses' => 'AdController@postWishlist']);
    });
});