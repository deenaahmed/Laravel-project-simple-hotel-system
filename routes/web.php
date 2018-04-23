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
########## Floors Routes ############
Route::get('floors','FloorsController@index');
Route::get('floors/getdatatable','FloorsController@getdatatable');
Route::get('floors/create','FloorsController@create');
Route::post('floors','FloorsController@store');
Route::get('floors/{id}/edit','FloorsController@edit');
Route::patch('floors/{id}','FloorsController@update');
Route::delete('floors/{id}', 'FloorsController@delete');

/*____________________________________
#### Rooms Routes #################
*/
Route::get('rooms','RoomsController@index');
Route::get('rooms/getdatatable','RoomsController@getdatatable');
Route::get('rooms/create','RoomsController@create');
Route::post('rooms','RoomsController@store');
Route::get('rooms/{id}/edit','RoomsController@edit');
Route::patch('rooms/{id}','RoomsController@update');
Route::delete('rooms/{id}', 'RoomsController@delete');

