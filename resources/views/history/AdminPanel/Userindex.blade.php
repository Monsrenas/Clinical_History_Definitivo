<?php $user=''; ?>

@extends('history.AdminPanel.layout')

@section('eltema')
<?php use App\Login; ?>

@if (isset($_SESSION['user']))
           <?php 
           		$user=($_SESSION['user']);  
			?>
@endif


 @if (isset($user))
           <?php $user="";  ?>
 @else         
          <?php                     
            $user[]=new Login;
            if (!isset($user)) {$user="";}            
          ?>  
@endif





<div class="row" >
  @csrf 
<div class="col-xs-10 col-sm-10 col-md-10 list-group list-group-flush" > 
  <?php $i=0; ?>
   @foreach($user as $patmt)
                  
                          <?php 
                              $stringpat=$patmt->name.' '.$patmt->surname.' '.$patmt->acceslevel;
                              $StrURL='UserCng/'.$patmt->identification;
                              $i=$i+1; ?>
                             
                             <a href='#' class="list-group-item" style="height: 50px;">
                              
                                  <div style="float: left; width: 130px;">{{$patmt->user}}</div> 
                                  <div class="form-inline" style="float: left;">{{$stringpat  }}</div>
                                  
                                  <div class="form-inline" style="float: right;">
                                    <form class="form-inline" action="{{url('delete')}}" method="get">
                                      @csrf
                                      <input type="text" name="edition"  value="edition" hidden="true">
                                      <input type="text" name="user" value='{{ $patmt->user }}' hidden="true"> 
                                      <button type="submit" class="btn btn-default glyphicon glyphicon-trash btn-danger"></button>
                                    </form>
                                  </div>

                                  <div class="form-inline" style="float: right; margin-right: 10px;">
                                    <form class="form-inline" action="{{url('accestrue')}}" method="post">
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