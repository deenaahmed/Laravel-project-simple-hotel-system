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
    'ManagersController@index'
)->name('managers.index');
Route::get('admin', function () {
    return view('admin.admin_template');
});
Route::get('managers/create','ManagersController@create');
Route::post('managers','ManagersController@store');
Route::get('managers/{id}/edit','ManagersController@edit');
Route::put('managers/{id}','ManagersController@update');
Route::get('managers/{id}','ManagersController@show');
Route::delete('managers/{id}','ManagersController@destroy');