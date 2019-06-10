<?php

namespace App\Http\Controllers;
use App\Login;

use Illuminate\Http\Request;

class AccesController extends Controller
{
    public function index()
    {
        return Login::all();
    }


    public function find(Request $request)
    {	/*se esta actualizando*/
        if(!isset($_SESSION)){
                                session_start();
                            }
                            
        $usr=strval($request->user);
        $psw=strval($request->password);

    	$user = Login::where('user','=', $usr)->first();
    	if (!is_null($user)) {  $_SESSION['user'] = $user->user;
                                $_SESSION['name' ]= $user->name." ".$user->surname;
                                return redirect('/');
    			 				}

    	else { if (isset($_SESSION['user'])) { 
                                                unset($_SESSION['user']);
                                                unset($_SESSION['name']); 
                                              }	
             }
        return redirect('login');       
	}}
