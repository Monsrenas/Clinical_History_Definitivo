
@extends('history.AdminPanel.layout')

@section('eltema')
<?php use App\Login; 
  $acceslevel=["nactive",
                "Insert Patients",
                "Insert History",
                "Clinical Full Acces",
                "Administrator",
                "Principal Administrator" ];
?>

 @if (!isset($user))        
          <?php                     
            $user[]=new Login;          
          ?>  
@endif

<div class="row" >
  @csrf 
<div class="col-xs-10 col-sm-10 col-md-10 list-group list-group-flush" > 
  <div style="margin-bottom: 20px; margin-left: 20px; color: green; font-weight: bold; font-size: large;">
      <div style="float: left; width: 130px;">USER</div> 
      <div class="form-inline" style="float: left;  width: 300px;">USER NAME</div>
      <div class="form-inline" style="float: left; margin-left: 95px;">ACCES LEVEL</div>
  </div>
  <?php $i=0; ?>
   
   @foreach($user as $patmt)
                  
                          <?php 
                              $stringpat=$patmt->name.' '.$patmt->surname;
                              $StrURL='UserCng/'.$patmt->identification;
                              $i=$i+1; ?>
                             
                             <a href='#' class="list-group-item" style="height: 50px;">
                              
                                  <div style="float: left; width: 130px; font-weight: bold;">{{$patmt->user}}</div> 
                                  <div class="form-inline" style="float: left;  width: 400px;">{{$stringpat  }}</div>
                                  <div class="form-inline" style="float: left;">{{$acceslevel[$patmt->acceslevel]  }}</div>
                                  
                                  <div class="form-inline" style="float: right;">
                                    <form class="form-inline" action="{{url('deleteuser')}}" method="get">
                                      @csrf
                                      <input type="text" name="edition"  value="edition" hidden="true">
                                      <input type="text" name="user" value='{{ $patmt->user }}' hidden="true"> 
                                      <button type="submit" class="btn btn-default glyphicon glyphicon-trash btn-danger"></button>
                                    </form>
                                  </div>

                                  <div class="form-inline" style="float: right; margin-right: 10px;">
                                    <form class="form-inline" action="{{url('edituser')}}" method="post">
                                      @csrf
                                      <input type="text" name="edition"  value="edition" hidden="true">
                                      <input type="text" name="user" value='{{ $patmt->user }}' hidden="true"> 
                                      <button type="submit" class="btn btn-default glyphicon glyphicon-pencil"></button>
                                    </form>
                                  </div>
                            </a>
                           
              @endforeach
</div> 
</div>
@endsection