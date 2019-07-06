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

<style type="text/css">
  label  {
    margin-left: 20px;

  }
</style>

<form  action="{{url('edituser')}}" method="post" style="width: 100%; text-align: center;margin: 20px;">
	@csrf 	
  <label>User:</label><input type="text" name="user" placeholder="User" value='{{ $userdata->user }}' onBlur='this.form.submit();'  required>
</form>

<form  action="{{url('saveuser')}}" method="post" style="width: 100%; text-align: center;margin: 20px;">
  @csrf   
  <input type="hidden" name="user" placeholder="User" value='{{ $userdata->user }}'>
  <strong>Acces level:</strong>
                                <select name="acceslevel" id="acceslevel" required>
                                    <option value="0">Inactive</option>
                                    <option value="1">Insert Patients</option>
                                    <option value="2">Insert History</option>
                                    <option value="3">Clinical Full Acces</option>
                                    <option value="4">Administrator</option>
                                    <option value="5">Principal Administrator</option>
                                </select>
                                 <script type="text/javascript"> var acceslvl="<?php  echo  $userdata->acceslevel; ?>"; </script>

  <br><br>
	<label>Name:</label> <input type="text" name="name"  value='{{ $userdata->name }}' required>
  <label>Surname:</label><input type="text" name="surname"  value='{{ $userdata->surname }}' required>
  <label>Identification:</label>  <input type="text" name="identification"  value='{{ $userdata->identification }}' required><br><br>
  <label>Email:</label> <input type="email" name="email"  value='{{ $userdata->email }}' required>
  <label>Phone:</label> <input type="text" name="phone"  value='{{ $userdata->phone }}' required><br><br>

  <label>Description:</label>
	<textarea  name = "description" required>{{ $userdata->description }}
  </textarea >
	<div class="col-xs-12 col-sm-12 col-md-12 text-center">
       	<button type="save" class="btn btn-primary">Save</button>
    </div>
</form>
<script type="text/javascript">
  
        function iniSelect(elm, vlr){  document.getElementById(elm).value=vlr;}
        iniSelect("acceslevel",acceslvl);
</script>
@endsection