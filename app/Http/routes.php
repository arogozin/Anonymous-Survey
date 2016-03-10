<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'SurveyController@index');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::group(['prefix' => 'survey'], function () {
        Route::post('/', 'SurveyController@survey');
        Route::get('/', 'SurveyController@login');
        Route::get('login', 'SurveyController@login');
        Route::group(['prefix' => 'identity'], function () {
            Route::get('create', 'SurveyController@createIdentity');
        });
        
        Route::post('result', 'SurveyController@result');
        Route::get('result', 'SurveyController@login');
    });
    
    Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
        Route::get('/', 'DashboardController@index');
        Route::group(['prefix' => 'identity'], function () {
            Route::get('/', 'IdentityController@index');
            Route::get('reset', 'IdentityController@reset');
            Route::get('delete/{id}', 'IdentityController@delete');
            Route::get('view/{id}', 'IdentityController@view');
        });
        
        Route::group(['prefix' => 'survey'], function () {
            Route::get('/', 'DashboardController@index');
            Route::get('create', 'SurveyController@create');
            Route::get('delete/{id}', 'SurveyController@delete');
            Route::get('activate/{id}', 'SurveyController@activate');
            Route::get('deactivate/{id}', 'SurveyController@deactivate');
            Route::get('view/{id}', 'SurveyController@view');
            Route::get('repeat/{id}', 'SurveyController@repeat');
        });
    });
    
    Route::group(['prefix' => 'api'], function () {
        Route::group(['prefix' => 'survey'], function () {
            Route::post('store', 'SurveyController@store');
        });
    });
    
    Route::get('auth/google', 'Auth\AuthController@redirectToProvider');
    Route::get('auth/google/callback', 'Auth\AuthController@handleProviderCallback');
    Route::get('logout', 'Auth\AuthController@logout');
    Route::get('login', 'Auth\AuthController@login');
});
