<?php global $patient1;
			$patient1=$RESULT[6]; 	

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

  function BMI($Wght,$Hght) {

  	if (is_array($Wght)){ if ($Wght[1]=='lb') {$kg=((real) $Wght[0])/2.2046;  } else {$kg=( (real)$Wght[0]);} } 
		else 	{ $kg=( (real) $Wght); }

  	if (is_array($Hght)) { if ($Hght[1]=='ft') {$mt=((real) $Hght[0])/3.2808; } else {$mt=((real) $Hght[0]); } 

  	}else 	{ $mt=( (real) $Hght); }

  	/*alcula dividiendo los kilogramos de peso por el cuadrado de la estatura en metros (IMC = peso [kg]/ estatura [m2]) */ 
  		$vBMI=0;
  		if ($mt>0) {$vBMI=round($kg/($mt*$mt),2) ;}
  	return $vBMI;

  }

  function BMIClass($vBMI) {

  		switch ($vBMI) {
		    case ($vBMI<16): return "Under: Severe Thinness";						break;	
		    case ($vBMI >= 16 && $vBMI<=16.99): return "Under: Moderate thinness";	break;	
		    case ($vBMI >= 17 && $vBMI<=18.49): return "under: Thin Acceptable";	break;	
		    case ($vBMI >= 18.50 && $vBMI<=24.99): return "Normal weight";			break;	
		    case ($vBMI >= 25 && $vBMI<=29.99): return "Overweight";				break;	
		    case ($vBMI >= 30 && $vBMI<=34.99): return "Obese: Type I";				break;	
		    case ($vBMI >= 35 && $vBMI<=40.99): return "Obese: Type II";			break;	
		    case ($vBMI>40): return "Obese: Type III";								break;	
	
	}
  }

  function unit_measurement($cdn) {
  	global $patient1;
  	$nom=str_replace(" ", "", substr($cdn, 2,-1));	
  	$unit='';
  	$valor=((isset($patient1->$nom)) ? $patient1->$nom:"");

	switch ($nom) {
	    case 'Weight':
	    		$unit=((isset($patient1->Weight[1])) ? $patient1->Weight[1]:"");
                if (isset($patient1->$nom[0])) { $valor=$patient1->$nom[0];}
             
	        break;
	    case 'Height':
	    	$unit=((isset($patient1->Height[1])) ? $patient1->Height[1]:"");
            
            if (isset($patient1->$nom[0])) {$valor=$patient1->$nom[0];}
	        break;
	    case 'BMI':
	        if (isset($patient1->Weight)&&isset($patient1->Height)) {
	        	 return "<td colspan='".substr($cdn, 1,1)."'> ".substr($cdn, 2)."<strong>".BMI($patient1->Weight,$patient1->Height)."</strong> <br> "." ".BMIClass(BMI($patient1->Weight,$patient1->Height))."</td>";  }
	        break;
	        }
	 
	 if (!$nom=='') {      
  						$resu="<td colspan='".substr($cdn, 1,1)."'>".substr($cdn, 2)." ".$valor." ".$unit." </td>";
  						return $resu;
  					}
  	return '';

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
  					$resu=unit_measurement($cadena);	
		}


  		if ($cadena=="DAF") { 	$DAF="";
  								if (isset($patient1->DAF)) { $DAF=$patient1->DAF; } 
  								$resu="<td rowspan='60' colspan='10' style='vertical-align:text-top; '>".$DAF."</td>"; }

  		if ($cadena=="DAD") { 	$DAD="";
  								if (isset($patient1->DAD)) { $DAD=$patient1->DAD; } 
  								$resu="<td rowspan='80' colspan='6' style='vertical-align:text-top; with'>".$DAD."</td>"; }

  		if ($cadena=="...") {$i=indice(1);
  			if (isset($patient1->N[$i]) and ($patient1->N[$i]=="N")) {$Nck="checked";} else {$Nck="";} 
  			if (isset($patient1->N[$i]) and ($patient1->N[$i]=="AN")) {$ANck="checked";} else {$ANck="";}
  			if (isset($patient1->N[$i]) and ($patient1->N[$i]=="NE")) {$NEck="checked";} else {$NEck="";}	
  			 $resu=" <input type='radio' name='N[$i]' id='N$i' value='N'".$Nck."> 
  			 		 <input type='radio' name='N[$i]' id='AN$i' value='AN'".$ANck."> 
  			 		 <input type='radio' name='N[$i]' id='NE$i' value='NE'".$NEck.">";}

  		if ($cadena=="NNN") {
  								$resu=" <td width='10'> <strong>N</strong> </td> 
					  					<td width='10'> <strong>AN</strong> </td>
					  					<td width='10'> <strong>NE</strong> </td> ";}
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
	$dato=$dato."</tr>";									}			
 	return $dato;
 	}

 	?>

<style type="text/css">

	table {	font-size: xx-small;
  			border-collapse: collapse;
  			
  			border: 1px solid blue; 
  			width: 100%;

		  }

	table, th, td {
					  border: 1px solid black;
					  text-align: center;
					  padding-bottom: 6px;
				  }
</style>

<div style="padding: 1%; border-width:1px; border-style:solid; border-color:#000000; align: center; height: 301%;">
<form  action="{{url('almacena')}}" method="post" style="width: 100%; text-align: center;">
	@csrf 	
	<table class="" style="margin-bottom: 0px;">
		<tr>
			<th colspan="2" width="5">INTEGRATED MEDICAL CARE</th>
			<th colspan="5" width="5">PHYSICAL EXAMINATION</th>
		</tr>
		<tr>
			<th colspan="7" >GENERAL, REGIONAL AND BY SYSTEMS</th>
		</tr>
		<tr>
			<th colspan="4" >GENERAL</th>
			<th colspan="1">N</th>
			<th colspan="1">AN</th>
			<th colspan="1">NE</th>
			<th colspan="7">DESCRIBE ABNORMAL FINDINGS</th>
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
		<tr><td colspan="6"><strong>CRANIAL NERVES</strong></td></tr>
		<tr><td></td><td>I</td><td>II</td><td> III  IV VI</td><td>V</td><td>VII</td></tr>
		<tr><td>R</td><td><?php echo decifra("...");?></td><td><?php echo decifra("...");?></td><td><?php echo decifra("...");?></td><td><?php echo decifra("...");?></td><td><?php echo decifra("...");?></td></tr>
		<tr><td>L</td><td><?php echo decifra("...");?></td><td><?php echo decifra("...");?></td><td><?php echo decifra("...");?></td><td><?php echo decifra("...");?></td><td><?php echo decifra("...");?></td></tr>
		<tr><td></td><td>VIII</td><td>IX</td><td>X</td><td>XI</td><td>XII</td></tr>
		<tr><td>R</td><td><?php echo decifra("...",15);?></td><td><?php echo decifra("...");?></td><td><?php echo decifra("...");?></td><td><?php echo decifra("...");?></td><td><?php echo decifra("...");?></td></tr>
		<tr><td>L</td><td><?php echo decifra("...");?></td><td><?php echo decifra("...");?></td><td><?php echo decifra("...");?></td><td><?php echo decifra("...",15);?></td><td><?php echo decifra("...");?></td></tr>	  -->
	</table>
</form>
</div>