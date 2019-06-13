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
    return view('auth.login');
});

Route::get('lang/{lang}/{dir}', 'HomeController@lang');

Auth::routes();

Route::group(['namespace'=>'Dashboard', 'prefix'=>'dashboard', 'middleware'=>'auth'], function () {
  Route::resource('company', 'CompanyController');
  Route::resource('employee', 'EmployeeController');
});
