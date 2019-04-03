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
    return view('history.patientcreate');
});


Route::post('add','PatientController@store');
Route::get('patient`','PatientController@index');
Route::get('edit/{id}','PatientController@edit');
Route::post('edit/{id}','PatientController@update');
Route::delete('{id}','PatientController@destroy');
