
<?php 
            use App\Patient;
            ?>

    <style type="text/css">
        .form-inline { font-family: arial, helvetica, sans-serif; }

        .form-group { font-family: arial, helvetica, sans-serif; }

        .info { text-align: center;
                font-size: small; }
        .tlabel {float: none;
                 font-weight: bold;}
        .elemen {float: left;} 
        .lstele {float: none; 
                 border:px1 solid gray;
                 height: 35px;
                 padding: 4px;
                 margin-bottom: 4px; 
                }
        .p40 { width:40%; }    
        .p30 { width:30%; }
        .p20 { width:20%; }
        .p25 { width:25%; } 
    </style>

    @if (isset($RESULT[8]))
           <?php    $patient=$RESULT[8];
                    $identification=$patient->identification; 
                    $patientActive=true;
           ?>
    @else         
           <?php                     
            $patient=new Patient;
            if (!isset($identification)) {$identification="";}
             $patientActive=false;
           
            ?>           
    @endif

    
    <?php 
    if(!isset($_SESSION)){session_start();}
    $_SESSION['opcion']='bott1';

    if (!isset($_SESSION['identification'])) { $_SESSION['identification'] = '';} 
                 
     $xMarital=array("S" => "Single", "M"=> "Married","D"=>"Divorced","W"=>"Widowed");
    ?>

    <div class="row" style="padding: 1%; border-width:1px; border-style:solid; border-color:#000000; align: center; width: 100%; height: 240px;">
        
        <div class="col-xs-11 col-sm-11 col-md-11" id="dpatient" style="font-size: x-small;">
            <div class="lstele">
                <div class="elemen p30">
                    <div class="tlabel">Surname:</div> <div class="info">{{ $patient->surname }}</div>
                </div>

                <div class="elemen p30">
                    <div class="tlabel">Name:</div> <div class="info">{{ $patient->name }}</div>
                </div>

                <?php  $itoday=idate('Y',strtotime(date('Y-m-d')));
                $iDOB=idate('Y',strtotime($patient->DOB ));  ?>
                <div class="elemen p20">
                    <div class="tlabel">Age:</div><div class="info">{{abs($itoday-$iDOB)}}</div>
                </div>

                <div class="elemen p20">
                    <div class="tlabel">Sex:</div> <div class="info">{{$patient->sex}}</div>
                </div>
            </div>

            <div class="lstele">
                <div class="elemen p40">
                    <div class="tlabel">Address:</div><div class="info">{{ $patient->addres }}</div>
                </div>
                <div class="elemen p30">
                    <div class="tlabel">Telephone:</div> <div class="info">{{ $patient->telephone }}</div>
                </div>
                <div class="elemen p30">
                    <div class="tlabel">Email:</div><div class="info">{{ $patient->email }}</div>
                </div>
            </div>
          
            <div class="lstele">
                 <?php include(app_path().'/includes/paises.php') ?>  
                 <div class="elemen p40">    
                    <div class="tlabel">Nationality:</div><div class="info">{{ paises() }}</div>
                 </div>
                 
                 <script type="text/javascript"> var nation="<?php  echo  $patient->nationality; ?>"; </script>
                 <div class="elemen p30">
                    <div class="tlabel">Date of Birth:</div><div class="info"> {{ $patient->DOB }}</div>
                 </div>

                 <div class="elemen p30">
                    <div class="tlabel">Marital Status:</div><div class="info"> <?php echo $xMarital[$patient->maritalStts]; ?> </div>               
                 </div>             
            </div> 

            <div class="lstele">
                <div class="elemen p40">    
                    <div class="tlabel">Next of kin:</div><div class="info"> {{ $patient->nxOfKin }}</div>
                </div>

                <?php $xRelation=array("SP"=>"Spouse","PR"=>"Parents","SB"=>"Siblings","CH"=>"Children","GC"=>"Grandchildren","GP"=>"Grandparents","NN"=>"Nieces/Nephews","AU" =>"Aunts/Uncles","TC"=>"Great Grandchildren","TP"=>"Great Grandparents","GN"=>"Great Nieces/Nephews","CS"=>"Cousins","NG"=>"Neighbor")
                                 ?>
                <div class="elemen p20">    
                    <div class="tlabel">Relationship:</div><div class="info"><?php echo $xRelation[$patient->relation]; ?> </div>
                </div>

                <div class="elemen p40">    
                    <div class="tlabel">Contact information:</div><div class="info">{{ $patient->contact }}</div>
                </div>

            </div> 
            <div class="elemen p30" style="height: 40px;">     
                <div class="tlabel" style="float: left; margin: 4px;">Identification: </div><div class="info" style="margin-left: 20px;">{{ $identification }}</div>
            </div>      
        </div>
 
        
    </div> <!-- Fin del <div class="row ">  -->
          
    <script>
 
        $('#ptdt').find('input, textarea, button, select').attr('disabled','disabled');
        function iniSelect(elm, vlr){  document.getElementById(elm).value=vlr;}

        iniSelect("nation",nation);
        iniSelect("myrelation",srelation);
        iniSelect("marital",marital);

        if(document.forms[1].length > 0) {
                                        
                                        if(document.forms[1].elements.length > 0) {
                                                                                    document.forms[1].elements[1].focus();
                                                                                  }
                                        for (i = 1; i < document.forms[2].elements.length; i++) {
                                                                               
                                                                            document.forms[2].elements[i].disabled =true; 
                                                                           
                                                                         };
                                       }

  
    

</script>