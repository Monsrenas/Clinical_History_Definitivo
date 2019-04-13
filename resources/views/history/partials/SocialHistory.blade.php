<form  action="{{url('save')}}" method="post">
	@csrf

	<div class="form-group">
	    <strong>Highest  educational level reached:</strong>
	    <select name="education" id="education" required>
	        <option value="S" >High School</option>
	        <option value="M" >Some college</option>
	        <option value="D" >College graduate</option>
	        <option value="W" >Advance degree</option>
	    </select>
	     <!-- <script type="text/javascript"> var marital="<?php  echo  $patient->maritalStts; ?>"; </script> --->   
	</div>
</form>