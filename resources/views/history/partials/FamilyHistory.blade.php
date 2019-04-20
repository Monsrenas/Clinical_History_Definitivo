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
<form  action="{{url('save')}}" method="post">
	@csrf 	
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
				<td><input type='text' class='form-control' name='livingage{{$i}}'  value='' maxlength='10' size='10'onkeypress="return soloNumeros(event);"></td>
				<td><input type='text' class='form-control' name='health{{$i}}'  value='' maxlength='50' size='50'></td>
				<td><input type='text' class='form-control' name='deceasedage{{$i}}'  value='' maxlength='10' size='10' onkeypress="return soloNumeros(event);"></td>
				<td><input type='text' class='form-control' name='cause{{$i}}'  value='' maxlength='50' size='50'></td>
			</tr>
		@endfor
	</table>
	<br><br>
	<strong>EXTENDED FAMILY PSYCHIATRIC PROBLEMS PAST & PRESENT:</strong>
	<div class="form-group">
	    <a>Maternal Relatives:</a>
	    <input type="text" name="maternal" value="" class="form-inline" maxlength="130" size="130">
	</div>
    
	<div class="form-group">
   		<a>Paternal Relative:</a>
    	<input type="text" name="paternal" value="" class="form-inline" maxlength="130" size="130">
	</div>
	
	<strong style="text-align: left;">WOMENS REPRODUCTIVE HISTORY:</strong>
	<br>

	<div>
		<div style="float: left; width: 50%;">
			<div class="form-group">
		   		<a>Age of first period:</a>
		    	<input type="text" name="period" value="" class="form-inline" onkeypress="return soloNumeros(event);">
			</div>
			<div class="form-group">
		   		<a># Pregnancies:</a>
		    	<input type="text" name="pregnancies" value="" class="form-inline" onkeypress="return soloNumeros(event);">
			</div>
			<div class="form-group">
		   		<a># Miscarriages:</a>
		    	<input type="text" name="miscarriages" value="" class="form-inline" onkeypress="return soloNumeros(event);">
			</div><div class="form-group">
		   		<a># Abortions:</a>
		    	<input type="text" name="abortions" value="" class="form-inline" onkeypress="return soloNumeros(event);">
			</div>
		</div>
	
		<div style="float: none;">
			<div class="form-group">
		   		<a>Last Papsmear:</a>
		    	<input type="date" name="papsmear" value="" class="form-inline">
			</div>
			<div class="form-group">
		   		<a>Results:</a>
		    	<input type="text" name="papsmearresult" value="" class="form-inline">
			</div>
			<div class="form-group">
		   		<a>Last Mamogram:</a>
		    	<input type="date" name="mamogram" value="" class="form-inline">
			</div>
			<div class="form-group">
		   		<a>Results:</a>
		    	<input type="text" name="mamogramresult" value="" class="form-inline">
			</div>		
		</div>
	</div>
</div>
<div style="float: none;">
	<div class="form-group">
		<a>If reached menopause.  At what age?:</a>
		<input type="text" name="menopause" value="" class="form-inline" onkeypress="return soloNumeros(event);">
	</div>	

	<div class="form-group">
		<a>Have regular periods?. Period formula:</a>
		<input type="text" name="periods" value="" class="form-inline" onkeypress="return soloNumeros(event);">
	</div>	
</div>
	<div class="col-xs-12 col-sm-12 col-md-12 text-center">
       	<button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>