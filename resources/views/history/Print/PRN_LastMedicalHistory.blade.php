<?php 

	$preexistentes=[
					"Diabetes","High blood presure","High cholesterol","Hypothyroidism","Hyperthyroidism","Cancer (type)","Systemic lupus erythematou (Lupus)","Congestive herat Failure","Angina","Colitis",
					"Heart murmur","Pneumonia","Pulmonary embolism","Asthma","Emphysema/Bronchitis","Stroke","Eílesy (seizures)","Cataracts","Kidney disease","Kidney stones",
					"Deep Ven thrombosis","Prostate Problems","Anemia","Jaudice","Hepatitis","Stomach or peptic ulcer","Rheumatic Fever","Tuberculosis","HIV/AIDS"
					];	
 ?>

 @if (isset($RESULT[0]))
           <?php 
           		$patient=$RESULT[0];
           		$identification=$patient->identification;  
          
           ?>
@endif

    
<script type="text/javascript">
	

		function addmedicalcondition($valor){ 	
		$others="<input type='text' class='form-control' name='ncondition[]' value='"+$valor+"'  placeholder='condition'  maxlength='85' size='85'>";
		
		var txt = document.getElementById('listconditions');
        txt.insertAdjacentHTML('beforeend', $others);}

	
</script>

<style type="text/css">
	table {	font-size: xx-small;
  			border-collapse: collapse;
  			
  			border: 1px solid rgba(100, 200, 0, 0.3); 
  			width: 100%;
		  }

	table, th, td {
					  border: 1px hidden white;
					  text-align: center;
				  }
</style>

<div>
<form  action="{{url('almacena')}}" method="post">
	@csrf
<table style="width: 100%; border: none;">
	@for ($i = 0; $i < count($preexistentes); $i+=2)
 		<tr>
 			<?php $name0=substr(str_replace(" ", "", $preexistentes[$i]),0,7); ?>
			<td style="width: 30%; text-align: left; border: none;">
				<input type="checkbox" name="heart[{{ $name0 }}]" value="{{$i+1}}" id="{{ $name0 }}" <?php if (isset($patient->heart[$name0])) {echo 'checked'; } ?> > {{$preexistentes[$i]}}
				
                 
			</td>
			
			@if (($i+1) < count($preexistentes))
				<?php $name1=substr(str_replace(" ", "", $preexistentes[$i+1]),0,7); ?>
			<td style="width: 30%; text-align: left; border: none;">
				<input type="checkbox" name="heart[{{ $name1 }}]" value="{{$i+2}}" id="{{ $name1 }}" <?php if (isset($patient->heart[$name1])) {echo 'checked'; } ?> > {{$preexistentes[$i+1]}}
				
			</td>
			@endif
		
			@if (($i+2) < count($preexistentes)) 
				<?php $name2=substr(str_replace(" ", "", $preexistentes[$i+2]),0,7);  ?> 
				<td style="width: 30%; text-align: left; border: none;">
					<input type="checkbox" name="heart[{{ $name2 }}]" value="{{$i+3}}" id="{{ $name2 }}" <?php if (isset($patient->heart[$name2])) {echo 'checked'; } ?> > {{$preexistentes[$i+2]}}
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
</form>
	<ul>
	@if (isset($patient->ncondition))
			@foreach ($patient->ncondition as $condition)
    		 <?php echo "<li type='circle'>".$condition."</li>"; ?>
    		@endforeach
    @endif
    </ul> 
 </div>




                    	