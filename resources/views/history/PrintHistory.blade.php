<style type="text/css">
	 hr {	page-break-after: always;
 		border: 0;
		margin: 0;
		padding: 0;	}
</style>

<?php 
	use \App\Http\Controllers\PatientController; 
    use App\Physical; 
    use App\Lastmedical; 
    $patient=new Physical;
	if(!isset($_SESSION)){
    session_start();
	}

	{{ $RESULT=PatientController::TeamFind(); }}
	$RESULT=$RESULT['RESULT'];
 ?>
 <div style="border: 1px solid black;"> 	
	@include('history.Print.PRN_ShowPatientsData')
 	@include('history.Print.PRN_LastMedicalHistory')
    @include('history.Print.PRN_CurrentMedication')
 </div>

 <hr>
 @include('history.Print.PRN_PhysicalExamination')

