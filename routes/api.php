<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('weather')
    ->name('weather.')
    ->namespace('Weather')
    ->group(function () {
        Route::name('get_by_city_name')->get('get-by-city/{city}', 'WeatherController@getByCityName');
    });

Route::prefix('order')
    ->name('order.')
    ->group(function () {
        Route::name('list')->get('list', 'OrdersController@index');
        Route::name('getStatusesList')->get('statuses-list', 'OrdersController@getStatusesList');
        Route::name('getOrder')->get('{id}', 'OrdersController@getOrder');
    });

Route::prefix('partner')
    ->name('partner.')
    ->group(function () {
        Route::name('list')->get('list', 'PartnerController@getList');
    });