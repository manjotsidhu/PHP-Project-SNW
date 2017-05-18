<?php
	session_start();
	error_reporting(1);
	if(isset($_SESSION['fbuser']))
	{
		$v_user_id=$_GET['id'];
		$user=$_SESSION['fbuser'];
		mysql_connect("localhost","root","");
		mysql_select_db("faceback");
		$query1=mysql_query("select * from users where Email='$user'");
		$rec1=mysql_fetch_array($query1);
		$userid=$rec1[0];
?>
<?php
		include("background.php");
		
		$user_info_query=mysql_query("select * from user_info where user_id=$v_user_id");
		$user_info_data=mysql_fetch_array($user_info_query);
?>
<!DOCTYPE html>
<html lang="en"><head>
<!--Main CSS-->
<link href="../../Main_Template/css/profile.css?<?php echo time(); ?>" rel="stylesheet">
<link href="../../Main_Template/css/main.css?<?php echo time(); ?>" rel="stylesheet">
<!--BootStrap 4 Alpha config -->
<!-- BootStrap 4 alpha jquery config -->
<script src="../../Bootstrap_4/js/bootstrap.js?<?php echo time(); ?>"></script>
<script src="../../Bootstrap_4/js/bootstrap.min.js?<?php echo time(); ?>"></script>
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="../../Main_Template/js/tether.min.js?<?php echo time(); ?>" rel="stylesheet">
<link href="../../Bootstrap_4/css/bootstrap.min.css?<?php echo time(); ?>" rel="stylesheet">
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
			<img src="../../Main_Template/img/brand.png" width="30" height="30" class="d-inline-block align-top" alt="" > CandyGram</a>
			
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
                <a class="nav-link" href="../fb_home/Home.php">Home</a>	
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="photos.php">Photos</a>
            </li>
			<li class="nav-item dropdown">
			<div class="btn-group">
  <button type="button" class="btn btn-success">Welcome, <?php echo $name; ?></button>
  <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="../fb_home/Home.php">NewsFeed</a>
    <a class="dropdown-item" href="../fb_profile/about.php">Profile Info</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="../fb_home/Settings.php">Account Settings</a>
    <a class="dropdown-item" href="../fb_logout/logout.php">LogOut</a>
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
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
				<div class="wrapper">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
								<header id="header">

				  <div class="slider">
				  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				  <!-- Wrapper for slides -->
				  <div class="carousel-inner" role="listbox">
					<div class="item active">
					  <img src="<?php $filename="../../fb_users/".$v_gender."/".$v_email."/Cover/".$cover_img;
							if (getimagesize($filename)) {
								echo "$filename";
							} else {
								echo "img/cover.jpg";
							}
							?>" height="100%" width="100%">
						
					  </div>
				  </div>
				</div>
                	</div><!--slider-->
                	<nav class="navbar navbar-default">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header inline-block">
                          <a class="navbar-brands" href="#"><img class="img-responsive" height="100%" width="100%" src="../../fb_users/<?php echo $v_gender; ?>/<?php echo $v_email; ?>/Profile/<?php echo $profile_img; ?>"></a>
                          <span class="site-name"><?php echo $v_name; ?></span>
                          <span class="site-description"><?php echo $v_email; ?></span>
                        </div>
                    <ul class="nav nav-pills" style="margin-left:190px;margin-top:-25px">
							<li class="nav-item">
							<a class="nav-link active" href="#">About</a>
							</li>
							<li class="nav-item">
							<a class="nav-link" href="photos.php?id=<?php echo $v_user_id; ?>">Photos</a>
						  </li>
						</ul>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="mainNav" >
                          
                        </div><!-- /.navbar-collapse -->
					</nav>
                    
                </header><!--/#HEADER-->
			</div>
  <div class="card-columns">
  <div class="card">
    <div class="card-block" >
      <h4 class="card-title">Work And Education</h4>
		<?php
			$job=$user_info_data[1];
			$school_or_collage=$user_info_data[2];
		?>
      <hr class="hr">
	  <p class="lead">
	  <img class="img rounded" src="../../Main_Template/img/brand.png" height="30px" width="30px">
	  <?php if($job!="") {
		?>
		<?php echo $job; ?>
		<?php
			} else {
		?>
		Add Your Job
		<?php	} ?><br>
	  <img class="img rounded" src="../../Main_Template/img/brand.png" height="30px" width="30px">
	  <?php
			if($school_or_collage!="")
			{
		?>
			<?php echo $school_or_collage; ?>
		<?php
			}
			else
			{
		?>
			Add Your School/College
		<?php
			}
		?>
	  </p>
    </div>
  </div>
  <div class="card">
    <div class="card-block">
      <h4 class="card-title">Living Location</h4>
		<?php
			$city=$user_info_data[3];
			$hometown=$user_info_data[4];
		?>
      <hr class="hr">
	  <p class="lead">
	  <img class="img rounded" src="../../Main_Template/img/brand.png" height="30px" width="30px">
	  <?php
			$city=$user_info_data[3];
			if($city!="")
			{
		?>
			<?php echo $city; ?>

		<?php
			}
			else
			{
		?>
			Add Your Current City
		<?php
			}	
		?><br>
	  <img class="img rounded" src="../../Main_Template/img/brand.png" height="30px" width="30px">
	  <?php
			$hometown=$user_info_data[4];
			if($hometown!="")
			{
		?>
			<?php echo $hometown; ?>
		<?php
			}
			else
			{
		?>
			Add your hometown
		<?php
			}
		?>
	  </p>
    </div>
  </div>
   <?php
	$user_data_query=mysql_query("select * from users where user_id=$v_user_id");
	$user_data=mysql_fetch_array($user_data_query);
	$bday=$user_data[5];
	$gender=$user_data[4];
	$Emial_id=$user_data[2];
	$relationship=$user_info_data[5];
	?>
  <div class="card">
    <div class="card-block">
      <h4 class="card-title">Basic Information</h4>
      <hr class="hr">
	  <p class="lead">
	  <b>Birthday</b> : <?php echo $bday; ?> <br>
	  <b>Gender</b> : <?php echo $gender; ?>  <br>
	  <b>Relationship</b> : <?php
			$relationship=$user_info_data[5];
			if($relationship!="")
			{	
		?>
			<?php echo $relationship; ?>
		<?php
			}
			else
			{
		?>
			Add Relationship
		<?php
			}
		?> <br>
	  </p>
    </div>
  </div>
	  <?php
			$m_no=$user_info_data[6];
			$m_no_priority=$user_info_data[7];
			$web=$user_info_data[8];
			$fb_id=$user_info_data[9];
			if($m_no_priority!="Private")
			{
		?>
  <div class="card">
    <div class="card-block">
      <h4 class="card-title">Contact Information</h4>
      <hr class="hr">
	  <p class="lead">
	  <b>Mobile Number</b> :  <?php if($m_no!=0) { echo $m_no;  } else{ echo "No Mobile Number";} } ?><br>
	  <b>Email</b> : <?php echo $Emial_id; ?><br>
	  <b>Website</b> : <?php echo $web; ?><br>
	  <b>Candygram Id</b> : <?php if($fb_id!="") { ?> <?php echo $fb_id; ?><?php } else { ?> Add CandyGram ID <?php } ?> <br>
	  </p>
    </div>
  </div>  
  <div class="card card-inverse card-info p-3 text-center">
    <blockquote class="card-blockquote">
      <h4><center>NOTE</center></h4>
	  <p>All These information are visible to your friends and who manage this website ...<br>So Plzz Be Careful</p>
      <p>I don't take any responsibility if your personal information gets leaked out ...</p>
	  <footer>
        <small>
          By <cite title="Source Title">You And Manjot Sidhu</cite>
        </small>
      </footer>
    </blockquote>
  </div>
</div>
  	<!-- MainPanel Ends Here -->
	</div>
  <!--Testing -->
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</body>
</html>
<?php
	}
	else
	{
		header("location:../../index.php");
	}
?>