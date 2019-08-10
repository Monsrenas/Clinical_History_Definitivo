<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Interrogation;
use App\Lastmedical;
use App\Currentmedication;
use App\Socialhistory;
use App\Familyhistory;
use App\Surgicalhistory;
use App\Sustanceuse;
use App\Physical;
use App\Physiciansnote;


if(!isset($_SESSION)){
    session_start();
}

class PatientController extends Controller
{    
    
    public function index()
    {
        return Patient::all();
    }

/* $query->where('username', 'like', "%{$request->username}%");busqueda de coincidencias */ 
    public function pfind(Request $request)
    {	/*se esta actualizando*/
        $retrnurl='history.ShowPatientsData';

        if (isset($request->edition)) { $_SESSION['identification'] = '';
                                        $_SESSION['name']='';
                                        $retrnurl = 'history.PATIENTDATA';}

        $ert=strval($request->identification);

        if ($ert=='') { if (!isset($_SESSION['identification'])) { $_SESSION['identification'] = '';}
        else { $ert=$_SESSION['identification'];}
        }
    	$patient = Patient::where('identification','=', $ert)->first();
    	if (!is_null($patient)) { $identification=$patient->identification;
                                $_SESSION['identification'] = $identification;
                                $_SESSION['name']=$patient->name." ".$patient->surname;
    							return view($retrnurl)->with('patient',$patient);
    			 				}
    	else { return view($retrnurl)->with('identification',$ert); }	
	}

    public function multifind(Request $request)
    {   /*se esta actualizando*/

        $ert=strval($request->findit);
        if ($request->findit<>''){
                $patient = Patient::where('identification', 'like', "%{$request->findit}%")->
                                          orWhere('name', 'like', "%{$request->findit}%")->
                                          orWhere('surname', 'like', "%{$request->findit}%")->get();
                                 } else { $patient = Patient::get();}

        if (!is_null($patient)) { 
                                return view('history.PatientIndex')->with('patient',$patient);
                                }
        else { return view('history.ShowPatientsData')->with('identification',$ert); }   
    }
    

    public function show($request) {
      return Patient::find($request);
    }

    public function store(Request $request)

    {	
       /*$pasiente = Patient::create(['name' => ['John'=>'Medico']]);  creacion de colecciones anidadas*/

       $ert=strval($request->identification);

       $patient = Patient::where('identification','=', $ert)->first();
    	if (!is_null($patient)){ $identification=$patient->identification;
    							  $patient->update($request->all());  
                                  $_SESSION['identification'] = $request->identification; 
                                  $_SESSION['name']=$patient->name." ".$patient->surname;       }		 				
    		else { if (!$request->identification=null) $patient = Patient::create($request->all()); 
                           $_SESSION['identification'] = $request->identification; 
                           $_SESSION['name']=$patient->name." ".$patient->surname;}	 					
    	return view('/history.ShowPatientsData')->with('patient',$patient);	
    }

    public function update(Request $request, $id)
    {
        $patient=Patient::findOrFail($id);
        $patient->update($request-all());
        return $patient;
	}

    public function destroy(Request $request){ 
    $patient=Patient::where('identification','=', $request->identification)->first();
    $patient->delete();
     $patient = Patient::get();
    return view('history.PatientIndex')->with('patient',$patient);  
	}

    public function modelo($ind)
    {
        switch ($ind) {
     case 'Interrogation':
         return $tmodelo= new Interrogation;
        break;
    case 'LastMedicalHistory':
        return $tmodelo= new Lastmedical;
        break;
    case 'CurrentMedication':
        return $tmodelo= new Currentmedication;
        break;
    case 'SocialHistory':
         return $tmodelo= new Socialhistory;
        break;
    case 'FamilyHistory':
         return $tmodelo= new Familyhistory;
        break;
    case 'SurgicalHistory':
         return $tmodelo= new Surgicalhistory;
        break;
     case 'SustanceUse':
         return $tmodelo= new SustanceUse;
        break;
    case 'PhysicalExamination':
         return $tmodelo= new Physical;
        break;
    case 'PHYSICIANSNOTE':
         return $tmodelo= new Physiciansnote;
        break;
        }
    }


    public function Genfind($request, $classdata)
    {  
        if (isset($_SESSION['identification'])) {
                    $ert=$_SESSION['identification'];}
            else { $ert=strval($request->identification); }
         /*   
        }
        if ($ert=='') { if (!isset($_SESSION['identification'])) { $_SESSION['identification'] = '';}
        else { $ert=$_SESSION['identification'];} }*/

        $patient = $classdata::where('identification','=', $ert)->first();  
        $ert=strval($request->identification);         
        return $patient; 
    }

    public function changePatient($identi)
        {

            $_SESSION['identification']=$identi;
            view('/history.ShowPatientsData');
        }


      public function Genstore(Request $request, $classdata)
    {   
       $ert=strval($request->identification);
        
        if (is_null($ert)) { if (!isset($_SESSION['identification'])) { $_SESSION['identification'] = '';}
                        }
        else { $ert=$_SESSION['identification'];}

       $patient = $classdata::where('identification','=', $ert)->first();
        if (!is_null($patient)){ $patient->update($request->all()); }                
            else { if (!$request->identification='') $patient = $classdata::create($request->all()); }                       
        return $patient; 
    }

     public function almacena(Request $request) 
    {   $classdata=$this->modelo($request->dtt);
        $vista=$request->url;
        $result=$this->Genstore($request, $classdata);
        return view($vista)->with('patient',$result); 
    }

    public function Muestra(Request $request)
    {  
        $uri = $request->path();
        $classdata=$this->modelo($uri);   
        $result=$this->Genfind($classdata, $classdata);
        return view('history.'.$uri)->with('patient',$result); 
    }

    static function TeamFind() 
    {       
        
                $rutas= [       "Interrogation",
                                "LastMedicalHistory",
                                "CurrentMedication",
                                "SocialHistory", 
                                "FamilyHistory",
                                "SurgicalHistory",
                                "SustanceUse",
                                "PhysicalExamination",
                                "PHYSICIANSNOTE",
                                "Patient"
                                                ];

                if (isset($_SESSION['identification'])) { $who=$_SESSION['identification'];} else {$who='';}

                foreach ($rutas as $key => $value) {
                   $uri = $value;

                    switch ($value) {
                        case "Interrogation": $tmodelo= new Interrogation;         break;
                        case 'LastMedicalHistory': $tmodelo= new Lastmedical;      break;
                        case 'CurrentMedication': $tmodelo= new Currentmedication; break;
                        case 'SocialHistory': $tmodelo= new Socialhistory;         break;
                        case 'FamilyHistory': $tmodelo= new Familyhistory;         break;
                        case 'SurgicalHistory': $tmodelo= new Surgicalhistory;     break;
                        case 'SustanceUse': $tmodelo= new SustanceUse;             break;
                        case 'PhysicalExamination': $tmodelo= new Physical;        break;
                        case 'PHYSICIANSNOTE': $tmodelo= new Physiciansnote;       break;
                        case 'Patient':        $tmodelo= new Patient;       break; }   

                    $classdata=$tmodelo;
                  
                    $result[$key] = $classdata::where('identification','=', $who)->first();  

                }
            
             return view('history.PrintHistory')->with('RESULT',$result);   

    }

    
}
