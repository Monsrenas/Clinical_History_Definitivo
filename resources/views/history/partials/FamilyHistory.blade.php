<style type="text/css">
	table {
  			border-collapse: collapse;
  			background: rgba(128, 255, 0, 0.3); 
  			border: 1px solid rgba(100, 200, 0, 0.3); 
  			width: 100%;
		  }

	table, th, td {
					  border: 1px solid black;
					  text-align: center;
					  padding-bottom: 6px;
				  }
</style>

<?php 
	$family=["Father","Mther","Siblings","Children"];
 ?>

<div class="form-group">
	<table id="medications">
		<tr>
			<td colspan="3">IF LIVING</td>
			<td colspan="2">IF DECEASED</td>
		</tr>
		<tr>
			<td colspan="2">
	         	<strong>Age (s)</strong>
	         </td>
	         <td>
	         	<strong>Health & Psychiatric</strong>
	         </td>
	         <td>
	         	<strong>Age(s) at death</strong>
	         </td>
				 <td>
	         	<strong>Cause</strong>
	         </td>		     
	     </tr>
	     @for ($i = 0; $i<4; $i++)
			<tr><td style="padding: 5px;">{{$family[$i]}}</td>
				<td><input type='text' class='form-control' name='livingage"+$i+"'  value='' maxlength='10' size='10'onkeypress="return soloNumeros(event);"></td>
				<td><input type='text' class='form-control' name='health"+$i+"'  value='' maxlength='50' size='50'></td>
				<td><input type='text' class='form-control' name='deceasedage"+$i+"'  value='' maxlength='10' size='10' onkeypress="return soloNumeros(event);"></td>
				<td><input type='text' class='form-control' name='cause"+$i+"'  value='' maxlength='50' size='50'></td>
			</tr>
		@endfor
	</table>
	<br><br>
	<strong>EXTENDED FAMILY PSYCHIATRIC PROBLEMS PAST & PRESENT:</strong>
	<div class="form-group">
	    <strong>Maternal Relatives:</strong>
	    <input type="text" name="maternal" value="" class="form-inline" maxlength="130" size="130">
	</div>
    
	<div class="form-group">
   		<strong>Paternal Relative:</strong>
    	<input type="text" name="paternal" value="" class="form-inline" maxlength="130" size="130">
	</div>


</div>