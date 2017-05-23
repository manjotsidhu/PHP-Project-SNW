<?php
	session_start();
	error_reporting(1);
	if(isset($_SESSION['fbuser']))
	{
		$user=$_SESSION['fbuser'];
		mysql_connect("localhost","root","");
		mysql_select_db("candygram");
		$query1=mysql_query("select * from users where Email='$user'");
		$rec1=mysql_fetch_array($query1);
		$userid=$rec1[0];
?>
<?php
	if(isset($_POST['work_sub']))
	{
		$u_job=$_POST['job'];
		$u_edu=$_POST['edu'];
		mysql_query("update user_info set job='$u_job',school_or_collage='$u_edu' where user_id=$userid;");
	}
	
	if(isset($_POST['leving_sub']))
	{
		$u_city=$_POST['city'];
		$u_hometown=$_POST['hometown'];
		mysql_query("update user_info set  	current_city='$u_city',hometown='$u_hometown' where user_id=$userid;");
	}
	
	if(isset($_POST['basic_sub']))
	{
		if($_POST['day']=='Day:' && $_POST['month']=='Month:' && $_POST['year']=='Year:')
		{
			$u_relationship=$_POST['relationship'];
			mysql_query("update user_info set relationship_status='$u_relationship' where user_id=$userid;");
		}
		else
		{
			$day=intval($_POST['day']);
			$month=intval($_POST['month']);
			$year=intval($_POST['year']);
			if(checkdate($month,$day,$year))
			{
				$u_relationship=$_POST['relationship'];
				$u_birthday_date=$_POST['day'].'-'.$_POST['month'].'-'.$_POST['year'];
				mysql_query("update user_info set relationship_status='$u_relationship' where user_id=$userid;");
				mysql_query("update users set Birthday_Date='$u_birthday_date' where user_id=$userid;");
			}
			else
			{
				echo "<script>
				alert('The selected date is not valid.');
					</script>";
			}
		}
	}
	if(isset($_POST['contact_sub']))
	{
		$u_m_no=$_POST['mno'];
		$u_priority=$_POST['priority'];
		$u_web=$_POST['web'];
		$u_fb_id=$_POST['fbid'];
		mysql_query("update user_info set mobile_no='$u_m_no',mobile_no_priority='$u_priority',website='$u_web',Facebook_ID='$u_fb_id' where user_id=$userid;");
	}
	
		include("background.php");
		
		$user_info_query=mysql_query("select * from user_info where user_id=$userid");
		$user_info_data=mysql_fetch_array($user_info_query);
?>
<?php
		$user_data_query=mysql_query("select * from users where Email='$user'");
		$user_data=mysql_fetch_array($user_data_query);
		$bday=$user_data[5];
		$gender=$user_data[4];
		$Emial_id=$user_data[2];
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
$(function(){
$(".search").keyup(function() 
{ 
var searchid = $(this).val();
var dataString = 'search='+ searchid;
if(searchid!='')
{
	$.ajax({
	type: "POST",
	url: "../../Search/search.php",
	data: dataString,
	cache: false,
	success: function(html)
	{
	$("#result").html(html).show();
	}
	});
}return false;    
});

jQuery("#result").live("click",function(e){ 
	var $clicked = $(e.target);
	var $name = $clicked.find('.name').html();
	var decoded = $("<div/>").html($name).text();
	$('#searchid').val(decoded);
});
jQuery(document).live("click", function(e) { 
	var $clicked = $(e.target);
	if (! $clicked.hasClass("search")){
	jQuery("#result").fadeOut(); 
	}
});
$('#searchid').click(function(){
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
    <a class="dropdown-item" href="about.php">Profile Info</a>
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
						<?php 
							$query3=mysql_query("select * from user_cover_pic where user_id=$userid");
							$rec3=mysql_fetch_array($query3);
							$cover_img=$rec3[2];
							
							$que_post_bg=mysql_query("select * from user_post where user_id=$userid");
							$count_bg=mysql_num_rows($que_post_bg);
							$count_bg=$count_bg+1;
						?>
					  <img src="<?php $filename="../../cg_users/".$gender."/".$user."/Cover/".$cover_img;
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
                          <a class="navbar-brands" href="#"><img class="img-responsive" src="
						  ../../cg_users/<?php echo $gender; ?>/<?php echo $user; ?>/Profile/<?php echo $img; ?>" style="height:100%; width:100%;"></a>
                          <span class="site-name"><b><?php echo $name; ?></b></span>                         
						  <span class="site-description"><?php echo $Emial_id; ?></span>
                        </div>
                    <ul class="nav nav-pills" style="margin-left:190px;margin-top:-25px">
							<li class="nav-item">
							<a class="nav-link active" href="about.php">About</a>
							</li>
							<li class="nav-item">
							<a class="nav-link" href="photos.php">Photos</a>
						  </li>
						  <li class="nav-item">
							<a class="nav-link" href="../cg_home/Settings.php">Account Settings</a>
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
      <h4 class="card-title">Work And Education<button style="float:right;" type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#one_md">Edit</button></h4>
      <hr class="hr">
	  <p class="lead">
	  <img class="img rounded" src="../../Main_Template/img/brand.png" height="30px" width="30px">
		<?php
			$job=$user_info_data[1];
			$school_or_collage=$user_info_data[2];
			if($job!="")
			{
		?>
			<?php echo $job; ?>
		<?php
			}
			else
			{
		?>
		Add Your Job
		<?php	
			}
		?>
	  <br>
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
      <h4 class="card-title">Living Location<button style="float:right;" type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#two_md">Edit</button></h4>
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
		?>
	  <br>
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
  
  <div class="card">
    <div class="card-block">
      <h4 class="card-title">Basic Information<button style="float:right;" type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#three_md">Edit</button></h4>
	  

      <hr class="hr">
	  <p class="lead">
	  <b>Birthday</b> : <?php echo $bday; ?> <br>
	  <b>Gender</b> : <?php echo $gender; ?> <br>
	  <b>Relationship</b> : 
	  <?php
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
		?>
	  <br>
	  </p>
    </div>
  </div>
  <div class="card p-3">
    <div class="card-block">
      <h4 class="card-title">Contact Information<button style="float:right;" type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#four_md">Edit</button></h4>
      <hr class="hr">
	  <p class="lead">
	  <b>Mobile Number</b> :  
	  <?php
			$m_no=$user_info_data[6];
			if($m_no!=0)
			{
		?>
			<?php echo $m_no; ?>
		<?php
				$m_no_priority=$user_info_data[7];
				if($m_no_priority=="Private")
				{
		?>	
			<div style="position:absolute;left:70%;top:156%;"> <img src="img/only_me.PNG"> </div>
			
		<?php			
				}
			}
			else
			{
		?>
			Add Mobile Number
				
		<?php
			}
		?>
	  <br>
	  <b>Email</b> : <?php echo $Emial_id; ?> <br>
	  <b>Website</b> : 
	    
		<?php
			$web=$user_info_data[8];
			if($web!="")
			{
		?>
			<?php echo $web; ?>
		<?php
			}
			else
			{
		?>
			Add Website
		<?php
			}
		?> 
	  <br>
	  <b>Candygram Id</b> : 
			  
		<?php
			$fb_id=$user_info_data[9];
			if($fb_id!="")
			{
		?>
			<?php echo $fb_id; ?>
				
		<?php
			}
			else
			{
		?>
			Add CandyGram ID
		<?php
			}
		?> 
	  <br>
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
  <!-- Modals -->
<div class="modal fade" id="one_md" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h4>Edit Work And Education</h4>
		<hr class="hr">
		<form method="post" id="Work_form">
		<div class="form-group">
			<label>Job</label>
			<input type="text" value="<?php echo $job; ?>" name="job" class="form-control">
		</div>
		<div class="form-group">
			<label>School/College</label>
			<input type="text" value="<?php echo $school_or_collage; ?>" name="edu" class="form-control">
		</div>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" value="Save Changes" name="work_sub" class="btn btn-primary" ></form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="two_md" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h4>Edit Your Living Location</h4>
		<hr class="hr">
		<form method="post" id="Living_form">
		<div class="form-group">
			<label>Current City</label>
			<input type="text" value="<?php echo $city; ?>" name="city" class="form-control">
		</div>
		<div class="form-group">
			<label>Hometown</label>
			<input type="text" value="<?php echo $hometown; ?>" name="hometown" class="form-control">
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" value="Save Changes" name="leving_sub" class="btn btn-primary"></form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="three_md" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h4>Edit Basic Information</h4>
		<hr class="hr">
		<form method="post" id="basic_form">
		<div class="form-group">
			<label>Birthday</label>
			<select class="form-control" name="day">
			<option class="form-control form-inline" value="Day:"> Day: </option>
	
			<script type="text/javascript">
			
				for(i=1;i<=31;i++)
				{
					document.write("<option value='"+i+"'>" + i + "</option>");
				}
				
			</script>
	
			</select>
			<select class="form-control" name="month" >
			<option class="form-control form-inline" value="Month:"> Month: </option>
			
			<script type="text/javascript">
			
				var m=new Array("","Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
				for(i=1;i<=m.length-1;i++)
				{
					document.write("<option value='"+i+"'>" + m[i] + "</option>");
				}	
			</script>
			
			</select>
			<select name="year" class="form-control">
			<option value="Year:" class="form-control form-inline"> Year: </option>
			
			<script type="text/javascript">
			
				for(i=2017;i>=1960;i--)
				{
					document.write("<option value='"+i+"'>" + i + "</option>");
				}
			
			</script>
			
			</select>
		</div>
		<div class="form-group">
			<label>Gender : <?php echo $gender; ?> <small><br>Sorry, u cannot edit it</small></label>
		</div>
		<div class="form-group">
			<label>Relationship</label>
			<select name="relationship" class="form-control">
			<option value="" class="form-control form-inline"> ------------ </option>
			
			<script type="text/javascript">
			
				var rel=new Array("Single","In a relationship","Engaged","Married","Its complicated","In an open relationship","Windowed","Separated","Divoced");
				for(i=0;i<=rel.length-1;i++)
				{
					document.write("<option value='"+rel[i]+"'>" + rel[i] + "</option>");
				}	
			</script>
			
			</select>
		</div>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" value="Save Changes" name="basic_sub" class="btn btn-primary"></form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="four_md" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h4>Edit Contact Information</h4>
		<hr class="hr">
		<form method="post" name="contact" id="contact_form">
		<div class="form-group">
			<label>Mobile Number</label>
			<div class="row container">
			<div class="col-lg-6"><input class="form-control" type="text" value="<?php echo $m_no; ?>" name="mno" maxlength="10"></div>
			<div class="col-lg-6"><select class="form-control" name="priority">
			<option value="Private"> Only me </option>  
			<option value="Public"> Public </option> 
		</select></div></div>
		</div>
		<div class="form-group">
			<label>Email</label>
			<input class="form-control" type="text" value="<?php echo $Emial_id; ?>" disabled>
		</div>
		<div class="form-group">
			<label>Website</label>
			<input class="form-control" type="text" value="<?php echo $web; ?>" name="web" maxlength="40">
		</div>
		<div class="form-group">
			<label>Facebook Id</label>
			<input class="form-control" type="text" value="<?php echo $fb_id; ?>" name="fbid" maxlength="40">
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" value="Save Changes" name="contact_sub" class="btn btn-primary"></form>
      </div>
    </div>
  </div>
</div>					
  	<!-- MainPanel Ends Here -->
	</div>
  </body>
</html>
<?php
	}
	else
	{
		header("location:../../index.php");
	}
?>