<!DOCTYPE html>
<html>
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<title>Clinical History Form</title>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  
if(!isset($_SESSION)){
    session_start();
}
 
@include('history.home')
</head>
         <div style="background: #4A7FAC; margin: 1px;">
          <div class="container-fluid">
            <div class="col-xs-3 col-sm-3 col-md-3">
             <ul class="nav navbar-nav navbar-left">
                    <li><a  style="color: white;"><span ></span>USER:   </a></li>
                </ul>
            </div>
            <form class="navbar-form navbar-left" action="{{url('multifind')}}">
                @csrf
                 
              <div class="form-group">
                <input type="text" name="findit" class="form-control" placeholder="Search">
              </div>
              <button type="submit" class="btn btn-default glyphicon glyphicon-search"> Patient</button>
            </form>
            
            <form class="navbar-form navbar-left" action="{{url('pfind')}}" method="post">
                @csrf
                 <input type="text" name="edition"  value="edition" hidden="true">
                <button type="submit" class="btn btn-default glyphicon glyphicon-plus">  New user</button>
            </form>

          </div>
        </div> 
<body>

	
</body>
</html>