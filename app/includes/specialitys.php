<?php  
  $speciality=[ 'Allergology',
                'Anaesthetics',
                'Cardiology',
                'Clinical biology',
                'Clinical chemistry',
                'Dermatology',
                'Endocrinology',
                'Gastroenterology',
                'Geriatrics',
                'Hematology',
                'Immunology',
                'Infectious diseases',
                'Internal medicine',
                'Laboratory medicine',
                'Microbiology',
                'Nephrology',
                'Neuropsychiatry',
                'Neurology',
                'Neurosurgery',
                'Obstetrics and gynaecology',
                'Ophthalmology',
                'Orthopaedics',
                'Otorhinolaryngology',
                'Paediatrics',
                'Pathology',
                'Pharmacology',
                'Physical medicine and rehabilitation',
                'Psychiatry',
                'Radiology',
                'Respiratory medicine',
                'Rheumatology',
                'Stomatology',
                'Urology',
                'Venereology'];


  function IsThisOp($elm, $real)
  { 
    return (($elm==$real) ? "selected":"");
  }
                $spSelect="";
                $i=1;
                $rl=((isset($userdata->speciality)) ? $userdata->speciality:""); 
?>
      
    @foreach($speciality as $spclt)  

      <?php
        $spSelect=$spSelect." <option value='".$i."' ".IsThisOp($i, $rl)." >".$spclt."</option> "; 
        $i++;
      ?>                            
    @endforeach