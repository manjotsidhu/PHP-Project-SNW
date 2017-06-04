<?php
	session_start();
	error_reporting(1);
	if(isset($_SESSION['tempfbuser']))
	{
		mysql_connect("localhost","root","");
		mysql_select_db("candygram");
		$user=$_SESSION['tempfbuser'];
		$que1=mysql_query("select * from users where Email='$user' ");
		$rec=mysql_fetch_array($que1);
		$userid=$rec[0];
		$gender=$rec[4];
		if($gender=="Female")
		{
			$que2=mysql_query("select * from user_profile_pic where user_id=$userid");
			$count1=mysql_num_rows($que2);
			if($count1==0)
			{
		
?>
<?php

	if(isset($_POST['file']) && ($_POST['file']=='Upload'))
	{
		$path = "../../../cg_users/Female/".$user."/Profile/";
		$path2 = "../../../cg_users/Female/".$user."/Post/";
		$path3 = "../../../cg_users/Female/".$user."/Cover/";
		mkdir($path, 0, true);
		mkdir($path2, 0, true);
		mkdir($path3, 0, true);
		
		$img_name=$_FILES['file']['name'];
    	$img_tmp_name=$_FILES['file']['tmp_name'];
    	$prod_img_path=$img_name;
    	move_uploaded_file($img_tmp_name,"../../../cg_users/Female/".$user."/Profile/".$prod_img_path);
		
		mysql_query("insert into user_profile_pic(user_id,image) values('$userid','$img_name')");
		header("location:../cg_step2/Secret_Question1.php");
	} 
?>
<!DOCTYPE html>
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
        <a class="nav-link active" href="#">Upload Profile Picture</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Secret Question 1</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Secret Question 2</a>
      </li>
    </ul>
  </div>
  <div class="card-block">
    <form method="post" enctype="multipart/form-data" name="uimg">
	<div class="container col-md-6 col-md-offset-5">
		    <div class="form-group"><p class="lead">Upload Your Profile Photo</p>
              <div class="main-img-preview">
                <img class="thumbnail img-preview" src="step1_images/Female.jpg" title="Preview Logo">
              </div>
              <div class="input-group">
                <input id="fakeUploadLogo" class="form-control fake-shadow" placeholder="Choose File" disabled="disabled">
                <div class="input-group-btn">
                  <div class="fileUpload btn btn-danger fake-shadow">
                    <span>Upload Logo</span>
                    <input id="logo-id" type="file" name="file" class="attachment_upload" required>
                  </div>
                </div>
              </div>
            </div>
		</div>
		<button type="submit" value="Upload" name="file" id="upload_button" class="btn btn-success">Next</button>
		</form>
			<?php
		include("step1_erorr/step1_erorr.php");
	?>
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
			header("location:../cg_step1/Step1_Female.php");
		}
	}
	else
	{
		header("location:../../../index.php");
	}
?>