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
        $matchThese = ['user' => $usr, 'pasword' => $psw];
    	$user = Login::where($matchThese)->first();
    	if (!is_null($user)) {  $_SESSION['user'] = $user->user;
                                $_SESSION['username' ]= $user->name." ".$user->surname;
                                return redirect('/');
    			 				}

    	else { if (isset($_SESSION['user'])) { 
                                                unset($_SESSION['user']);
                                                unset($_SESSION['username']); 
                                              }	
             }
        return redirect('login');       
	}

     public function multifind(Request $request)
    {   /*se esta actualizando*/

        $ert=strval($request->findit);
        if ($request->findit<>''){
                $user = Login::where('identification', 'like', "%{$request->findit}%")->
                                          orWhere('user', 'like', "%{$request->findit}%")->
                                          orWhere('name', 'like', "%{$request->findit}%")->
                                          orWhere('surname', 'like', "%{$request->findit}%")->get();
                                 } else { $user = Login::get();}

        if (!is_null($user)) { 
                                return view('history.AdminPanel.layout')->with('user',$user);
                                }
        else { return view('history.AdminPanel.layout')->with('identification',$ert); }   
    }


    public function logoff(Request $request) {

        if(!isset($_SESSION)){
        session_start();
    } 
    session_destroy();

    return redirect('/login');
    }
}
