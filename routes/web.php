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
Route::get('/login', function () {
    return view('history.LoginPage');
});

Route::group(['middleware' => 'IsAuten'], function(){
		Route::get('/', 'PatientController@pfind');
		Route::get('/LastMedicalHistory', 'PatientController@LastMedicalHistoryfind');
		Route::get('/CurrentMedication', 'PatientController@CurrentMedicationfind');
		Route::get('SocialHistory', 'PatientController@SocialHistoryfind');
		Route::get('FamilyHistory', 'PatientController@FamilyHistoryfind');
		Route::get('SurgicalHistory', 'PatientController@SurgicalHistoryfind');
		Route::get('SustanceUse', 'PatientController@SustanceUsefind');
		Route::get('PhysicalExamination', 'PatientController@PhysicalExaminationfind');
		Route::get('PHYSICIANSNOTE', 'PatientController@PHYSICIANSNOTEfind');
		Route::get('ChangePatient', 'PatientController@changePatient');
    });

Route::get('PatienCng/{iden}', function($iden){
	if(!isset($_SESSION)){
    session_start();
} 
	$_SESSION['identification']=$iden;
	return  redirect('/');
});

Route::post('almacena', 'PatientController@almacena');
Route::post('pfind','PatientController@pfind');
Route::post('add','PatientController@store');
Route::post('Genfind','PatientController@Genfind');
Route::get('multifind','PatientController@multifind');

Route::get('delete','PatientController@destroy');


Route::post('accestrue','AccesController@find');
Route::get('userlogout','AccesController@logoff');

/*Route::get('patient`','PatientController@index');
Route::get('edit/{id}','PatientController@edit');
Route::post('edit/{id}','PatientController@update');
Route::delete('{id}','PatientController@destroy');*/


