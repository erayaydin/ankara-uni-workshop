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

Route::bind('slide', function($value, $router){
    return \App\Models\Slide::where('slug', $value)->first();
});

Route::get('dev', function(){
    $user = new \App\User();
    $user->name = "Eray Aydın";
    $user->email = "aydineray@maillol.com";
    $user->password = bcrypt("123456");
    $user->save();

    $slide = new \App\Models\Slide();
    $slide->slug = "deneme-slayt-4";
    $slide->name = "Deneme Slayt";
    $slide->description = "Deneme slaytı inceleyin...";
    $slide->user_id = $user->id;
    $slide->save();
});

Route::get('/', ['as' => 'home.index', 'uses' => 'HomeController@index']);

Route::group(['as' => 'slide.', 'prefix' => 'slide'], function(){
    Route::get('/', ['as' => 'index', 'uses' => 'SlideController@index']);
    Route::get('{slide}', ['as' => 'show', 'uses' => 'SlideController@show']);
});

Route::group(['as' => 'user.', 'prefix' => 'user'], function(){
    Route::get('/', ['as' => 'index', 'uses' => 'UserController@index']);
    Route::get('{user}', ['as' => 'show', 'uses' => 'UserController@show']);
});

Route::group(['middleware' => 'auth'], function(){

    Route::group(['as' => 'my-slide.', 'prefix' => 'my'], function(){
        Route::get('/', ['as' => 'index', 'uses' => 'MySlideController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'MySlideController@create']);
        Route::post('/', ['as' => 'store', 'uses' => 'MySlideController@store']);
        Route::get('{slide}/edit', ['as' => 'edit', 'uses' => 'MySlideController@edit']);
        Route::put('{slide}', ['as' => 'update', 'uses' => 'MySlideController@update']);
        Route::delete('{slide}', ['as' => 'destroy', 'uses' => 'MySlideController@destroy']);
    });

    Route::get('auth/settings', ['as' => 'auth.settings', 'uses' => 'AuthController@settings']);
    Route::put('auth/settings', ['as' => 'auth.settings', 'uses' => 'AuthController@settingsUpdate']);

    Route::get('auth/logout', ['as' => 'auth.logout', 'uses' => 'AuthController@logout']);

});

Route::group(['middleware' => 'guest'], function(){

    Route::group(['as' => 'auth.', 'prefix' => 'auth'], function(){

        Route::get('login', ['as' => 'login', 'uses' => 'AuthController@login']);
        Route::post('login', ['as' => 'login', 'uses' => 'AuthController@doLogin']);

        Route::get('register', ['as' => 'register', 'uses' => 'AuthController@register']);
        Route::post('register', ['as' => 'register', 'uses' => 'AuthController@doRegister']);

    });

});