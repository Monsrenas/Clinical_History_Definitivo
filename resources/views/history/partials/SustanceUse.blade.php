<form  action="{{url('save')}}" method="post" style="width: 100%; text-align: center;margin: 20px;">
	@csrf 	
	<?php 	$category=["Alcohol","Marijuana","Cocaine, crack", "Cigarettes", 'OPIOIDS:  Tylenol #2 & #3, 282’S, 292’S,
Percodan, Percocet, Opium, Morphine, Demerol, Dilaudid', "INHALANTS: Glue, gasoline, aerosols, paint thinner, poppers, rush, locker room", "OTHER: specify"];
 ?>

	<table style="margin-bottom: 20px;">
		<tr>
			<td>DRUG CATEGORY (circle each substance used)</td>
			<td>Age when you first used this:</td>
			<td>How much & how often did you use this?</td>
			<td>How many years did you use this?</td>
			<td>When did you last use this?</td>
			<td> Do you currently use this?</td>
		</tr>

		@for ($i = 0; $i<7; $i++)
		 <tr>
		 	<td>{{ $category[$i] }}</td>
		 	<td><input type='text' class='form-control' name='ageuse{{$i}}'  value='' onkeypress="return soloNumeros(event);"></td>
		 	<td><input type='text' class='form-control' name='often{{$i}}'  value='' onkeypress="return soloNumeros(event);"></td>
		 	<td><input type='text' class='form-control' name='yearsuse{{$i}}'  value='' onkeypress="return soloNumeros(event);"></td>
		 	<td><input type='date' class='form-control' name='lastuse{{$i}}'  value=''></td>
		 	<td><input type='checkbox' class='form-control' name='yesno{{$i}}'></td>
		 </tr>
		@endfor
	</table>

	<div class="form-group">
	    <strong>CC:</strong>
	    <input type="text" name="cc" value="" class="form-inline" maxlength="100" size="100">
	</div>
	<div class="form-group">
		<strong>HPI:</strong>
		<textarea rows = "5" cols = "100%" name = "hpi">
	            
	    </textarea>
	    </div>

	<div class="form-group">
	    <strong>URINE DIPSTICK:</strong>
	    <input type="text" name="urine" value="" class="form-inline" maxlength="60" size="60">
	    <strong>GMR:</strong>
	    <input type="text" name="gmr" value="" class="form-inline">
	</div>

	<div class="col-xs-12 col-sm-12 col-md-12 text-center">
       	<button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>