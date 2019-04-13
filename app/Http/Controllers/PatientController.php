<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;

class PatientController extends Controller
{    
    public function saveCurrentMedication(Request $request){

        return $request;
    }
    
    public function index()
    {
        return Patient::all();
    }


    public function pfind(Request $request)
    {	
    	$ert=strval($request->identification);
    	$patient = Patient::where('identification','=', $ert)->first();
    	if (count($patient)>0){ $identification=$patient->identification;
    							return view('history.patientcreate')->with('patient',$patient);
    			 				}
    	else { return view('history.patientcreate')->with('identification',$ert); }	
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
    							  $patient->update($request->all()); 
    			 				}
    			 				
    		else { if (!$request->identification=null) $patient = Patient::create($request->all()); 
			    			
    		}	 					
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


}
