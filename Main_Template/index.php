<!DOCTYPE html>
<html lang="en"><head>
<!--Main CSS-->
<link href="css/main.css?<?php echo time(); ?>" rel="stylesheet">
<!--BootStrap 4 Alpha config -->
<!-- BootStrap 4 alpha jquery config -->
<script src="../Bootstrap_4/js/bootstrap.js?<?php echo time(); ?>"></script>
<script src="../Bootstrap_4/js/bootstrap.min.js?<?php echo time(); ?>"></script>
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="js/tether.min.js?<?php echo time(); ?>" rel="stylesheet">
<link href="../Bootstrap_4/css/bootstrap.min.css?<?php echo time(); ?>" rel="stylesheet">
</head>
<body>
<!-- NavBar  Starts Here-->
<nav class="navbar container sticky-top navbar-light navbar-toggleable-md bg-faded justify-content-center">
	<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
		<script>
		$(function () {
		$('[data-toggle="tooltip"]').tooltip()
			})
	</script>
			<a class="navbar-brand" href="#" data-toggle="tooltip" data-placement="bottom" title="By You & Manjot Sidhu">
			<img src="img/brand.png" width="30" height="30" class="d-inline-block align-top" alt="" > CandyGram</a>
			
    <div class="navbar-collapse collapse" id="navbarNavDropdown">
        <ul class="navbar-nav mx-auto w-100 justify-content-center">
            <form class="form-inline my-2 my-lg-0">
				<input class="form-control mr-sm-2" type="text" placeholder="Search">
				<button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
			</form>
			<!--<li class="nav-item active">
                <a class="nav-link" href="#">Link</a>
            </li>-->
        </ul>
        <ul class="nav mt-lg-0 justify-content-end nav nav-pills ">
			<li class="nav-item">
                <a class="nav-link " href="#">Home</a>	
            </li>
			<li class="nav-item">
                <a class="nav-link " href="#">Timeline</a>	
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">Photos</a>
            </li>
			<li class="nav-item dropdown">
			<div class="btn-group">
  <button type="button" class="btn btn-success">Welcome, User</button>
  <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="#">NewsFeed</a>
    <a class="dropdown-item" href="#">Profile Info</a>
    
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="#">Account Settings</a>
    <a class="dropdown-item" href="#">LogOut</a>
  </div>
</div>
      </li>
        </ul>
    </div>
</nav>
<!--NavBar Ends Here-->
<!--Here Starts The Main Body -->
 <div class="modal-body row">
<!--Jugad--> <div class="col-sm-3"></div>
  <div class="fixed-top col-sm-3 " style="margin-top:5%">
   	<div class="container">
    <!-- SidePanel Starts Here -->
   		<!-- Profile Sidebar Starts Here-->
    		<div class="card hovercard">
                <div class="cardheader">

                </div>
                <div class="avatar">
                    <img alt="" src="http://lorempixel.com/100/100/people/9/">
                </div>
                <div class="info">
                    <div class="title">
                        <a target="_blank" href="#">User Name</a>
                    </div>
                    <div class="desc">HomeTown | Job</div>
                    <div class="desc">Birthday</div>
                </div>
                <div class="bottom">
					<ul class="list-group">
					<a href="#" class="list-group-item list-group-item list-group-item list-group-item-action justify-content-center">News Feed</a>
					<a href="#" class="list-group-item list-group-item-success list-group-item list-group-item-action justify-content-center">Timeline</a>
					<a href="#" class="list-group-item list-group-item-info list-group-item list-group-item-action justify-content-center">About Yourself</a>
					<a href="#" class="list-group-item list-group-item-warning list-group-item list-group-item-action justify-content-center">Photos</a>
					<a href="#" class="list-group-item list-group-item-danger list-group-item list-group-item-action justify-content-center">Account Settings</a>
					</ul>
                </div>
            </div>
            <!-- Profile Sidebar Starts Here-->
    <!-- SidePanel Ends Here -->
  	</div>
  </div>
  <div class="col-sm-8">
   <div class="container">
    <!-- MainPanel Starts Here -->
    		<div class="jumbotron-fluid container">
  <h3 class="display-4">Hello, Welcome To CandyGram</h3>
  <p class="lead">Demo Text</p>
   <p class="lead">
    <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
  </p>
</div>
<br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  	<!-- MainPanel Ends Here -->
	  </div>
  </div>
	</div>
	<footer class="footer">
    <div class="container">
        <div class="row">
			   <div class="col-lg-3"></div>
			   <div>
                <p class="lead">Made By You & Manjot Sidhu</p>  
				<p class="small">Thanks To You , GOD ,Git , Github , Bootstrap 4 Team , W3schools , Bootsnipp , Stackoverflow for helping me at every stage</p>
				<p class="small">Copyright &copy; GOD 2017. Always OpenSource</p>
               </div>
            </div>
      
        </div>
    </div>
</footer>
 </body>
</html>