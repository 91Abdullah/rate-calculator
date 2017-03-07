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

Route::get('/', 'IndexController@index');
Route::get('/test', 'IndexController@test');

Route::group(['prefix' => 'admin'], function() {
    Route::get('rates', 'RateController@index');
    Route::get('services', 'ServiceController@index');
    Route::get('types', 'TypeController@index');
    Route::get('destinations', 'DestinationController@index');
    Route::get('zones', 'ZoneController@index');
    Route::get('cities', 'CityController@index');
    Route::get('limit_types', 'LimitTypeController@index');

    // Create routes

    Route::get('services/create', 'ServiceController@create');
    Route::get('types/create', 'TypeController@create');
    Route::get('destinations/create', 'DestinationController@create');
    Route::get('rates/create', 'RateController@create');
    Route::get('zones/create', 'ZoneController@create');
    Route::get('cities/create', 'CityController@create');
    Route::get('limit_types/create', 'LimitTypeController@create');

    // Store Routes

    Route::post('services/create', 'ServiceController@store')->name('services.create');
    Route::post('types/create', 'TypeController@store')->name('types.create');
    Route::post('destinations/create', 'DestinationController@store')->name('destinations.create');
    Route::post('rates/create', 'RateController@store')->name('rates.create');
    Route::post('zones/create', 'ZoneController@store')->name('zones.create');
    Route::post('cities/create', 'CityController@store')->name('cities.create');
    Route::post('limit_types/create', 'LimitTypeController@store')->name('limit_types.create');

    // Delete Routes

    Route::delete('services/delete', 'ServiceController@destroy')->name('services.delete');
    Route::delete('types/delete', 'TypeController@destroy')->name('types.delete');
    Route::delete('destinations/delete', 'DestinationController@destroy')->name('destinations.delete');
    Route::delete('rates/delete', 'RateController@destroy')->name('rates.delete');
    Route::delete('zones/delete', 'ZoneController@destroy')->name('zones.delete');
    Route::delete('cities/delete', 'CityController@destroy')->name('cities.delete');
    Route::delete('limit_types/delete', 'LimitTypeController@destroy')->name('limit_types.delete');

    // Edit Routes

    Route::get('services/edit/{id}', 'ServiceController@edit')->name('services.edit');
    Route::get('types/edit/{id}', 'TypeController@edit')->name('types.edit');
    Route::get('destinations/edit/{id}', 'DestinationController@edit')->name('destinations.edit');
    Route::get('rates/edit/{id}', 'RateController@edit')->name('rates.edit');
    Route::get('zones/edit/{id}', 'ZoneController@edit')->name('zones.edit');
    Route::get('cities/edit/{id}', 'CityController@edit')->name('cities.edit');
    Route::get('limit_types/edit/{id}', 'LimitTypeController@edit')->name('limit_types.edit');

    // Update Routes

    Route::patch('services/update/{id}', 'ServiceController@update')->name('services.update');
    Route::patch('types/update/{id}', 'TypeController@update')->name('types.update');
    Route::patch('destinations/update/{id}', 'DestinationController@update')->name('destinations.update');
    Route::patch('rates/update/{id}', 'RateController@update')->name('rates.update');
    Route::patch('zones/update/{id}', 'ZoneController@update')->name('zones.update');
    Route::patch('cities/update/{id}', 'CityController@update')->name('cities.update');
    Route::patch('limit_types/update/{id}', 'LimitTypeController@update')->name('limit_types.update');
});
