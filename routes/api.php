<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('floors','api\FloorsController@store');
Route::get('floors','api\FloorsController@index')->middleware('jwt.auth');

Route::middleware('jwt.auth')->get('users', function(Request $request) {
    return auth()->user();
});