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

Route::get('/', function () {
    return view('welcome');
});

Route::get('product', 'ProductController@index');
Route::get('product/{id}', 'ProductController@get');
Route::post('product', 'ProductController@create');
Route::put('product/{id}', 'ProductController@update');
Route::delete('product/{id}', 'ProductController@destroy');

Route::get('document', 'DocumentController@index');
Route::get('document/{id}', 'DocumentController@get');
Route::post('document', 'DocumentController@create');
Route::put('document/{id}', 'DocumentController@update');
Route::delete('document/{id}', 'DocumentController@destroy');

Route::get('city', 'CityController@index');
Route::get('city/{id}', 'CityController@get');
Route::post('city', 'CityController@create');
Route::put('city/{id}', 'CityController@update');
Route::delete('city/{id}', 'CityController@destroy');

Route::get('row', 'RowController@index');
Route::get('row/{id}', 'RowController@get');
Route::post('row', 'RowController@create');
Route::put('row/{id}', 'RowController@update');
Route::delete('row/{id}', 'RowController@destroy');

Route::get('manager', 'ManagerController@index');
Route::get('manager/{id}', 'ManagerController@get');
Route::post('manager', 'ManagerController@create');
Route::put('manager/{id}', 'ManagerController@update');
Route::delete('manager/{id}', 'ManagerController@destroy');

Route::get('contractor', 'ContractorController@index');
Route::get('contractor/{id}', 'ContractorController@get');
Route::post('contractor', 'ContractorController@create');
Route::put('contractor/{id}', 'ContractorController@update');
Route::delete('contractor/{id}', 'ContractorController@destroy');

Route::get('warehouse', 'WarehouseController@index');
Route::get('warehouse/{id}', 'WarehouseController@get');
Route::post('warehouse', 'WarehouseController@create');
Route::put('warehouse/{id}', 'WarehouseController@update');
Route::delete('warehouse/{id}', 'WarehouseController@destroy');

Route::get('storage', 'StorageController@index');
Route::get('storage/{id}', 'StorageController@get');
Route::post('storage', 'StorageController@create');
Route::put('storage/{id}', 'StorageController@update');
Route::delete('storage/{id}', 'StorageController@destroy');

Route::get('balance-sheet', 'BalanceSheetController@index');

