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
	$identification='44444444444';
    return view('history.patientcreate')->with($identification);
});

Route::post('pfind','PatientController@pfind');
Route::post('add','PatientController@store');
Route::post('save','PatientController@saveCurrentMedication');

Route::get('patient`','PatientController@index');
Route::get('edit/{id}','PatientController@edit');
Route::post('edit/{id}','PatientController@update');
Route::delete('{id}','PatientController@destroy');
