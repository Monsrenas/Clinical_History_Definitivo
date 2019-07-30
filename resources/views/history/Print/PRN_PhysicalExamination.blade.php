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
					$resu="<td colspan='".substr($cadena, 1,1)."'>".substr($cadena, 2)." ".$valor." </td>";}
  		if ($cadena=="DAF") { $resu="<td rowspan='144'>".$patient1->DAF."</td>"; }

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
<form  action="{{url('almacena')}}" method="post" style="width: 86%; text-align: center;">
	@csrf 	
	<table class="align-middle" style="margin-bottom: 0px;">
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