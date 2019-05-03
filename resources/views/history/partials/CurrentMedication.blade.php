<?php 
use App\Lastmedical;
$clasedat= new Lastmedical;
 ?>

<form  action="{{url('Genfind')}}" method="post">
	@csrf
	<input type="hidden" name="identification"  placeholder="Identification number" value='{{ $identification }}'>
	<input type="hidden" name="ndrug" id="ndrug"  value=''>
	<input type="hidden" name="nmedication" id="nmedication"  value=''>
	<div class="form-group" id="drugs">
        <strong>Drug allergies:</strong>
         
    </div>
    <a href="javascript:addDrug()" class="btn btn-success"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Drug</a>
    <br><br>
	<div class="form-group">
        <strong>Please list any medications that you are now taking. Include non-prescription medications & vitamins or suplements:</strong>
        <br>
        <table id="medications">
        	<tr>
        		<td>
		         	<strong>Name of drug</strong>
		         </td>
		         <td>
		         	<strong>Dose</strong>
		         </td>
		         <td>
		         	<strong>How long have you been taking this</strong>
		         </td>
		     </tr>

		     
        </table>
    </div>
    <a href="javascript:addMedition()" class="btn btn-success"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Medication</a>
    
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
        <br>
    </div>
</form>	

<script type="text/javascript">
	$ndrug=0;
	$nmedication=0;


	function addMedition(){ 
		$nmedication+=1;		
		$others="<tr><td><input type='text' class='form-control' name='drugname"+$nmedication+"'  value='' maxlength='50' size='50'></td><td><input type='text' class='form-control' name='dose"+$nmedication+"'  value=''></td><td><input type='text' class='form-control' name='time"+$nmedication+"'  value=''></td></tr>";
		
		var txt = document.getElementById('medications');
        txt.insertAdjacentHTML('beforeend', $others);
        document.getElementById('nmedication').value=$nmedication;
       }

	function addDrug(){ 
		$ndrug+=1;		
		$others="<input type='text' class='form-control' name='allergieTo"+$ndrug+"' placeholder='Drug to which the patient is allergic' value='' maxlength='70' size='70'>";
		
		var txt = document.getElementById('drugs');
        txt.insertAdjacentHTML('beforeend', $others);
        document.getElementById('ndrug').value=$ndrug;
       }
</script>