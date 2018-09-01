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

Route::get('/','EmployeesController@start');

Route::get('/employees/create','EmployeesController@create');
Route::post('/employees','EmployeesController@store');
Route::delete('/employees/{employee}','EmployeesController@destroy');
Route::get('/employees/{employee}/edit','EmployeesController@edit');


