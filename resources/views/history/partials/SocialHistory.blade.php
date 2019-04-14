
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

<form  action="{{url('save')}}" method="post">
	@csrf
	<input type="hidden" name="identification"  placeholder="Identification number" value='{{ $identification }}'>

	<div class="form-group">
	    <strong>1- Highest  educational level reached:</strong>
	    <select name="education" id="education" required>
	        <option value="H" >High School</option>
	        <option value="S" >Some college</option>
	        <option value="C" >College graduate</option>
	        <option value="A" >Advance degree</option>
	    </select>
	     <!-- <script type="text/javascript"> var marital="<?php  echo  $patient->maritalStts; ?>"; </script> --->   
	</div>

	<div class="form-group">
	    <strong>2- Current or past occupation:</strong>
	    <input type="text" name="occupation" value="" class="form-inline" maxlength="70" size="70" required>
	</div>

	<div class="form-group">
	    <strong>3- Currently working:</strong>
	    <table  style="background: rgba(128, 255, 0, 0.3); border: 1px solid rgba(100, 200, 0, 0.3); width: 100%;"> 
	    	<tr style="text-align: center;">
	    		<th style="width: 50%; text-align: center;"><strong>YES</strong></th>
	    		<th style="width: 50%; text-align: center;" ><strong>NO</strong></td>
	    	</tr>
	    	<tr>
	    		<td style="width: 50%;">
	    			Hours/Week:
                    <input type="text" name="hoursweek" value="" class="form-inline"> 
	    		</td>
	    		<td>
	    			 <div class="form-check form-check-inline">
	                      <input class="form-check-input" type="radio" name="nowork" id="nowork" value="R" >
	                      <label class="form-check-label" for="nowork1">Retired</label>

	                      <input class="form-check-input" type="radio" name="nowork" id="nowork2" value="D">
	                      <label class="form-check-label" for="nowork1">Disabled</label>

	                      <input class="form-check-input" type="radio" name="nowork" id="nowork3" value="S">
	                      <label class="form-check-label" for="nowork2">Sick Leave</label>
	                 </div>
	    		</td>
	    	</tr>
	    </table>
	</div>

	<div class="form-group">
	    <strong>4- Religion:</strong>
	    <input type="text" name="religion" value="" class="form-inline" maxlength="70" size="70">
	</div>

	<div class="form-group">
	    <strong>5- Previous hospital admissions:</strong>
	    
	    <table  style="background: rgba(128, 255, 0, 0.3); border: 1px solid rgba(100, 200, 0, 0.3); width: 100%;"> 
	    	<tr style="text-align: center;">
	    		<th style="width: 50%; text-align: center;"><strong>Reason for admission</strong></th>
	    		<th style="width: 50%; text-align: center;" ><strong>Duration</strong></td>
	    	</tr>
	    	<tr>
	    		<td style="width: 50%;">
                    <input type="text" name="admissionreason" value="" class="form-inline" maxlength="70" size="70" > 
	    		</td>
	    		<td>
	    			 <input type="text" name="admissionduration" value="" class="form-inline">
	    		</td>
	    	</tr>
	    </table>

	</div>

	<div class="form-group">
	    <strong>6- Any history of sexually transmitted disease:</strong>
	    <input type="text" name="sextrans" value="" class="form-inline" maxlength="70" size="70">
	</div>

	<div class="col-xs-12 col-sm-12 col-md-12 text-center">
       	<button type="submit" class="btn btn-primary">Submit</button>
    </div>

</form>
