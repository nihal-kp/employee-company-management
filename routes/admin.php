<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Setting;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/


Auth::routes(['register' => false]);

Route::get('/', 'HomeController@index')->name('home');
Route::get('reset-password', 'HomeController@changePassword')->name('reset-password');
Route::post('update-password', 'HomeController@updatePassword')->name('update-password');
Route::resource('company', 'CompanyController');
Route::resource('employee', 'EmployeeController');
// Route::resource('user', 'UserController');