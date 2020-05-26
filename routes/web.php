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

Route::get('/', 'PagesController@index');
Route::get('/contact', 'PagesController@contact');
Route::resource('cars', 'CarsController');
Auth::routes([ 'register' => false ]);
Route::resource('admin', 'AdminController')->only([
    '__construct', 'index', 'create', 'store', 'edit', 'update' 
]);
Route::get('/delete/{id}', 'AdminController@destroy');
Route::get('dropzone/admin','ImageController@index');
Route::post('dropzone/store','ImageController@store');
Route::get('/erase/{id}','ImageController@destroy');

Route::get('/destruct/{id}', 'MainTitlesController@destroy');
Route::post('/store', 'MainTitlesController@store');

Route::post('/admin/{id}/change_my_position','AdminController@change_position');

Route::get('/admin/getMonthlyCarData', 'AdminController@getMonthlyCarData');

