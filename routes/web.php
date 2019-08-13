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
if(!isset($_SESSION)){
    session_start();
}

Route::get('/login', function () {
    return view('history.LoginPage');
});

Route::group(['middleware' => 'IsAuten'], function(){
		/*Route::get('/', 'PatientController@pfind');*/

	Route::name('print')->get('/imprimir', 'GeneradorController@imprimir');

		if ((isset($_SESSION['user']))&&($_SESSION['acceslevel']>4)) {
		Route::get('/', function () {
    		return view('history.AdminPanel.layout');
		});
		} else {

				Route::get('/', 'PatientController@pfind');
				if ((isset($_SESSION['user']))&&($_SESSION['acceslevel']>1)){
								Route::get('Interrogation', 'PatientController@Muestra'); 	
								Route::get('/LastMedicalHistory', 'PatientController@Muestra');
								Route::get('/CurrentMedication', 'PatientController@Muestra');
								Route::get('SocialHistory', 'PatientController@Muestra');
								Route::get('FamilyHistory', 'PatientController@Muestra');
								Route::get('SurgicalHistory', 'PatientController@Muestra');
								Route::get('SustanceUse', 'PatientController@Muestra');
								Route::get('PhysicalExamination', "PatientController@Muestra");
								Route::get('PHYSICIANSNOTE', 'PatientController@ShowSpecialistNote');
								Route::get('ChangePatient', 'PatientController@changePatient');
								Route::get('PrintHistory','PatientController@TeamFind');
							}		
		}

		
    });

Route::get('PatienCng/{iden}', function($iden){
	if(!isset($_SESSION)){
    session_start();
} 
	$_SESSION['identification']=$iden;
	return  redirect('/');
});

/*Patient operations*/
Route::post('almacena', 'PatientController@almacena');
Route::post('pfind','PatientController@pfind');
Route::post('add','PatientController@store');
Route::post('Genfind','PatientController@Genfind');
Route::get('multifind','PatientController@multifind');
Route::get('delete','PatientController@destroy');

/*User operation*/

Route::post('USERmultifind','AccesController@xmultifind');

Route::post('accestrue','AccesController@change_user');

Route::post('changepassword', function () {
    return view('history.AdminPanel.Changepassword');
});

Route::get('userlogout','AccesController@logoff');
Route::post('edituser','AccesController@edit_user');
Route::post('finduser','AccesController@find_user');
Route::post('saveuser','AccesController@user_store');
Route::get('deleteuser','AccesController@destroy');
Route::post('dochangepassword','AccesController@change_password');

Route::get('UserCng/{iden}', function($iden){
	if(!isset($_SESSION)){
    session_start();
} 
	$_SESSION['user']=$iden;
	return  redirect('/');
});