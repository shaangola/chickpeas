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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/menu', 'MenuController@show')->name('home')->middleware('auth');
Route::get('/menu/create', 'MenuController@create')->name('home')->middleware('auth');
Route::post('/menu/store', 'MenuController@store')->name('home')->middleware('auth');
Route::get('admin', function () {
    return view('admin.dashboard');
});

Route::group(
[
    'prefix' => 'delivery_sources',
], function () {

    Route::get('/', 'DeliverySourcesController@index')
         ->name('delivery_sources.delivery_source.index')
         ->middleware('auth');

    Route::get('/create','DeliverySourcesController@create')
         ->name('delivery_sources.delivery_source.create');

    Route::get('/show/{deliverySource}','DeliverySourcesController@show')
         ->name('delivery_sources.delivery_source.show')
         ->where('id', '[0-9]+');

    Route::get('/{deliverySource}/edit','DeliverySourcesController@edit')
         ->name('delivery_sources.delivery_source.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'DeliverySourcesController@store')
         ->name('delivery_sources.delivery_source.store');
               
    Route::put('delivery_source/{deliverySource}', 'DeliverySourcesController@update')
         ->name('delivery_sources.delivery_source.update')
         ->where('id', '[0-9]+');

    Route::delete('/delivery_source/{deliverySource}','DeliverySourcesController@destroy')
         ->name('delivery_sources.delivery_source.destroy')
         ->where('id', '[0-9]+');

});
