
<?php 

   	use App\Lastmedical;

	$preexistentes=[
					"Diabetes","High blood presure","High cholesterol","Hypothyroidism","Hyperthyroidism","Cancer (type)","Systemic lupus erythematou (Lupus)","Congestive herat Failure","Angina","Colitis",
					"Heart murmur","Pneumonia","Pulmonary embolism","Asthma","Emphysema/Bronchitis","Stroke","Eílesy (seizures)","Cataracts","Kidney disease","Kidney stones",
					"Deep Ven thrombosis","Prostate Problems","Anemia","Jaudice","Hepatitis","Stomach or peptic ulcer","Rheumatic Fever","Tuberculosis","HIV/AIDS"
					];	
	$lastm= new Lastmedical; 

 ?>
<form  action="#">
	@csrf
	<input type="hidden" name="identification"  placeholder="Identification number" value='{{ $identification }}'>
<table style="width: 100%;">
	@for ($i = 0; $i < count($preexistentes); $i+=2)
 		<tr>
 			<?php $name0=substr(str_replace(" ", "", $preexistentes[$i]),0,6); ?>
			<td style="width: 30%; text-align: left;">
				<input type="checkbox" name="heart[{{ $name0 }}]" value="{{$i+1}}"> {{$preexistentes[$i]}}
			</td>
			
			@if (($i+1) < count($preexistentes))
				<?php $name1=substr(str_replace(" ", "", $preexistentes[$i+1]),0,6); ?>
			<td style="width: 30%; text-align: left;">
				<input type="checkbox" name="heart[{{ $name1 }}]" value="{{$i+2}}"> {{$preexistentes[$i+1]}}
			</td>
			@endif
		
			@if (($i+2) < count($preexistentes)) 
				<?php $name2=substr(str_replace(" ", "", $preexistentes[$i+2]),0,6);  ?> 
				<td style="width: 30%; text-align: left;">
					<input type="checkbox" name="heart[{{ $name2 }}]" value="{{$i+3}}"> {{$preexistentes[$i+2]}}
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
        	<button onclick="pide('LastMedical')" class="btn btn-primary">Submit</button>
    	</div>
</form>

<script type="text/javascript">
		
	function addmedicalcondition(){ 	
		$others="<input type='text' class='form-control' name='ncondition[]' value=''  placeholder='condition'  maxlength='85' size='85'>";
		
		var txt = document.getElementById('listconditions');
        txt.insertAdjacentHTML('beforeend', $others);


       }
</script>