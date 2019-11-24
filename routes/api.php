<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Employee;
use App\Http\Controllers\User;

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

Route::post('login', 'UserController@login');
Route::post('register', 'UserController@register');

Route::group(['middleware' => 'auth:api'], function(){
    Route::get('/employees', 'EmployeeController@store');
    Route::post('/employee/add', 'EmployeeController@create');
    Route::get('/employee/show/{id}', 'EmployeeController@show');
    Route::post('/employee/edit/{id}', 'EmployeeController@edit');
    Route::delete('/employee/destroy/{id}', 'EmployeeController@destroy');
});