@extends('history.layout')

@section('eltema')
<?php use App\Physiciansnote; 

    if(!isset($_SESSION)){
    session_start();
    }
    $_SESSION['opcion']='bott10';
    $pep='Pinga';
?>
        
@if (isset($patient))
           <?php $identification=$patient->identification;  ?>
 @else         
           <?php                     
            $patient=new Physiciansnote;
            if (!isset($identification)) {$identification="";}
             $patientActive=false;
            ?>  
@endif

@if (isset($_SESSION['identification']))
           <?php 
                $identification=($_SESSION['identification']);  
            ?>
@endif
@include ('history.speciality')


<script type="text/javascript">
   var $NumSpecialty=0;
   var   $NumDoc=0;
   
   
    function addDoctor($specia, $user){ 
        var $MYtextarea="";

        var $others="<li> <input type='checkbox' name='list' id='doctor"+$NumDoc+"'> <label for='doctor"+$NumDoc+"'>Dr Pedro Arriaga </label> <ul class='interior'> <div><textarea style= 'resize: none;' rows='5' cols='100%' name='note[]'>  </textarea>  </div> </ul></li>";
        

            $others=$others+"<input type='hidden' name='user[]'  value='"+$user+"'>";
    

        var txt = document.getElementById($specia);
        txt.insertAdjacentHTML('beforeend', $others);
        $NumDoc=$NumDoc+1;
       }



    function addSpeciality($user, $Nspeciality){ 
        var txt = document.getElementById('speciality');
        $indice=$Nspeciality;
        if ($indice=='####'){ $indice=txt.selectedIndex;}
        $specialityLabel=txt.options[$indice].text;
        $idELM=$specialityLabel.replace(/ /g, "");
        var ELM = document.getElementById($idELM);
        
        if ((txt.selectedIndex>1)&&(ELM==null)) {
                $Dbtn="<a href=\"javascript:addDoctor('"+$idELM+"','"+$user+"' )\"  class='btn btn-success' style='font-size:xx-small; align: right'><span class='glyphicon glyphicon-plus'></span> Add doctor</a>";

                $others="<li><input type='checkbox' name='list' id='specialty"+$NumSpecialty+"'> <label for='specialty"+$NumSpecialty+"'> "+$specialityLabel+"</label> <ul class='interior'> <div id='"+$idELM+"''></div>  <div>"+$Dbtn+"</div></ul></li>";
                
                var txt = document.getElementById('menu');
                txt.insertAdjacentHTML('beforeend', $others);
                $NumSpecialty=$NumSpecialty+1;
            }
       }   

</script>

<style type="text/css">
    #menu * { list-style:none;}
    #menu li{ line-height:180%; text-align: left;}
    #menu li a{color:#222; text-decoration:none;}
    #menu li a:before{ content:"\025b8"; color:#ddd; margin-right:4px;}
    #menu input[name="list"] {
        position: absolute;
        left: -1000em;
        }
    #menu label:before{ content:"\025b8"; margin-right:4px;}
    #menu input:checked ~ label:before{ content:"\025be";}
    #menu .interior{display: none;}
    #menu input:checked ~ ul{display:block;}
</style>


<div style="padding: 0%; border-width:1px; border-style:solid; border-color:#000000; align: center; background: rgba(128, 255, 0, 0.3); font-size: small;">
<form  action="{{url('almacena')}}" method="post" style="width: 100%; text-align: center;margin: 20px;">
	@csrf 	

<div id='notelayout'>
    <strong>PHYSICIANS NOTES</strong>
    <br><br>
    
    <ul id="menu">
       
    </ul>
</div>

<select name="speciality" id="speciality" required>
    <?php  echo OptionSpecialitySelect($patient); ?>                                
</select>
<a href="javascript:addSpeciality('{{ $_SESSION['user']}}','####')" class="btn btn-success"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Add specialty</a>


<br>  <br>
    <input type="hidden" name="identification"  placeholder="Identification number" value='{{ $identification }}'>

    <input type="hidden" name="url"  value='history.PHYSICIANSNOTE'>
    <input type="hidden" name="dtt"  value='PHYSICIANSNOTE'>

    <!--
	<strong>PHYSICIANS NOTE</strong><br>
	<textarea style="resize: none;" rows = "5" cols = "100%" name = "note" ></textarea> -->
    
	<br><strong>DIAGNOSIS:</strong><br>
    <textarea style="resize: none;" rows = "5" cols = "100%" name = "diagnosis">{{ $patient->diagnosis }}</textarea>

    <div class="form-group">
		 <br><strong>TREATMENT PLAN:</strong><br> 
		 <textarea style="resize: none;" rows = "5" cols = "100%" name = "plan">{{ $patient->plan }}</textarea>
    </div>

    <div class="form-group">
        <br><strong>FOLLOW UP:</strong>
        <input type="text" name="followup" value="{{ $patient->followup }}" class="form-inline"   maxlength="30" size="30" required>
    </div>

    <div class="form-group">
        <br><strong>PHYSICIAN:</strong>
        <input type="text" name="physician" value="{{ $patient->physician }}" class="form-inline"   maxlength="30" size="30" required>        
    </div>

 	<div class="form-inline">
        <div class="form-group">
            <strong>DATE:</strong>
            <input type="date" name="date" value="{{ $patient->date }}" class="form-inline"   maxlength="30" size="30" required>
        </div>
     </div>


	<div class="col-xs-12 col-sm-12 col-md-12 text-center" style="margin-top: 32px">
       	<button type="submit" class="btn btn-primary glyphicon glyphicon-floppy-save"> Save</button>
    </div>
</form>
<?php 
    echo  "<script type='text/javascript'> addSpeciality('".$_SESSION['user']." ',2); </script>";
     echo  "<script type='text/javascript'> addSpeciality('".$_SESSION['user']." ',4); </script>";
    echo  "<script type='text/javascript'> addDoctor(4,'pedro'); </script>";
    
 ?>

</div>



@endsection

