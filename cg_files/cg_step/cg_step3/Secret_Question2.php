<?php
	session_start();
	error_reporting(1);
	if(isset($_SESSION['tempfbuser']))
	{
		$conn = mysqli_connect("localhost","root","", "connection");
		$user=$_SESSION['tempfbuser'];
		$que1=mysqli_query($conn ,"select * from users where Email='$user' ");
		$rec=mysqli_fetch_array($que1);
		$userid=$rec[0];
		$que2=mysqli_query($conn ,"select * from user_secret_quotes where user_id=$userid");
		$rec2=mysqli_fetch_array($que2);
		$q2=$rec2[3];
		$a2=$rec2[4];
		if($q2=="" && $a2=="")
		{
			$que3=mysqli_query($conn ,"select * from user_secret_quotes where user_id=$userid");
			$count3=mysqli_num_rows($que3);
			if($count3>0)
			{
		
?>
<?php
	if(isset($_POST['Finish']))
	{
		$que2=$_POST['que'];
		$ans2=$_POST['ans'];
		
		mysqli_query($conn ,"update user_secret_quotes set Question2='$que2',Answer2='$ans2' where user_id=$userid");
		
		$que_user_data=mysqli_query($conn ,"select * from users where Email='$user';");
		$user_data=mysqli_fetch_array($que_user_data);
		$userid=$user_data[0];
		$user_join_time=$user_data[6];
		mysqli_query($conn ,"insert into user_post(user_id,post_txt,post_time,priority) values($userid,'Joined Candygram','$user_join_time','Public');");
		mysqli_query($conn ,"insert into user_status values($userid,'Online')");
		mysqli_query($conn ,"insert into user_info(user_id) values($userid)");
		
		session_start();
		$_SESSION['fbuser']=$user;
		header("location:../../cg_home/Home.php");
	}
?>
<html lang="en"><head>
<style>
@import url(http://fonts.googleapis.com/css?family=Open+Sans:400,700,300);
body {
    font: 12px 'Open Sans';
}
.form-control, .thumbnail {
    border-radius: 2px;
}
.btn-danger {
    background-color: #B73333;
}

/* File Upload */
.fake-shadow {
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
}
.fileUpload {
    position: relative;
    overflow: hidden;
}
.fileUpload #logo-id {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 33px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
}
.img-preview {
    max-width: 100%;
}
</style>
<!--Main CSS-->
<link href="Main_Template/css/main.css?<?php echo time(); ?>" rel="stylesheet">
<!--BootStrap 4 Alpha config -->
<!-- BootStrap 4 alpha jquery config -->
<script src="../../../Bootstrap_4/js/bootstrap.js?<?php echo time(); ?>"></script>
<script src="../../../Bootstrap_4/js/bootstrap.min.js?<?php echo time(); ?>"></script>
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<meta charset="utf-8">
<meta name="viewport" content="width=1024,initial-scale=0">
<link href="../../../Main_Template/js/tether.min.js?<?php echo time(); ?>" rel="stylesheet">
<link href="../../../Bootstrap_4/css/bootstrap.min.css?<?php echo time(); ?>" rel="stylesheet">
</head>
<body>
<!-- NavBar  Starts Here-->
<nav class="navbar container sticky-top navbar-light navbar-toggleable-md bg-faded justify-content-center">
	<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
		<script>
		$(document).ready(function() {
		var brand = document.getElementById('logo-id');
		brand.className = 'attachment_upload';
		brand.onchange = function() {
			document.getElementById('fakeUploadLogo').value = this.value.substring(12);
		};

		function readURL(input) {
		if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
                $('.img-preview').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
			}
		}	
		$("#logo-id").change(function() {
			readURL(this);
		});
		});
		$(function () {
		$('[data-toggle="tooltip"]').tooltip()
			})
	</script>
			<a class="navbar-brand" href="#" data-toggle="tooltip" data-placement="bottom" title="By You & Manjot Sidhu">
			<img src="../../../Main_Template/img/brand.png" width="30" height="30" class="d-inline-block align-top" alt="" > CandyGram</a>
			
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
<div class="col-sm-10">
<div class="card mb-3 text-center">
  <div class="card-header">
    <ul class="nav nav-pills card-header-pills">
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Upload Profile Picture</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Secret Question 1</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="#">Secret Question 2</a>
      </li>
    </ul>
  </div>
  <div class="card-block">
    <p class="lead">Create Your Secret Question 2</p>
		<div class="container">
  <form method="post" name="sq" >
    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-3 col-form-label">Select Secret Question 2 :</label>
      <select name="que" class="custom-select col-sm-7 mb-2 mr-sm-2 mb-sm-0" required>
		<option value="select one">Select one</option>
		<option value="what is the first name of your favorite uncle?">What is the first name of your favorite uncle?</option>
		<option value="where did you meet you spouse?">Where did you meet you spouse?</option>
		<option value="what is your oldest cousins name?">What is your oldest cousin's name?</option>
		<option value="what is your youngest childs nickname?">What is your youngest child's nickname?</option>
		<option value="what is your oldest childs nickname?">What is your oldest child's nickname?</option>
		<option value="what is the first name of your oldest niece?">What is the first name of your oldest niece?</option>
		<option value="what is the first name of your oldest nephew?">What is the first name of your oldest nephew?</option>
		<option value="what is the first name of your favorite aunt?">What is the first name of your favorite aunt?</option>
		<option value="where did you spend you honeymoon?">Where did you spend you honeymoon?</option>
	  </select>
    </div>
    <div class="form-group row">
      <label for="inputPassword3" class="col-sm-3 col-form-label">Answer :</label>
      <div class="col-sm-7">
		<input type="text" name="ans" maxlength="50" class="form-control" required>
      </div>
    </div>
    <div class="form-group row">
      <div class="offset-sm-4 col-sm-3">
        <input type="submit" name="Finish" value="Finish" id="Next_button" class="btn btn-success">
      </div>
    </div>
  </form>
<?php
		include("step3_erorr/step3_erorr.php");
?>

</div>
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
				header("location:../cg_step2/Secret_Question1.php");
			}
		}
		else
		{
			header("location:../../cg_home/Home.php");
		}
	}
	else
	{
		header("location:../../../index.php");
	}
?>