<!DOCTYPE html>
<html>
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<title>Clinical History Form</title>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <?php $specialties= ["PATIENT DATA",
                         "New Patient",
    					          "Patient Search"
                                        ]; 
$rutas= [				"Patients",
              "",
    					"Last Medical History"
                                        ];

   $bottonIcon= ["glyphicon-user","glyphicon-comment","glyphicon-folder-open","glyphicon glyphicon-tint","glyphicon-tree-deciduous","glyphicon-grain","glyphicon-scissors","glyphicon-filter","glyphicon-heart","glyphicon-edit","glyphicon-paperclip" ];
if(!isset($_SESSION)){
    session_start();
    if(!isset($_SESSION['opcion'])){$_SESSION['opcion']=""; }
}
 
$name='...';    
?>

@if (isset($_SESSION['name']))  
     <?php $name=$_SESSION['name']; ?> 
@endif

@include('history.home')

<script type="text/javascript">
  function markbtn(elm){  
    let lelem = document.getElementById(elm);

    lelem.style.marginLeft="25px";

    lelem.style.background = 'white';
    lelem.style.color = 'blue';
    lelem.style.fontSize = "large";
    lelem.style.fontStyle="italic";     
  }

</script>

</head>
         <div style="background: #4A7FAC; margin: 1px; margin-bottom: 2px; ">
          <div class="container-fluid">
            <div class="col-xs-3 col-sm-3 col-md-3">
             <ul class="nav navbar-nav navbar-left">
                    <li><a  style="color: white;"><span ></span>PATIENT:  {{$name}} </a></li>
                </ul>
            </div>
            
          </div>
        </div> 
<body>

<div class="row" style=" height: auto; max-height: vh;

background: rgba(255,255,255,1);
background: -moz-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(134,174,204,1) 100%);
background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(255,255,255,1)), color-stop(100%, rgba(134,174,204,1)));
background: -webkit-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(134,174,204,1) 100%);
background: -o-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(134,174,204,1) 100%);
background: -ms-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(134,174,204,1) 100%);
background: linear-gradient(to bottom, rgba(255,255,255,1) 0%, rgba(134,174,204,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#86aecc', GradientType=0 );

" >
	@csrf 
<div class="col-xs-3 col-sm-3 col-md-3" >	
	<?php $i=0; ?>
	 @foreach($specialties as $image)
              
	                        <?php 
	                            $filename=str_replace(" ", "", $rutas[$i]);
	                            $filename="/".$filename;
	                            $i=$i+1; ?>
                            @if ((!$_SESSION['identification'] == '')&&($_SESSION['acceslevel']>2)or($i<2))  
	                           <a href="{{url($filename)}}" id="bott{{ $i }}"  class="btn btn-block btn-primary btn-success" style="margin-left: 1px; margin-bottom: -4px;">{{$image}}  <span class="glyphicon {{$bottonIcon[$i-1]}} navbar-left"></span></a>
	                        @endif 
	            @endforeach
</div>	
<script type="text/javascript">markbtn( "<?php echo $_SESSION['opcion'];  ?>" )</script>

<div class="temas col-xs-9 col-sm-9 col-md-9" style="height: 997px; overflow-y: scroll;" >
    @yield('eltema')
 
            @show
</div>
</div>
	
</body>
</html>