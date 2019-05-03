<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Lastmedical;
use App\Currentmedication;
use App\Socialhistory;
use App\Familyhistory;
use App\Surgicalhistory;
use App\Sustanceuse;
use App\Physical;


if(!isset($_SESSION)){
    session_start();
}

class PatientController extends Controller
{    
    
    public function index()
    {
        return Patient::all();
    }


    public function pfind(Request $request)
    {	
       
        $ert=strval($request->identification);

        if ($ert=='') { if (!isset($_SESSION['identification'])) { $_SESSION['identification'] = '';}
        else { $ert=$_SESSION['identification'];}
        }
    	$patient = Patient::where('identification','=', $ert)->first();
    	if (count($patient)>0){ $identification=$patient->identification;
                                $_SESSION['identification'] = $identification;
    							return view('history.PATIENTDATA')->with('patient',$patient);
    			 				}
    	else { return view('history.PATIENTDATA')->with('identification',$ert); }	
	}

    public function npfind(Request $request)
    {   
        $ert=strval($request->identification);

        $patient = Patient::where('identification','=', $ert)->first();
        if (count($patient)>0){  if ($request->ajax()) {
                                                        return response()->json(["data"=>$patient]);
                                                        } 
                                    $identification=$patient->identification;
                                return view('history.patientcreate')->with('patient',$patient);
                                }
        else { if ($request->ajax()) {  return response()->json([ "identification"=>$ert ]);  } 
            }   
    }



    public function show($request) {
      return Patient::find($request);
    }

    public function store(Request $request)

    {	
       /*$pasiente = Patient::create(['name' => ['John'=>'Medico']]);  creacion de colecciones anidadas*/

       $ert=strval($request->identification);

       $patient = Patient::where('identification','=', $ert)->first();
    	if (count($patient)>0){ $identification=$patient->identification;
    							  $patient->update($request->all());         }		 				
    		else { if (!$request->identification=null) $patient = Patient::create($request->all()); }	 					
    	return view('history.patientcreate')->with('patient',$patient);	
    }

    public function update(Request $request, $id)
    {
        $patient=Patient::findOrFail($id);
        $patient->update($request-all());
        return $patient;
	}
    public function destroy(Request $request, $id){ 
    $patient=Patient::findOrFail($id);
    $patient->delete();
    return 204;  
	}

    public function LastMedicalHistoryfind(Request $request)
    {   
        $ert=strval($request->identification);

        if ($ert=='') { if (!isset($_SESSION['identification'])) { $_SESSION['identification'] = '';}
        else { $ert=$_SESSION['identification'];}
        }
        
        $patient = Lastmedical::where('identification','=', $ert)->first();
        if (count($patient)>0){ return view('history.LastMedicalHistory')->with('patient',$patient);
                                }
        else { return view('history.LastMedicalHistory')->with('identification',$ert); }   
    }


    public function modelo($ind)
    {
        switch ($ind) {
    case '0':
        return $tmodelo= new Lastmedical;
        break;
    case '1':
        return $tmodelo= new Currentmedication;
        break;
    case '2':
         return $tmodelo= new Socialhistory;
        break;
    case '3':
         return $tmodelo= new Familyhistory;
        break;
    case '4':
         return $tmodelo= new Surgicalhistory;
        break;
     case '5':
         return $tmodelo= new SustanceUse;
        break;
    case '6':
         return $tmodelo= new Physical;
        break;
}
    }




    public function Genfind($request, $classdata)
    {   $ert=strval($request->identification);

        if ($ert=='') { if (!isset($_SESSION['identification'])) { $_SESSION['identification'] = '';}
        else { $ert=$_SESSION['identification'];}

        }

        $patient = $classdata::where('identification','=', $ert)->first();  
        $ert=strval($request->identification);         
        return $patient; 
    }

    public function encuentra(Request $request) 
    {
        $classdata=$this->modelo($request->dtt);
        $vista=$request->url;
        $result=$this->Genfind($request, $classdata);
        return view('history.LastMedicalHistory')->with('patient',$result); 
    }


      public function Genstore(Request $request, $classdata)
    {   
       $ert=strval($request->identification);
        
        if (is_null($ert)) { if (!isset($_SESSION['identification'])) { $_SESSION['identification'] = '';}
                        }
        else { $ert=$_SESSION['identification'];}

       $patient = $classdata::where('identification','=', $ert)->first();
        if (count($patient)>0){ $patient->update($request->all()); }                
            else { if (!$request->identification=null) $patient = $classdata::create($request->all()); }                       
        return $patient; 
    }

     public function almacena(Request $request) 
    {   $classdata=$this->modelo($request->dtt);
        $vista=$request->url;
        $result=$this->Genstore($request, $classdata);
        return view($vista)->with('patient',$result); 
    }

    public function CurrentMedicationfind(Request $request)
    { 
        $classdata=$this->modelo('1');   
        $result=$this->Genfind($request, $classdata);
        return view('history.CurrentMedication')->with('patient',$result); 
    }

        public function SocialHistoryfind(Request $request)
    { 
        $classdata=$this->modelo('2');   
        $result=$this->Genfind($request, $classdata);
        return view('history.SocialHistory')->with('patient',$result); 
    }

    public function FamilyHistoryfind(Request $request)
    {  
        $classdata=$this->modelo('3');   
        $result=$this->Genfind($request, $classdata);
        return view('history.FamilyHistory')->with('patient',$result); 
    }
    public function SurgicalHistoryfind(Request $request)
    {   $classdata=$this->modelo('4');   
        $result=$this->Genfind($request, $classdata);
        return view('history.SurgicalHistory')->with('patient',$result); 
    }

    public function SustanceUsefind(Request $request)
    {   $classdata=$this->modelo('5');   
        $result=$this->Genfind($request, $classdata);
        return view('history.SustanceUse')->with('patient',$result); 
    }

    public function PhysicalExaminationfind(Request $request)
    {   $classdata=$this->modelo('6');   
        $result=$this->Genfind($request, $classdata);
        return view('history.PhysicalExamination')->with('patient',$result); 
    }

    
}
