



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

<?php 
if(!isset($_SESSION)){
    session_start();
}  
?>

@if (!isset($_SESSION['identification']))  
     <?php $_SESSION['identification']=''; ?> 
@endif 
@if (!isset($_SESSION['name'])) 
    <?php  $_SESSION['name']='';  ?> 
@endif 

@if (!isset($_SESSION['username'])) 
    <?php  $_SESSION['username']='';  ?> 
@endif 



<nav class="navbar navbar-default" style="margin-bottom: 0px;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">
          <img src="<?php echo app_path().'/includes/logo.jpg'; ?>" alt="">
      </a>
      <a class="navbar-brand" href="#">Clinical History</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Reports</a></li>
      <li><a href="#">Contact</a></li>
      <li><a></a></li>
    </ul>
 
    <ul class="nav navbar-nav navbar-right">
      <li><a><span ></span>USER: {{ $_SESSION['username'] }} </a></li>
      <li><a href="{{ url('userlogout') }}"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>