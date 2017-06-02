<?php
	session_start();
	error_reporting(1);
	if(isset($_SESSION['fbuser']))
	{
		$v_user_id=$_GET['id'];
		include("background.php");
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
<script type="text/javascript" src="../../Search/jquery-1.8.0.min.js"></script>
<script type="text/javascript">
var $jq = jQuery.noConflict();
$jq(function(){
$jq(".search").keyup(function() 
{ 
var searchid = $jq(this).val();
var dataString = 'search='+ searchid;
if(searchid!='')
{
	$jq.ajax({
	type: "POST",
	url: "../../Search/search.php",
	data: dataString,
	cache: false,
	success: function(html)
	{
	$jq("#result").html(html).show();
	}
	});
}return false;    
});

jQuery("#result").live("click",function(e){ 
	var $clicked = $jq(e.target);
	var $name = $clicked.find('.name').html();
	var decoded = $jq("<div/>").html($name).text();
	$('#searchid').val(decoded);
});
jQuery(document).live("click", function(e) { 
	var $clicked = $jq(e.target);
	if (! $clicked.hasClass("search")){
	jQuery("#result").fadeOut(); 
	}
});
$jq('#searchid').click(function(){
	jQuery("#result").fadeIn();
});
});
</script>
<style type="text/css">
	.contesnt{
		margin:0 auto;
	}
	#searchid
	{
		width:236px;
		padding:7px;
	}
	#result
	{
		position:absolute;
		width:236px;
		padding:1px;
		display:none;
		margin-top:-1px;
		border-top:0px;
		overflow:hidden;
		border:1px #CCC solid;
		background-color: white;
	}
	.showss
	{
		padding:1px; 
		border-bottom:1px #999 dashed; 
		height:50px;
	}
	.showss:hover
	{
		background:#4c66a4;
		color:#FFF;
		cursor:pointer;
	}
</style>

</head>
<body id="body">
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
				<div class="contesnt">
				<input type="text" class="form-control search" id="searchid" placeholder="Search for people" /><br /> 
				<div id="result">
				</div>
				</div>&nbsp;
				<button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
			</form>
			<!--<li class="nav-item active">
                <a class="nav-link" href="#">Link</a>
            </li>-->
        </ul>
        <ul class="nav mt-lg-0 justify-content-end nav nav-pills ">
			<li class="nav-item">
                <a class="nav-link" href="../cg_home/Home.php">Home</a>	
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
    <a class="dropdown-item" href="../cg_home/Home.php">NewsFeed</a>
    <a class="dropdown-item" href="../cg_profile/about.php">Profile Info</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="../cg_home/Settings.php">Account Settings</a>
    <a class="dropdown-item" href="../cg_logout/logout.php">LogOut</a>
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
					  <img src="<?php $filename="../../cg_users/".$v_gender."/".$v_email."/Cover/".$cover_img;
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
                          <a class="navbar-brands" href="#"><img class="img-responsive" src="../../cg_users/<?php echo $v_gender; ?>/<?php echo $v_email; ?>/Profile/<?php echo $profile_img; ?>" style="height:100%; width:100%;"></a>
                          <span class="site-name"><b><?php echo $v_name; ?></b></span>                         
						  <span class="site-description"><?php echo $v_email; ?></span>
                        </div>
                    <ul class="nav nav-pills" style="margin-left:190px;margin-top:-25px">
							<li class="nav-item">
							<a class="nav-link" href="about.php?id=<?php echo $v_user_id; ?>">About</a>
							</li>
							<li class="nav-item">
							<a class="nav-link active" href="#">Photos</a>
						  </li>
						</ul>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="mainNav" >
                          
                        </div><!-- /.navbar-collapse -->
					</nav>
                    
                </header><!--/#HEADER-->
			<div class="card-group">
		  <div class="card">
			<img class="card-img-top" src="../../cg_users/<?php echo $v_gender; ?>/<?php echo $v_email; ?>/Profile/<?php echo $profile_img; ?>" alt="Profile Photo" style="max-height:300px;max-width: 300px">
			<div class="card-block">
			  <h4 class="card-title">Profile Photo</h4>
			 <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#one">View Enlarged</button>
			 </div>
		  </div>
		  <div class="card">
			<img class="card-img-top" src="<?php $filename="../../cg_users/".$v_gender."/".$v_email."/Cover/".$cover_img;if (getimagesize($filename)){echo "$filename";} else {echo "img/cover.jpg";}?>" alt="Cover Image" style="max-height:200px;max-width:600px">
			  <div class="card-block">
			  <h4 class="card-title">Cover Photo</h4>
			<button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#two">View Enlarged</button>
			</div>
		  </div>			
<?php
	$img_array = array();
	while($post_img_data=mysql_fetch_array($que_post_img))
	{
		array_push($img_array,$post_img_data[3]);
	}
?>
		  <div class="card">
			<img class="card-img-top" src="<?php $filename="../../cg_users/".$v_gender."/".$v_user."/Post/".$img_array[0];if (getimagesize($filename)){echo "$filename";} else {echo "img/not.png";}?>" alt="Timeline Photo" style="max-height:300px">
			  <div class="card-block">
			  <h4 class="card-title">Timeline</h4>
			  <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#three">View Enlarged</button>
			</div>
		  </div>
		</div>
			</div>
			<div class="modal fade bd-example-modal-lg" id="one" tabindex="-1" role="dialog" aria-hidden="true">
		  <div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Profile Photo</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <div class="modal-body">
				<img class="card-img-top" src="../../cg_users/<?php echo $v_gender; ?>/<?php echo $v_email; ?>/Profile/<?php echo $profile_img; ?>" alt="Profile Photo">
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			  </div>
			</div>
		  </div>
		</div>
		<div class="modal fade bd-example-modal-lg" id="two" tabindex="-1" role="dialog" aria-hidden="true">
		  <div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Cover Photo</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <div class="modal-body">
				<img class="card-img-top" src="<?php $filename="../../cg_users/".$v_gender."/".$v_email."/Cover/".$cover_img;if (getimagesize($filename)){echo "$filename";} else {echo "img/cover.jpg";}?>" alt="Cover Image" width="100%">
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			  </div>
			</div>
		  </div>
		</div>
		<div class="modal fade bd-example-modal-lg" id="three" tabindex="-1" role="dialog" aria-hidden="true">
		  <div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Timeline</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <div class="modal-body">
				<img class="card-img-top" src="<?php $filename="../../cg_users/".$v_gender."/".$v_user."/Post/".$img_array[0];if (getimagesize($filename)){echo "$filename";} else {echo "img/not.png";}?>" alt="Timeline photo" width="100%">
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			  </div>
			</div>
		  </div>
								
								</div>				
  	<!-- MainPanel Ends Here -->
	</div>
	<footer class="footer">
        <div class="container">
                <div class="col-lg-12">
                    <ul class="list-inline" style="">
                        <li class="list-inline-item">
                            <a href="../cg_home/Home.php">Home</a>
                        </li>
                        <li class="footer-menu-divider list-inline-item">&sdot;</li>
                        <li class="list-inline-item">
                            <a href="../cg_logout/logout.php">LogOut</a>
                        </li>
                        <li class="footer-menu-divider list-inline-item">&sdot;</li>
                        <li class="list-inline-item">
                            <a href="../../index.php#services">Project Information</a>
                        </li>
                        <li class="footer-menu-divider list-inline-item">&sdot;</li>
                        <li class="list-inline-item">
                            <a href="../../index.php#open">OpenSource</a>
                        </li>
						<li class="footer-menu-divider list-inline-item">&sdot;</li>
                        <li class="list-inline-item">
                            <a href="../../index.php#about">About Us</a>
                        </li>
                    </ul>
                    <p class="mb-0">Made With Love By You & Manjot Sidhu ...<br>Thanks God , Github , Git , Bootstrap , jquery , Bootsnipp , Stackoverflow , w3schools and much more</p>
                </div>
        
        </div>
    </footer>
 </body>
</html>
<?php
	}
	else
	{
		header("location:../../index.php");
	}
?>