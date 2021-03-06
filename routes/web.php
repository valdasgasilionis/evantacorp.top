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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/patients','PatientController');
Route::resource('/requisitions','RequisitionController');
Route::resource('/reports','ReportController');
Route::resource('/macros','MacroController');
Route::resource('/histologies','HistologyController');
Route::resource('/immunos','ImmunoController');
Route::get('/admin','AdminController@index');
