@extends('history.layout')

@section('eltema')
<?php use App\Examfiles; 
	
	if(!isset($_SESSION)){
    session_start();
	}
	$_SESSION['opcion']='bott11';

?>

@if (isset($_SESSION['identification']))
           <?php 
           		$identification=($_SESSION['identification']);  
			?>
@endif


 @if (isset($patient))
           <?php $identification=$patient->identification;  ?>
 @else         
           <?php                     
            $patient=new Examfiles;
            if (!isset($identification)) {$identification="";}
             $patientActive=false;
            ?>  
@endif
<script type="text/javascript">
	
	function handleFile($filename)
	{	var f=new Date();
		$tdate=f.getFullYear()+"-"+f.getMonth()+"-"+f.getDate();

		var ELM = document.getElementById('pathnewfile');
		ELM.value=$tdate.toString()+"_"+$filename[0].name;
	}


</script>
<div style="padding: 1%; border-width:1px; border-style:solid; border-color:#000000; align: center; background: rgba(128, 255, 0, 0.3); ">
<form  action="{{url('almacena')}}" method="post" style="width: 100%; text-align: center;">
	@csrf 	

	<input type="hidden" name="identification"  placeholder="Identification number" value='{{ $identification }}'>
	<input type="hidden" name="url"  value='history.ExamFiles'>
	<input type="hidden" name="dtt"  value='Exams'>

	<div class="form-group">
        <strong>Exam Title</strong>
        <input type="text" name="exams[0][]" value="" class="form-inline"   maxlength="30" size="30" required>
    </div>

	<div class="form-group">
	    <strong>Exam Description:</strong><br>
	   <textarea rows = "5" cols = "100%" name = "exams[1][]">
	           
	   </textarea>
	</div>

	<input type="hidden" id="pathnewfile" name="exams[2][]"   value='' required>

	<div class="form-group">
        <br><strong>Files:</strong>
        <input type="file" name="upFile" value="" class="form-inline"  onchange="handleFile(this.files)" required>
    </div>

	<div class="col-xs-12 col-sm-12 col-md-12 text-center" style="margin-top: 12px;">
       	<button type="submit" class="btn btn-primary glyphicon glyphicon-floppy-save"> Save</button>
    </div>
</form>
</div>
@endsection