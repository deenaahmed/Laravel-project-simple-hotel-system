<?php
use App\User;
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

/*


Diaa Section 


*/

Route::get('/' , 'clients\ClientReservationController@index')->name('client.home');
Route::resource('/reservations/rooms', 'clients\ClientReservationController')->except([
    'index']);

Route::get('/client/reservations/{id}' , 'clients\LastClientReservationController@show')->name('client.reservations');
Route::get('/client/reservations/' , 'clients\LastClientReservationController@index')->name('client.reservations.index');



/*

Mai Section 



*/
Route::get('receptionist','UsersController@home')->middleware('forbid-banned-user');
Route::get('receptionist/manage','UsersController@manageClients')->middleware('forbid-banned-user');
Route::get('receptionist/approved','UsersController@approvedClients')->middleware('forbid-banned-user');
Route::get('receptionist/reservations','UsersController@reservations')->middleware('forbid-banned-user');
Route::get('receptionist/{id}/approve','UsersController@approve')->middleware('forbid-banned-user');
Route::get('receptionist/{id}/delete','UsersController@delete')->middleware('forbid-banned-user');
//*********************************Admin*****
Route::get('admin/clients','UsersController@showClients')->middleware('forbid-banned-user');
Route::get('admin/clients/{id}/edit','UsersController@editClient')->middleware('forbid-banned-user');
Route::get('admin/clients/{id}/delete','UsersController@deleteClient')->middleware('forbid-banned-user');
/*


Deena Section 


*/

Route::get(
    'managers',
    'ManagersController@index'
)->name('managers.index')->middleware('forbid-banned-user');
Route::get(
    'receptionists',
    'ReceptionistsController@index'
)->name('receptionists.index')->middleware('forbid-banned-user');
Route::get('managers/create','ManagersController@create')->middleware('forbid-banned-user');
Route::get('managers/getdata','ManagersController@getdata')->name('managers.data')->middleware('forbid-banned-user');
Route::post('managers','ManagersController@store')->middleware('forbid-banned-user');
Route::get('managers/{id}/edit','ManagersController@edit')->middleware('forbid-banned-user');
Route::put('managers/{id}','ManagersController@update')->middleware('forbid-banned-user');
Route::get('managers/{id}','ManagersController@show')->middleware('forbid-banned-user');
Route::delete('managers/{id}','ManagersController@destroy')->middleware('forbid-banned-user');

Route::get('receptionists/create','ReceptionistsController@create')->middleware('forbid-banned-user');
Route::get('receptionists/getdata','ReceptionistsController@getdata')->name('receptionists.data')->middleware('forbid-banned-user');
Route::post('receptionists','ReceptionistsController@store')->middleware('forbid-banned-user');
Route::get('receptionists/{id}/edit','ReceptionistsController@edit')->middleware('forbid-banned-user');
Route::put('receptionists/{id}','ReceptionistsController@update')->middleware('forbid-banned-user');
Route::get('receptionists/{id}','ReceptionistsController@show')->middleware('forbid-banned-user');
Route::delete('receptionists/{id}','ReceptionistsController@destroy')->middleware('forbid-banned-user');
Route::get('receptionists/{id}/bann','ReceptionistsController@bann')->middleware('forbid-banned-user');
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
Route::delete('rooms/{id}','RoomsController@delete');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home')->middleware('forbid-banned-user');

