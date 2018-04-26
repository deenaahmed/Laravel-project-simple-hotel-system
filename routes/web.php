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


/*

Mai Section 



*/
Route::get('receptionist','UsersController@home');
Route::get('receptionist/manage','UsersController@manageClients');
Route::get('receptionist/approved','UsersController@approvedClients');
Route::get('receptionist/reservations','UsersController@reservations');
Route::get('receptionist/{id}/approve','UsersController@approve');
Route::get('receptionist/{id}/delete','UsersController@delete');
//*********************************Admin*****
Route::get('admin/clients','UsersController@showClients');
Route::get('admin/clients/{id}/edit','UsersController@editClient');
Route::get('admin/clients/{id}/delete','UsersController@deleteClient');
/*


Deena Section 


*/

Route::get(
    'managers',
    'ManagersController@index'
)->name('managers.index');
Route::get(
    'receptionists',
    'ReceptionistsController@index'
)->name('receptionists.index');
Route::get('managers/create','ManagersController@create');
Route::get('managers/getdata','ManagersController@getdata')->name('managers.data');
Route::post('managers','ManagersController@store');
Route::get('managers/{id}/edit','ManagersController@edit');
Route::put('managers/{id}','ManagersController@update');
Route::get('managers/{id}','ManagersController@show');
Route::delete('managers/{id}','ManagersController@destroy');

Route::get('receptionists/create','ReceptionistsController@create');
Route::get('receptionists/getdata','ReceptionistsController@getdata')->name('receptionists.data');
Route::post('receptionists','ReceptionistsController@store');
Route::get('receptionists/{id}/edit','ReceptionistsController@edit');
Route::put('receptionists/{id}','ReceptionistsController@update');
Route::get('receptionists/{id}','ReceptionistsController@show');
Route::delete('receptionists/{id}','ReceptionistsController@destroy');

/*


Aya Section 


*/

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
