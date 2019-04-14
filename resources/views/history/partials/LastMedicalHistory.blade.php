
<?php 
	$preexistentes=[
					"Diabetes","High blood presure","High cholesterol","Hypothyroidism","Hyperthyroidism","Cancer (type)","Systemic lupus erythematou (Lupus)","Congestive herat Failure","Angina","Colitis",
					"Heart murmur","Pneumonia","Pulmonary embolism","Asthma","Emphysema/Bronchitis","Stroke","Eíleśy (seizures)","Cataracts","Kidney disease","Kidney stones",
					"Deep Ven thrombosis","Prostate Problems","Anemia","Jaudice","Hepatitis","Stomach or peptic ulcer","Rheumatic Fever","Tuberculosis","HIV/AIDS"
					];	
	 		
 ?>
<form  action="{{url('save')}}" method="post">
	@csrf
	<input type="hidden" name="identification"  placeholder="Identification number" value='{{ $identification }}'>
	<input type="hidden" name="ncondition" id="ncondition"  placeholder="Identification number" value=''>
<table style="width: 100%;">
	@for ($i = 0; $i < count($preexistentes); $i+=2)
 		<tr>
			<td style="width: 30%;">
				<input type="checkbox" name="heart{{$i}}" value="{{$i+1}}"> {{$preexistentes[$i]}}
			</td>
			
			@if (($i+1) < count($preexistentes))
			<td style="width: 30%;">
				<input type="checkbox" name="heart{{$i}}" value="{{$i+2}}"> {{$preexistentes[$i+1]}}
			</td>
			@endif
		
			@if (($i+2) < count($preexistentes)) 
				<td style="width: 30%;">
					<input type="checkbox" name="heart{{$i}}" value="{{$i+3}}"> {{$preexistentes[$i+2]}}
				</td>
			@endif
		</tr>
		<?php $i++; ?>
	@endfor

</table>
		<br><br>
        <div class="form-group" id="listconditions">
            <strong>Other medical conditions:</strong>
        </div>
        <a href="javascript:addmedicalcondition()" class="btn btn-success"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Other condition</a>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        	<button type="submit" class="btn btn-primary">Submit</button>
    	</div>
</form>

<script type="text/javascript">
	$ncondition=0;	
	function addmedicalcondition(){ 
		$ncondition+=1;		
		$others="<input type='text' class='form-control' name='others"+$ncondition+"' value=''  placeholder='condition'  maxlength='85' size='85'>";
		
		var txt = document.getElementById('listconditions');
        txt.insertAdjacentHTML('beforeend', $others);
        document.getElementById('ncondition').value=$ncondition;


       }
</script>