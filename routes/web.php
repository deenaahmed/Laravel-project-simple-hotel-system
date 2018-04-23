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



/*
Diaa Section 







*/
/*


Mai Section 






*/
/*


Deena Section 







*/
/*


Aya Section 
*/
Route::get('floors','FloorsController@index');
Route::get('floors/getdatatable','FloorsController@getdatatable');
Route::get('floors/create','FloorsController@create');
Route::post('floors','FloorsController@store');
Route::get('floors/{id}/edit','FloorsController@edit');
Route::patch('floors/{id}','FloorsController@update');
Route::delete('floors/{id}', 'FloorsController@delete');


