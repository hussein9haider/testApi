<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => '/v1'], function () {
    Route::group(['prefix' => 'categories'], function () {
        Route::get('/allWithOutOrm', 'CategoryController@allWithOutOrm');
        Route::get('/allWithOrm', 'CategoryController@allWithOrm');
        Route::get('/singleWithOrmAndChildren/{id}', 'CategoryController@singleWithOrmAndChildren');
        Route::get('/singleWithOrmAndParent/{id}', 'CategoryController@singleWithOrmAndParent');
    });
});
