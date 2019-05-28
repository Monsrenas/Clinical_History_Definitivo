<?php

namespace App\Http\Controllers;
use Illuminate\Http\Login;

use Illuminate\Http\Request;

class AccesController extends Controller
{
    public function index()
    {
        return Login::all();
    }


    public function find(Request $request)
    {	/*se esta actualizando*/
       
        $usr=strval($request->user);
        $psw=strval($request->password);
        if |($usr=='') { if (!isset($_SESSION['user'])) { $_SESSION['user'] = '';}
        else { $usr=$_SESSION['user'];}
        }
    	$user = Login::where('admin','=', $usr)->first();
    	if (!is_null($user)) { $user=$user->user;
                                $_SESSION['identification'] = $identification;
                                $_SESSION['name']=$patient->name." ".$patient->surname;
    							return view('history.PATIENTDATA')->with('patient',$patient);
    			 				}
    	else { return view('history.PATIENTDATA')->with('identification',$ert); }	
	}}
