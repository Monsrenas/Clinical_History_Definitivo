@extends('history.layout')

@section('eltema')
<?php use App\Physiciansnote; ?>
        
@if (isset($patient))
           <?php $identification=$patient->identification;  ?>
 @else         
           <?php                     
            $patient=new Physiciansnote;
            if (!isset($identification)) {$identification="";}
             $patientActive=false;
            ?>  
@endif

@if (isset($_SESSION['identification']))
           <?php 
                $identification=($_SESSION['identification']);  
            ?>
@endif
<form  action="{{url('almacena')}}" method="post" style="width: 100%; text-align: center;margin: 20px;">
	@csrf 	
    <input type="hidden" name="identification"  placeholder="Identification number" value='{{ $identification }}'>

    <input type="hidden" name="url"  value='history.PHYSICIANSNOTE'>
    <input type="hidden" name="dtt"  value='7'>


	<strong>PHYSICIANS NOTE</strong><br>
	<textarea style="resize: none;" rows = "5" cols = "100%" name = "note" >{{ $patient->note }}</textarea>

	<br><strong>DIAGNOSIS:</strong><br>
    <textarea style="resize: none;" rows = "5" cols = "100%" name = "diagnosis">{{ $patient->diagnosis }}</textarea>

    <div class="form-group">
		 <br><strong>TREATMENT PLAN:</strong><br> 
		 <textarea style="resize: none;" rows = "5" cols = "100%" name = "plan">{{ $patient->plan }}</textarea>
    </div>

    <div class="form-group">
        <br><strong>FOLLOW UP:</strong>
        <input type="text" name="followup" value="{{ $patient->followup }}" class="form-inline"   maxlength="30" size="30" required>
    </div>

    <div class="form-group">
        <br><strong>PHYSICIAN:</strong>
        <input type="text" name="physician" value="{{ $patient->physician }}" class="form-inline"   maxlength="30" size="30" required>        
    </div>

 	<div class="form-inline">
        <div class="form-group">
            <strong>DATE:</strong>
            <input type="date" name="date" value="{{ $patient->date }}" class="form-inline"   maxlength="30" size="30" required>
        </div>
     </div>


	<div class="col-xs-12 col-sm-12 col-md-12 text-center">
       	<button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>
@endsection