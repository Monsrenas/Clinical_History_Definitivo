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
<div class="col-xs-10 col-sm-10 col-md-10 list-group list-group-flush" > 
  <?php $i=0; ?>
   @foreach($patient as $patmt)
                  
                          <?php 
                              $stringpat=$patmt->name.' '.$patmt->surname.' '.$patmt->age;
                              $StrURL='PatienCng/'.$patmt->identification;
                              $i=$i+1; ?>
                             
                             <a href={{$StrURL}} class="list-group-item" style="height: 50px;">
                              
                                  <div style="float: left; width: 130px;">{{$patmt->identification}}</div> 
                                  <div class="form-inline" style="float: left;">{{$stringpat  }}</div>
                                  
                                  <div class="form-inline" style="float: right;">
                                    <form class="form-inline" action="{{url('delete')}}" method="get">
                                      @csrf
                                      <input type="text" name="edition"  value="edition" hidden="true">
                                      <input type="text" name="identification" value='{{ $patmt->identification }}' hidden="true"> 
                                      <button type="submit" class="btn btn-default glyphicon glyphicon-trash btn-danger"></button>
                                    </form>
                                  </div>

                                  <div class="form-inline" style="float: right; margin-right: 10px;">
                                    <form class="form-inline" action="{{url('pfind')}}" method="post">
                                      @csrf
                                      <input type="text" name="edition"  value="edition" hidden="true">
                                      <input type="text" name="identification" value='{{ $patmt->identification }}' hidden="true"> 
                                      <button type="submit" class="btn btn-default glyphicon glyphicon-pencil"></button>
                                    </form>
                                  </div>
                            </a>
                           
              @endforeach
</div> 
</div>
@endsection