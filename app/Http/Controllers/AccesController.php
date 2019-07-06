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


    public function change_user(Request $request)
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

     public function find_user(Request $request)
    {   /*se esta actualizando*/
                            
        $usr=strval($request->user);
        $matchThese = ['user' => $usr];
        $user = Login::where($matchThese)->first();
        
        return view('history.AdminPanel.editUser')->with('userdata',$user);       
    }

    public function xmultifind(Request $request)
    {   /*se esta actualizando*/
        $ert=strval($request->findit);
        if ($request->findit<>''){
                $user = Login::where('identification', 'like', "%{$request->findit}%")->
                                          orWhere('user', 'like', "%{$request->findit}%")->
                                          orWhere('name', 'like', "%{$request->findit}%")->
                                          orWhere('surname', 'like', "%{$request->findit}%")->get();
                                 } else { $user = Login::get();}

        if (!is_null($user)) {  
                                return view('history.AdminPanel.Userindex')->with('user',$user);
                                }
        else { return view('history.AdminPanel.layout')->with('user',$user); }   
    }

    public function edit_user(Request $request)
    {   /*se esta actualizando*/               
        $usr=strval($request->user);
        $psw=strval($request->password);
        $matchThese = ['user' => $usr];
        $user = Login::where($matchThese)->first();
        if (is_null($user)) { $user=$request; }

        return view('history.AdminPanel.editUser')->with('userdata',$user);    
    }

    public function user_store(Request $request)
    {   
       $ert=strval($request->user);
        
       $usr = Login::where('user','=', $ert)->first();
        if (!is_null($usr)){ $usr->update($request->all()); }                
            else { if (!$request->user='') $usr = Login::create($request->all()); }                       
        return view('history.AdminPanel.editUser')->with('userdata',$usr);
    }

    public function destroy(Request $request){ 
    $user=Login::where('user','=', $request->user)->first();
    $user->delete();
     $user = Login::get();
    return view('history.AdminPanel.Userindex')->with('user',$user);  
    }


    public function logoff(Request $request) {

        if(!isset($_SESSION)){
        session_start();
    } 
    session_destroy();

    return redirect('/login');
    }
}
