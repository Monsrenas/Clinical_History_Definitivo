<?php $identification=''; ?>

@extends('history.layout')

@section('eltema')
<?php use App\Familyhistory; ?>

@if (isset($_SESSION['identification']))
           <?php 
           		$identification=($_SESSION['identification']);  
			?>
@endif


 @if (isset($patient))
           <?php $identification="000";  ?>
 @else         
           <?php                     
            $patient[]=new Familyhistory;
            if (!isset($identification)) {$identification="";}
             $patientActive=false;
            ?>  
@endif





<div class="row" >
  @csrf 
<div class="col-xs-6 col-sm-6 col-md-6 list-group list-group-flush" > 
  <?php $i=0; ?>
   @foreach($patient as $patmt)
                  
                          <?php 
                              $stringpat=$patmt->name.' '.$patmt->surname.' '.$patmt->age;
                              $StrURL='PatienCng/'.$patmt->identification;
                              $i=$i+1; ?>
                             
                             <a href={{$StrURL}} class="list-group-item"><div style="float: left; width: 130px;">{{$patmt->identification}}</div> <div>{{$stringpat  }}</div></a>
                           
              @endforeach
</div> 
</div>
@endsection