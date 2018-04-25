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

Route::get('admin/clients/add','UsersController@addClient');

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
