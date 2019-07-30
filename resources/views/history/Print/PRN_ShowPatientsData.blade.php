
<?php 
            use App\Patient;
            ?>

    <style type="text/css">
        .form-inline { font-family: arial, helvetica, sans-serif; }

        .form-group { font-family: arial, helvetica, sans-serif; }
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
                        ?>

    <div class="row" style="padding: 1%; border-width:1px; border-style:solid; border-color:#000000; align: center; width: 100%; margin-left: 2px;">
        
      

        <div class="col-xs-11 col-sm-11 col-md-11" id="dpatient">
           <table>
               <tr>
                   <td><label>Surname:</label><a><big> {{ $patient->surname }}</big></a></td>
                   <td><label>Name:</label><a><big> {{ $patient->name }}</big></a></td>
                   <?php  $itoday=idate('Y',strtotime(date('Y-m-d')));
                          $iDOB=idate('Y',strtotime($patient->DOB ));  ?>
                    <td><label>Age:</label><a><big> {{abs($itoday-$iDOB)}}</big></a></td>
                    <td><label>Sex:</label><a><big> {{$patient->sex}}</big></a></td>
               </tr>
               <tr>
                   <td colspan="2"><label>Address: </label><a><big> {{ $patient->addres }}</big></a></td>
                   <td><label>Telephone:</label><a><big> {{ $patient->telephone }}</big></a></td>
                   <td><label>Email:</label><a><big>  {{ $patient->email }}</big></a></td>
               </tr>
               <tr>
                   <td><label>Date of Birth:</label><a><big> {{ $patient->DOB }}</big></a></td>
               </tr>
           </table>
                <label>Identification: </label><a><big>  {{ $identification }}</big> </a>    

                <div class="form-inline">                            
                            <div class="form-group">
                                
                            </div>
                </div>


                <div class="form-inline">    
                            <div class="form-group">
                                <strong> Nationality: </strong>
                                <?php include(app_path().'/includes/paises.php') ?>
                                <a>
                                {{ paises() }}
                                </a>
                                <script type="text/javascript"> var nation="<?php  echo  $patient->nationality; ?>"; </script>
                            </div>
                </div>

                <div class="form-inline">
                            <div class="form-group">
                        
                            </div>

                            <div class="form-group">
                                <label>Marital Status:</label>
                                <a >
                                <select name="maritalStts"id="marital" required disabled="true">
                                    <option value="S" >Single</option>
                                    <option value="M" >Married</option>
                                    <option value="D" >Divorced</option>
                                    <option value="W" >Widowed</option>
                                </select>
                                </a>
                                 <script type="text/javascript"> var marital="<?php  echo  $patient->maritalStts; ?>"; </script>    
                            </div>
                </div>
                <br><br>
                <div class="form-inline" >

                            <div class="form-group">
                                <label>Next of kin:</label><a><big> {{ $patient->nxOfKin }}</big></a>
                            </div>
                            <div class="form-group">
                                <a>
                                <strong>Relationship:</strong>
                                <select name="relation" id="myrelation" required disabled="true">
                                    <option value="SP" >Spouse</option>
                                    <option value="PR" >Parents</option>
                                    <option value="SB" >Siblings</option>
                                    <option value="CH" >Children</option>
                                    <option value="GC" >Grandchildren</option>
                                    <option value="GP" >Grandparents</option>
                                    <option value="NN" >Nieces/Nephews</option>
                                    <option value="AU" >Aunts/Uncles</option>
                                    <option value="TC" >Great Grandchildren</option>
                                    <option value="TP" >Great Grandparents</option>
                                    <option value="GN" >Great Nieces/Nephews</option>
                                    <option value="CS" >Cousins</option>
                                    <option value="NG" >Neighbor</option>
                                </select>
                                </a>
                                <script type="text/javascript"> var srelation="<?php  echo  $patient->relation; ?>"; </script>
                            </div>
                </div>
                <div class="form-inline">
                            <div class="form-group">
                                <label>Contact information:</label><a><big> {{ $patient->contact }}</big></a>
                            </div>
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