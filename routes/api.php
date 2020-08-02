<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'user'], function () {
    Route::get('/', 'UserController@index');
    Route::get('/{id}', 'UserController@show');
    Route::post('/', 'UserController@store');
    Route::put('/{id}', 'UserController@update');
    Route::delete('/{id}', 'UserController@delete');
});

Route::group(['prefix' => 'rent'], function () {
    Route::get('/', 'RentController@index');
    Route::get('/{id}', 'RentController@show');
    Route::post('/', 'RentController@store');
    Route::put('/{id}', 'RentController@update');
    Route::delete('/{id}', 'RentController@delete');
});
