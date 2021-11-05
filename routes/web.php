<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::resource('/users', UserController::class);

Route::get('/', 'App\Http\Controllers\UserController@index');
Route::get('/create', 'App\Http\Controllers\UserController@create');
Route::get('/show/{user}', 'App\Http\Controllers\UserController@show');
Route::get('/edit/{user}', 'App\Http\Controllers\UserController@edit');
Route::get('/update', 'App\Http\Controllers\UserController@update');
Route::get('/delete/{user}', 'App\Http\Controllers\UserController@destroy');
Route::post('/store', 'App\Http\Controllers\UserController@store');

Route::get('/export', 'App\Http\Controllers\UserController@export');
Route::get('/pdf/{user}', 'App\Http\Controllers\UserController@pdf');
