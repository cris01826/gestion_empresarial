<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index');
Route::resource('users', UserController::class);
Route::post('/createUser', 'UserController@createUser');
Route::post('/updateUser', 'UserController@updateUser');
Route::post('/findUser', 'UserController@findUser');
Route::delete('/deleteUser', 'UserController@deleteUser');
Route::post('/deparments', 'DepartmentsController@departmentByCountry');
Route::post('/cities', 'CitiesController@cityByDepartment');


