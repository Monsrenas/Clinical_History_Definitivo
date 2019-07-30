<?php 
use App\Lastmedical;
$clasedat= new Lastmedical;
	

if(!isset($_SESSION)){
    session_start();
    }
 ?>


 @if (isset($RESULT[1]))
           <?php    $patient=$RESULT[1];
                    $identification=$patient->identification;  ?>

@endif

 @if (isset($_SESSION['identification']))
           <?php 
           		$identification=($_SESSION['identification']);  
			?>

@endif

<style type="text/css">
    table { font-size: small;
             
            width: 100%;
          }
</style>
<form>
	<div class="form-group" id="drugs">
        <strong>Drug allergies:</strong>
            @if (isset($patient->allergieTo))
    </div>
    <div style="margin-left: 40px;">
     @foreach ($patient->allergieTo as $allergie)
      <?php echo "<li type='circle'>".$allergie ."</li>"; ?>
     @endforeach
     @endif
     </div>
    <br><br>
	<div class="form-group">
        <strong>Please list any medications that you are now taking. Include non-prescription medications & vitamins or suplements:</strong>
       


        <div  id="medications"></div>
    </div>
</form>	

    <div style="width: 100%;">

    
    @if (isset($patient->drugname))
        <table>  
        <tr style="font-size: medium;">
                <td><strong>Name of drug</strong></td>
                 <td><strong>Dose</strong></td>
                 <td><strong>How long have you been taking this</strong></td>
             </tr>  
    	@for ($i = 0; $i < count($patient->drugname); $i++)
        <tr>
        <?php 
        echo "<td>".$patient->drugname[$i]."</td>";
        echo "<td>".$patient->dose[$i]."</td>"; 
        echo "<td>".$patient->time[$i]."</td>"; 
        ?>
        </tr> 
		@endfor
        </table>
    @endif 
    
    </div>


