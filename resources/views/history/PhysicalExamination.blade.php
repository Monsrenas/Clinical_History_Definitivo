@extends('history.layout')

@section('eltema')
<?php use App\Physical; ?>
		
@if (isset($patient))
           <?php $identification=$patient->identification;  ?>
 @else         
           <?php                     
            $patient=new Physical;
            if (!isset($identification)) {$identification="";}
             $patientActive=false;
            ?>  
@endif

@if (isset($_SESSION['identification']))
           <?php 
           		$identification=($_SESSION['identification']);  
			?>
@endif

<?php global $patient1;
			$patient1=$patient; 	

   include(app_path().'/includes/categorys.php');

   global $indiceradio,$indicetext;
   
   $indiceradio=0;
   $indicetext=0;
   

  function indice($x) { global $indiceradio,$indicetext;
  						if ($x==1) { $i=$indiceradio;
  									$indiceradio=$indiceradio+1;
  									return $i;}
  						if ($x==2) { $i=$indicetext;
  									$indicetext=$indicetext+1;
  									return $i;}				 
  					}
  				
  function decifra($cadena) {
		global $patient1;	
 	
  		$resu="<td colspan='4'>".$cadena."</td>";
  		if ($cadena=="***") { $i=indice(1);
  			if (isset($patient1->N[$i]) and ($patient1->N[$i]=="N")) {$Nck="checked";} else {$Nck="";} 
  			if (isset($patient1->N[$i]) and ($patient1->N[$i]=="AN")) {$ANck="checked";} else {$ANck="";}
  			if (isset($patient1->N[$i]) and ($patient1->N[$i]=="NE")) {$NEck="checked";} else {$NEck="";}
  			
  			$resu=" <td width='10'> <input type='radio' name='N[$i]' id='N$i'  value='N' ".$Nck." > </td> 
  					<td width='10'> <input type='radio' name='N[$i]' id='AN$i' value='AN' ".$ANck." ></td>
  					<td width='10'> <input type='radio' name='N[$i]' id='NE$i' value='NE' ".$NEck." > </td> ";}
  		if (substr($cadena, 0,1)=="#") {$i=indice(2); 
  					$nomb=str_replace(" ", "", substr($cadena, 2,-1));
  					$valor=$patient1->$nomb;
					$resu="<td colspan='".substr($cadena, 1,1)."'>".substr($cadena, 2)." <input type='text' name='".$nomb."' size='5' value='".$valor."' </td>";}
  		if ($cadena=="DAF") { $resu="<td rowspan='90'> <textarea style='resize: none;' rows = '133%' cols = '100%' name = 'DAF'>".$patient1->DAF."</textarea> </td>"; }

  		if ($cadena=="...") {$i=indice(1);
  			if (isset($patient1->N[$i]) and ($patient1->N[$i]=="N")) {$Nck="checked";} else {$Nck="";} 
  			if (isset($patient1->N[$i]) and ($patient1->N[$i]=="AN")) {$ANck="checked";} else {$ANck="";}
  			if (isset($patient1->N[$i]) and ($patient1->N[$i]=="NE")) {$NEck="checked";} else {$NEck="";}	
  			 $resu=" <input type='radio' name='N[$i]' id='N$i' value='N'".$Nck."> 
  			 		 <input type='radio' name='N[$i]' id='AN$i' value='AN'".$ANck."> 
  			 		 <input type='radio' name='N[$i]' id='NE$i' value='NE'".$NEck.">";}

  		return $resu;
  }

 function Arbol($arreglo){
 	$dato="";
		for ($i = 0; $i<count($arreglo); $i++) {	 $value=$arreglo[$i];
									$dato=$dato."<tr>";
	 							for ($j = 0; $j<count($value); $j++){
	 		 												if (is_array($value[$j]) ) 
	 		 													{	 
	 		 														$resu=Arbol($value[$j]); 	   
	 		 														$dato=$dato.$resu;										
	 		 													}
	 														else { $dato=$dato.decifra($value[$j],$i);		}
	 																}												
	$dato=$dato."<tr/>";	
	 	
								}			
 	return $dato;
 	}

 	?>



<style type="text/css">
	table {	font-size: x-small;
  			border-collapse: collapse;
  			
  			border: 1px solid rgba(100, 200, 0, 0.3); 
  			width: 100%;
		  }

	table, th, td {
					  border: 2px solid white;
					  text-align: center;
					  padding-bottom: 6px;
				  }
</style>

<div style="padding: 1%; border-width:1px; border-style:solid; border-color:#000000; align: center; background: rgba(128, 255, 0, 0.3);">
<form  action="{{url('almacena')}}" method="post" style="width: 100%; text-align: center;">
	@csrf 	
	<input type="hidden" name="identification"  placeholder="Identification number" value='{{ $identification }}'>

	<input type="hidden" name="url"  value='history.PhysicalExamination'>
	<input type="hidden" name="dtt"  value='6'>

	<table class="align-middle" style="margin-bottom: 20px;">
		<tr>
			<th colspan="2" width="5">INTEGRATED MEDICAL CARE</th>
			<th colspan="5" width="5">PHYSICAL EXAMINATION</th>
		</tr>
		<tr>
			<th colspan="7">GENERAL, REGIONAL AND BY SYSTEMS</th>
		</tr>
		<tr>
			<th colspan="4" >GENERAL</th>
			<th colspan="1">N</th>
			<th colspan="1">AN</th>
			<th colspan="1">NE</th>
			<th colspan="1">DESCRIBE ABNORMAL FINDINGS</th>
		</tr>
	
		<?php echo Arbol($GENERAL);?>
		<tr> <td rowspan="2">Head</td>  <td colspan="3">Cranium</td> <?php echo decifra("***");?> </tr>
		<tr> <td colspan="3">face</td>	<?php echo decifra("***");?> </tr>

		<tr> <td rowspan="4">Neck</td>   <td colspan="3">Anterior</td> <?php echo decifra("***");?> </tr>
		<tr> <td colspan="3">Posterior</td>	<?php echo decifra("***");?> </tr>

		<tr> <td colspan="3">Lateral</td>	<?php echo decifra("***");?> </tr>
		<tr> <td colspan="3">Supraclavicular</td> <?php echo decifra("***");?> </tr>

		<tr> <td rowspan="1">Breast</td> <td colspan="3">Inspection</td> <?php echo decifra("***");?> </tr> 
		<tr> <td colspan="4">Palpation</td>	<?php echo decifra("***");?> </tr>
		<?php echo Arbol($REGIONAL);?>
		<tr> <td rowspan="4">Cardiaca Area</td>   <td colspan="3">Inspection</td> <?php echo decifra("***");?> </tr>
		<tr> <td colspan="3">Palpation</td>	<?php echo decifra("***");?> </tr>
		<tr> <td colspan="3">Ausculation</td>	<?php echo decifra("***");?> </tr>
		<tr> <?php echo decifra("#3Central heart rate:");?> <?php echo decifra("***");?> </tr>

		<tr> <td rowspan="12">Per. Arter.</td>  <td rowspan="10">PULSES</td> <td rowspan="2">Radial</td> <td colspan="1">L</td> <?php echo decifra("***");?> </tr>
		<tr> <td>R</td> <?php echo decifra("***");?> </tr>

		<tr><td rowspan="2">Femoral </td> <td>L</td> <?php echo decifra("***");?> </tr>
		<tr> <td>R</td> <?php echo decifra("***");?> </tr>

		<tr><td rowspan="2">Tibial Post. </td> <td>L</td> <?php echo decifra("***");?> </tr>
		<tr> <td>R</td> <?php echo decifra("***");?> </tr>

		<tr><td rowspan="2">Pedis</td> <td>L</td> <?php echo decifra("***");?> </tr>
		<tr> <td>R</td> <?php echo decifra("***");?> </tr>

		<tr><td rowspan="2">Others</td> <td>L</td> <?php echo decifra("***");?> </tr>
		<tr> <td>R</td> <?php echo decifra("***");?> </tr>

		<tr> <td rowspan="2">Blood Pressure</td> <?php echo decifra("#5Upper extrem:");?></tr>
		<tr> <?php echo decifra("#5Lower extrem:");?></tr>
		<?php echo Arbol($VENOUS);
			  echo Arbol($GASTRO);?> 
		<tr> <td rowspan="5">Abdomen</td>   <td colspan="3">Inspection</td> <?php echo decifra("***");?> </tr>
		<tr> <td colspan="3">Palpation</td>	<?php echo decifra("***");?> </tr>
		<tr> <td colspan="3">Percussion</td>	<?php echo decifra("***");?> </tr>
		<tr> <td colspan="3">Ausculation</td>	<?php echo decifra("***");?> </tr>
		<tr> <td colspan="3">DRE</td><?php echo decifra("***");?></tr>
		<?php echo Arbol($HEMO); ?>
		</table>
		<table>
		<tr><td colspan="7"><strong>CRANIAL NERVES</strong></td></tr>
		<tr><td></td><td>I</td><td>II</td><td> III  IV VI</td><td>V</td><td>VII</td></tr>
		<tr><td>R</td><td><?php echo decifra("...");?></td><td><?php echo decifra("...");?></td><td><?php echo decifra("...");?></td><td><?php echo decifra("...");?></td><td><?php echo decifra("...");?></td></tr>
		<tr><td>L</td><td><?php echo decifra("...");?></td><td><?php echo decifra("...");?></td><td><?php echo decifra("...");?></td><td><?php echo decifra("...");?></td><td><?php echo decifra("...");?></td></tr>
		<tr><td></td><td>VIII</td><td>IX</td><td>X</td><td>XI</td><td>XII</td></tr>
		<tr><td>R</td><td><?php echo decifra("...",15);?></td><td><?php echo decifra("...");?></td><td><?php echo decifra("...");?></td><td><?php echo decifra("...");?></td><td><?php echo decifra("...");?></td></tr>
		<tr><td>L</td><td>I</td><td><?php echo decifra("...");?></td><td><?php echo decifra("...");?></td><td><?php echo decifra("...",15);?></td><td><?php echo decifra("...");?></td></tr>	
	</table>

		
	<div  style="position: fixed; height: 30px; bottom:0; right:1; width: 100%;">
       	<button type="submit" class="btn btn-primary glyphicon glyphicon-floppy-save" > Save</button>
    </div>

</form>
</div>
@endsection