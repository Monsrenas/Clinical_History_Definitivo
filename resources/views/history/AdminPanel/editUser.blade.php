<?php $identification=''; ?>

@extends('history.AdminPanel.layout')

@section('eltema')
<?php use App\Login; ?>

 @if (isset($userdata))
           <?php $useredit=$userdata->useredit;  ?>
 @else         
           <?php                     
            $userdata=new Login; 
           ?>
@endif

<form  action="{{url('saveuser')}}" method="post" style="width: 100%; text-align: center;margin: 20px;">
	@csrf 	
	<input type="text" name="user"  placeholder="User name" value='{{ $userdata->user }}'>
	<input type="text" name="acceslevel"  value='{{ $userdata->acceslevel }}'>
	<input type="text" name="name"  value='{{ $userdata->name }}'>
  <input type="text" name="surname"  value='{{ $userdata->surname }}'>
  <input type="text" name="identification"  value='{{ $userdata->identification }}'>
  <input type="email" name="email"  value='{{ $userdata->email }}'>
  <input type="text" name="phone"  value='{{ $userdata->phone }}'>

	<textarea  name = "description">{{ $patient->description }}
  </textarea >
	<div class="col-xs-12 col-sm-12 col-md-12 text-center">
       	<button type="save" class="btn btn-primary">Submit</button>
    </div>
</form>

@endsection
