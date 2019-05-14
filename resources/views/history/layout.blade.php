<!DOCTYPE html>
<html>
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<title>Clinical History Form</title>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


    <?php $specialties= ["PATIENT DATA",
    					"Last Medical History",
                        "Current Medication",
                        "Social History", 
                        "Family History",
                        "Surgical History",
                        "Sustance Use",
                        "PhysicalExamination",
                        "PHYSICIANS NOTE"
                                        ]; 
$rutas= [				"",
    					"Last Medical History",
                        "Current Medication",
                        "Social History", 
                        "Family History",
                        "Surgical History",
                        "Sustance Use",
                        "PhysicalExamination",
                        "PHYSICIANS NOTE"
                                        ];

if(!isset($_SESSION)){
    session_start();
}                                        ?>

</head>
<body>

<style type="text/css">
    nav.navbar {
    background-color: #265C8A;
}
.navbar-inverse .nav li a{
  color: yellow  !important; 
}

/*Mouse encima*/
.navbar-inverse .nav li a:hover{
  color: red;
}
</style>

@if (!isset($_SESSION['identification']))  
     <?php $_SESSION['identification']=''; ?> 
@endif 
@if (!isset($_SESSION['name'])) 
    <?php  $_SESSION['name']='';  ?> 
@endif 

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Clinical History</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Reports</a></li>
      <li><a href="#">Contact</a></li>
    </ul>
  </div>
    <div>
        Patient: {{ $_SESSION['identification'] }}  {{ $_SESSION['name'] }}
    </div>
</nav>


<div class="container">
    @yield('content')
 
            @show
</div>

<div class="row" >
	@csrf 
<div class="col-xs-3 col-sm-3 col-md-3" >	
	<?php $i=0; ?>
	 @foreach($specialties as $image)
	                
	                        <?php 
	                            $filename=str_replace(" ", "", $rutas[$i]);
	                            $filename="/".$filename;
	                            $i=$i+1; ?>
                            @if ((!$_SESSION['identification'] == '') or $i<2) 
	                           <a href="{{url($filename)}}" class="btn btn-primary btn-lg btn-block">{{$image}}</a>
	                        @endif 
	            @endforeach
</div>	
<div class="temas col-xs-9 col-sm-9 col-md-9" style="height: 997px; overflow-y: scroll;" >
    @yield('eltema')
 
            @show
</div>
</div>
	
</body>
</html>