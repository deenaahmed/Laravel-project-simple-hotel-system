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
    return view('welcome ');
});
Route::get(
    'managers',
    'ManagerController@index'
)->name('managers.index');
Route::get('admin', function () {
    return view('admin.admin_template');
});
Route::get('managers/create','ManagerController@create');
Route::post('managers','ManagerController@store');
Route::get('managers/{id}/edit','ManagerController@edit');
Route::put('managers/{id}','ManagerController@update');
Route::get('managers/{id}','ManagerController@show');
Route::delete('managers/{id}','ManagerController@destroy');