<?php
	include("Login.php");
?>
<html lang="en"><head>
<!--Main CSS-->
<link href="Main_Template/css/main.css?<?php echo time(); ?>" rel="stylesheet">
<!--BootStrap 4 Alpha config -->
<!-- BootStrap 4 alpha jquery config -->
<script src="Bootstrap_4/js/bootstrap.js?<?php echo time(); ?>"></script>
<script src="Bootstrap_4/js/bootstrap.min.js?<?php echo time(); ?>"></script>
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<meta charset="utf-8">
<meta name="viewport" content="width=1024,initial-scale=0">
<link href="Main_Template/js/tether.min.js?<?php echo time(); ?>" rel="stylesheet">
<link href="Bootstrap_4/css/bootstrap.min.css?<?php echo time(); ?>" rel="stylesheet">
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
			<img src="Main_Template/img/brand.png" width="30" height="30" class="d-inline-block align-top" alt="" > CandyGram</a>
			
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
                <a class="nav-link disabled" href="#">Home</a>	
            </li>
			<li class="nav-item">
                <a class="nav-link disabled" href="#">Timeline</a>	
            </li>
            <li class="nav-item active">
                <a class="nav-link disabled" href="#">Photos</a>
            </li>
			<li class="nav-item dropdown">
			<div class="btn-group">
  <button type="button" class="btn btn-success">Welcome</button>
  <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item disabled" href="#">NewsFeed</a>
    <a class="dropdown-item disabled" href="#">Profile Info</a>
    <div class="dropdown-divider disabled"></div>
    <a class="dropdown-item disabled" href="#">Account Settings</a>
    <a class="dropdown-item disabled" href="#">LogOut</a>
  </div>
</div>
      </li>
        </ul>
    </div>
</nav>
<!--NavBar Ends Here-->
<!--Here Starts The Main Body -->
    <div class="container" align="center">
    <!-- MainPanel Starts Here -->
    		<div class="jumbotron-fluid container">
  <h3 class="display-4">Hello, Welcome To CandyGram</h3>
  <p class="lead">We Are Almost Ready To ROCK !!!</p>
</div>
<div class="col-sm-8">
<div class="card mb-3 text-center">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link">Step 1</a>
      </li>
      <li class="nav-item">
        <a class="nav-link">Step 2</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active">Step 3</a>
      </li>
    </ul>
  </div>
  <div class="card-block">
    <form action="Forgot_Password4.php"  method="post">
		<label for="text-input" class="col-8 col-form-label"><h5>
					<?php
			mysql_connect("sql209.rf.gd","rfgd_20139087","R8qN11KQ");
			mysql_select_db("rfgd_20139087_cg");
	
			$userid=$_POST['userid'];
			$ans1=$_POST['ans1'];
	
			$que1=mysql_query("select * from user_secret_quotes where user_id=$userid and Answer1='$ans1'");
			$count1=mysql_num_rows($que1);
	
			if($count1>0)
			{
			$que2=mysql_query("select * from user_secret_quotes where user_id=$userid");
		
			$rec1=mysql_fetch_row($que2);
			echo "<h5> Secret Question 2: </h5>";
			echo "<h5>".$rec1[3]."</h5>";
?>
		</h5></label>
		<div class="form-group row">
			<label for="text-input" class="col-3 col-form-label">Your Answer :</label>
			<div class="col-9">
			<input type="text" name="ans2" class="form-control">
			<input type="hidden" value="<?php echo $userid; ?>" name="userid">
		</div>
			<label for="submit" class="col-3 col-form-label">
			<button type="submit" name="Next" value="Next" id="next" class="btn btn-primary">Next</button>
			</label>
	</form>
  </div>
</div></div>
  	<!-- MainPanel Ends Here -->
	</div>
 </body>
</html>
<?php
	}
	else
	{
		header("location:Forgot_Password.php");
	}
?>