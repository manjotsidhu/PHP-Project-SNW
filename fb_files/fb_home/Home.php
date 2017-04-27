<?php
	session_start();
	error_reporting(1);
	if(isset($_SESSION['fbuser']))
	{
		include("background.php");
?>
<?php
	if(isset($_POST['delete_warning']))
	{
		$user_warning_id=intval($_POST['warning_id']);
		mysql_query("delete from user_warning where user_id=$user_warning_id;");
	}
	if(isset($_POST['delete_notice']))
	{
		$n_id=intval($_POST['notice_id']);
		mysql_query("delete from users_notice where notice_id=$n_id;");
	}
	if(isset($_POST['txt']))
	{
		$txt=$_POST['post_txt'];
		$priority=$_POST['priority'];
		$post_time=$_POST['txt_post_time'];
		mysql_query("insert into user_post(user_id,post_txt,post_time,priority) values('$userid','$txt','$post_time','$priority');");
	}
	
	if(isset($_POST['file']) && ($_POST['file']=='post'))
	{
		$txt=$_POST['post_txt'];
		$priority=$_POST['priority'];
		$post_time=$_POST['pic_post_time'];
		if($txt=="")
		{
			$txt="added a new photo.";
		}
		if($gender=="Male")
		{
			$path = "../../fb_users/Male/".$user."/Post/";
		}
		else
		{
			$path = "../../fb_users/Female/".$user."/Post/";
		}
		
		$img_name=$_FILES['file']['name'];
    	$img_tmp_name=$_FILES['file']['tmp_name'];
    	$prod_img_path=$img_name;
		if($gender=="Male")
		{
			move_uploaded_file($img_tmp_name,"../../fb_users/Male/".$user."/Post/".$prod_img_path);
		}
		else
		{
			move_uploaded_file($img_tmp_name,"../../fb_users/Female/".$user."/Post/".$prod_img_path);
		}
    	mysql_query("insert into user_post(user_id,post_txt,post_pic,post_time,priority) values('$userid','$txt','$img_name','$post_time','$priority');");
	}
	if(isset($_POST['delete_post']))
	{
		$post_id=intval($_POST['post_id']);
		mysql_query("delete from user_post where post_id=$post_id;");
	}
	if(isset($_POST['Like']))
	{
		$post_id=intval($_POST['postid']);
		$user_id=intval($_POST['userid']);
		mysql_query("insert into user_post_status(post_id,user_id,status) values($post_id,$user_id,'Like');");
	}
	if(isset($_POST['Unlike']))
	{
		$post_id=intval($_POST['postid']);
		$user_id=intval($_POST['userid']);
		mysql_query("delete from user_post_status where post_id=$post_id and  	user_id=$user_id;");
	}
	if(isset($_POST['comment']))
	{
		$post_id=intval($_POST['postid']);
		$user_id=intval($_POST['userid']);
		$txt=$_POST['comment_txt'];
		if($txt!="")
		{
		mysql_query("insert into user_post_comment(post_id,user_id,comment) values($post_id,$user_id,'$txt');");
		}
	}
	if(isset($_POST['delete_comment']))
	{
		$comm_id=intval($_POST['comm_id']);
		mysql_query("delete from user_post_comment where comment_id=$comm_id;");
	}
?>
<html lang="en"><head>
<!--PHP Functioning -->
<link href="Home_css/Home.css" rel="stylesheet" type="text/css">
	<script src="Home_js/home.js" language="javascript"></script>
    <script>
		function time_get()
		{
			d = new Date();
			mon = d.getMonth()+1;
			time = d.getDate()+"-"+mon+"-"+d.getFullYear()+" "+d.getHours()+":"+d.getMinutes();
			posting_txt.txt_post_time.value=time;
		}
		function time_get1()
		{
			d = new Date();
			mon = d.getMonth()+1;
			time = d.getDate()+"-"+mon+"-"+d.getFullYear()+" "+d.getHours()+":"+d.getMinutes();
			posting_pic.pic_post_time.value=time;
		}
		function toggler(divId) {
		$("#" + divId).toggle();
		}
	</script>
<!--Main CSS-->
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
			<a class="navbar-brand" href="#" data-toggle="tooltip" data-placement="bottom" title="By Manjot Sidhu And Harneet Shah">
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
  <button type="button" class="btn btn-success">Welcome, <?php echo $name; ?></button>
  <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="#">NewsFeed</a>
    <a class="dropdown-item" href="#">Profile Info</a>
    <a class="dropdown-item" href="#">FeedBack</a>
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
    		<div class="card card_abs hovercard">
                <div class="cardheader" style="background-image:url(../../fb_users/<?php echo $gender; ?>/<?php echo $user; ?>/Cover/<?php echo $cover_img; ?>);">
					<?php 
					$query3=mysql_query("select * from user_cover_pic where user_id=$userid");
					$rec3=mysql_fetch_array($query3);
					$cover_img=$rec3[2];
	
					$que_post_bg=mysql_query("select * from user_post where user_id=$userid");
					$count_bg=mysql_num_rows($que_post_bg);
					$count_bg=$count_bg+1;
				?>
                </div>
                <div class="avatar">
                    <img alt="" src="../../fb_users/<?php echo $gender; ?>/<?php echo $user; ?>/Profile/<?php echo $img; ?>">
                </div>
                <div class="info">
                    <div class="title">
                        <a target="_blank" href="#"><?php echo $name; ?></a>
                    </div>
                    <div class="desc"><?php echo $gender; ?> | Job</div>
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
  <br>
</div>
<div class="card">
  <h5 class="card-header">Update Status &nbsp&nbsp<!--<button type="button" class="btn btn-secondary" onclick="toggler('ad_ph');"> Add Photos</button>--></h5>
  <div class="card-block">
    <form  method="post" name="posting_txt" onSubmit="return blank_post_check();" id="post_txt">
	<div class="form-group">
		<textarea class="form-control" rows="3" placeholder="What's on your mind?" name="post_txt"></textarea>
		<input type="hidden" name="txt_post_time">
	</div>	
	<div class="form-group">
		<select class="form-control" name="priority">
		<option value="Public">Public</option>
		<option value="Private">Only Me</option>
		</select> 
  </div>
  <div class="row">
  <div class="col-lg-2">
  <input class="btn btn-success" type="submit" value="Post !!!" name="txt" onClick="time_get()"></div>
  <div class="col-lg-10"><div class="form-group hidden" id="ad_ph">
  <!--
  <label class="custom-file">
  <input type="submit" value="post" name="file" id="post_button" onClick="time_get1()" class="custom-file-input">
  <span class="custom-file-control"></span>
</label>
-->
</div>
	</form>
  </div></div></div>
</div>
<?php
	$que_warning=mysql_query("select * from user_warning where user_id=$userid");
	$warning_count=mysql_num_rows($que_warning);
	if($warning_count>0)
	{
		$warning_data=mysql_fetch_array($que_warning);
		$warning_txt=$warning_data[1];
?>

<div style="position:fixed; background:#3A3E41; opacity: 0.8; left:0%; top:0%; height:100%; width:100%; z-index:3"></div>
<div style="position:fixed; background:#FFF; left:17%; top:5%; height:90%; width:65.5%; z-index:3"></div>


<div style="position:fixed; left:35%; top:8%; z-index:3;"> <img src="img/Warning_icon.png" height="100" width="100"></div>
<div style="position:fixed; left:43%; top:8%; z-index:3; color:#971111; font-size:72px;">   warning  </div>

<div style="position:fixed; left:20%; top:32%; color:#971111; font-size:20px; z-index:3;">  <?php echo $warning_txt; ?> 
</div>

<form method="post">
    <input type="hidden" name="warning_id" value="<?php echo $userid; ?>" >
<div style="position:fixed; left:62%; top:83%; z-index:3;">  
    <input type="submit" name="delete_warning" value="I accept Warning" id="accept_button">
</div> 
</form>
 
	
<?php	
	}
?>

<?php
	$que_notice=mysql_query("select * from users_notice where user_id=$userid");
	$notice_count=mysql_num_rows($que_notice);
	if($notice_count>0)
	{
		$notice_data=mysql_fetch_array($que_notice);
		$notice_id=$notice_data[0];
		$notice_txt=$notice_data[2];
		$notice_time=$notice_data[3];
?>

<div style="position:fixed; background:#3A3E41; opacity: 0.8; left:0%; top:0%; height:100%; width:100%; z-index:3"></div>
<div style="position:fixed; background:#FFF; left:17%; top:5%; height:90%; width:65.5%; z-index:3"></div>


<div style="position:fixed; left:39%; top:8%; z-index:3;"> <img src="img/Notice.png" height="100" width="100"></div>
<div style="position:fixed; left:47%; top:12%; z-index:3; color:#3B59A4; font-size:48px;">   Notice  </div>

<div style="position:fixed; left:20%; top:32%; font-size:20px; z-index:3;">  <?php echo $notice_txt; ?> 
</div>

<div style="position:fixed; left:62%; top:75%; font-size:20px; color:#999999; z-index:3;"> Notice Time: <?php echo $notice_time; ?> 
</div>

<form method="post">
    <input type="hidden" name="notice_id" value="<?php echo $notice_id; ?>" >
<div style="position:fixed; left:62%; top:83%; z-index:3;">  
    <input type="submit" name="delete_notice" value="I accept Notice" id="accept_button">
</div> 
</form>
 
	
<?php	
	}
?>
<!-- POSTS PANEL -->
	<div class="card">
  <div class="card-block">
	<div style="">
	<table cellspacing="0" class="table table-responsive">
<?php
	$que_post=mysql_query("select * from user_post where priority='Public' order by post_id desc");
	while($post_data=mysql_fetch_array($que_post))
	{
		$postid=$post_data[0];
		$post_user_id=$post_data[1];
		$post_txt=$post_data[2];
		$post_img=$post_data[3];
		$que_user_info=mysql_query("select * from users where user_id=$post_user_id");
		$que_user_pic=mysql_query("select * from user_profile_pic where user_id=$post_user_id");
		$fetch_user_info=mysql_fetch_array($que_user_info);
		$fetch_user_pic=mysql_fetch_array($que_user_pic);
		$user_name=$fetch_user_info[1];
		$user_Email=$fetch_user_info[2];
		$user_gender=$fetch_user_info[4];
		$user_pic=$fetch_user_pic[2];
?>
	<?php
		if($userid==$post_user_id)
		{ ?>
		<tr>
			<?php
			if($post_txt=="Join Faceback")
			{?>
				<td colspan="4"align="right" style="border-top:outset; border-top-width:medium;">&nbsp;  </td>
			<td>  </td>
			<td> </td>
			<?php
			}
			else
			{
			?>
			<td colspan="4"align="right" style="border-top:outset; border-top-width:medium;"> 
			<!--<form method="post">  
				<input type="hidden" name="post_id" value="<?php echo $postid; ?>" >
				<input type="submit" name="delete_post" value=" " style="background-color:#FFFFFF; border:#FFFFFF; background-image:url(img/delete_post.gif); width:2.3%;"> 
			</form>--></a> </td>
			<td>  </td>
			<td> </td>
		</tr>
		<?php
		}
		}
		else
		{ ?>
		<tr>
			<td colspan="4"align="right" style="border-top:outset; border-top-width:medium;">&nbsp;  </td>
			<td>  </td>
			<td> </td>
		</tr>
		<?php	
		}
	?>
 	
 	<tr>
		<td width="5%" style="padding-left:25;" rowspan="2"> <img src="../../fb_users/<?php echo $user_gender; ?>/<?php echo $user_Email; ?>/Profile/<?php echo $user_pic; ?>" height="60" width="55" class="img">  </td>
		<td > </td>
		<td> </td>
		<td> </td>
	</tr>
	<tr>
		<td colspan="3" style="padding:7;"> <a href="../fb_view_profile/view_profile.php?id=<?php echo $post_user_id; ?>" style="text-transform:capitalize; text-decoration:none; color:#003399;" onMouseOver="post_name_underLine(<?php echo $postid; ?>)" onMouseOut="post_name_NounderLine(<?php echo $postid; ?>)" id="uname<?php echo $postid; ?>"><h4><?php echo $user_name; ?></h4> </a>  </td>
		<td> </td>
		<td> </td>
		<td> </td>
	</tr>
<?php
	$len=strlen($post_data[2]);
	if($len>0 && $len<=73)
	{
		$line1=substr($post_data[2],0,73);
	?>
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;min-height:30%"><p class="lead"><?php echo $line1; ?> </p></td>
	</tr>
	<?php
	}
	else if($len>73 && $len<=146)
	{
		$line1=substr($post_data[2],0,73);
		$line2=substr($post_data[2],73,73);
	?>
	<tr >
		<td></td>
		<td colspan="3" style="padding-left:7;min-height:30%"><p class="lead"><?php echo $line1; ?> </p></td>	
	</tr>
	<tr >
		<td> </td>
		<td colspan="3" style="padding-left:7;min-height:30%"><p class="lead"><?php echo $line2; ?> </p></td>
	</tr>
	<?php
	}
	else if($len>146 && $len<=219)
	{
		$line1=substr($post_data[2],0,73);
		$line2=substr($post_data[2],73,73);
		$line3=substr($post_data[2],146,73);
	?>
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;min-height:30%"><p class="lead"><?php echo $line1; ?> </p></td>	
	</tr>
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;min-height:30%"><p class="lead"><?php echo $line2; ?> </p></td>	
	</tr>
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;min-height:30%"><p class="lead"><?php echo $line3; ?> </p></td>	
	</tr>
	<?php
	}
	else if($len>219 && $len<=292)
	{
		$line1=substr($post_data[2],0,73);
		$line2=substr($post_data[2],73,73);
		$line3=substr($post_data[2],146,73);
		$line4=substr($post_data[2],219,73);
	?>
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;min-height:30%"><p class="lead"><?php echo $line1; ?> </p></td>	
	</tr>
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;min-height:30%"><p class="lead"><?php echo $line2; ?> </p></td>	
	</tr>
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;min-height:30%"><p class="lead"><?php echo $line3; ?> </p></td>	
	</tr>
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;min-height:30%"><p class="lead"><?php echo $line4; ?> </p></td>	
	</tr>
	
	
	<?php
	}
	else if($len>292 && $len<=365)
	{
		$line1=substr($post_data[2],0,73);
		$line2=substr($post_data[2],73,73);
		$line3=substr($post_data[2],146,73);
		$line4=substr($post_data[2],219,73);
		$line5=substr($post_data[2],292,73);
	?>
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;min-height:30%"><p class="lead"><?php echo $line1; ?> </p></td>	
	</tr>
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;min-height:30%"><p class="lead"><?php echo $line2; ?> </p></td>	
	</tr>
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;min-height:30%"><p class="lead"><?php echo $line3; ?> </p></td>	
	</tr>
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;min-height:30%"><p class="lead"><?php echo $line4; ?> </p></td>	
	</tr>
	
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;min-height:30%"><p class="lead"><?php echo $line5; ?> </p></td>	
	</tr>
	
	
	<?php
	}
	else if($len>365 && $len<=438)
	{
		$line1=substr($post_data[2],0,73);
		$line2=substr($post_data[2],73,73);
		$line3=substr($post_data[2],146,73);
		$line4=substr($post_data[2],219,73);
		$line5=substr($post_data[2],292,73);
		$line6=substr($post_data[2],365,73);
	?>
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;min-height:30%"><p class="lead"><?php echo $line1; ?> </p></td>	
	</tr>
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;min-height:30%"><p class="lead"><?php echo $line2; ?> </p></td>	
	</tr>
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;min-height:30%"><p class="lead"><?php echo $line3; ?> </p></td>	
	</tr>
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;min-height:30%"><p class="lead"><?php echo $line4; ?> </p></td>	
	</tr>
	
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;min-height:30%"><p class="lead"><?php echo $line5; ?> </p></td>	
	</tr>
	
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;min-height:30%"><p class="lead"><?php echo $line6; ?> </p></td>	
	</tr>
	
	<?php
	}
	else if($len>438 && $len<=511)
	{
		$line1=substr($post_data[2],0,73);
		$line2=substr($post_data[2],73,73);
		$line3=substr($post_data[2],146,73);
		$line4=substr($post_data[2],219,73);
		$line5=substr($post_data[2],292,73);
		$line6=substr($post_data[2],365,73);
		$line7=substr($post_data[2],438,73);
	?>
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;min-height:30%"><p class="lead"><?php echo $line1; ?> </p></td>	
	</tr>
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;min-height:30%"><p class="lead"><?php echo $line2; ?> </p></td>	
	</tr>
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;min-height:30%"><p class="lead"><?php echo $line3; ?> </p></td>	
	</tr>
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;min-height:30%"><p class="lead"><?php echo $line4; ?> </p></td>	
	</tr>
	
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;min-height:30%"><p class="lead"><?php echo $line5; ?> </p></td>	
	</tr>
	
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;min-height:30%"><p class="lead"><?php echo $line6; ?> </p></td>	
	</tr>
	
	<tr>
		<td></td>
		<td colspan="3" style="padding-left:7;min-height:30%"><p class="lead"><?php echo $line7; ?> </p></td>	
		<td colspan="3" style="padding-left:7;min-height:30%"><p class="lead"><?php echo $line7; ?> </p></td>	
	</tr>
	
	<?php
	}
	?>
	<?php 
		if($post_data[3]!="")
		{
	?>
	<tr>
		<td>   </td>
		<td colspan="3"><img src="../../fb_users/<?php echo $user_gender; ?>/<?php echo $user_Email; ?>/Post/<?php echo $post_img; ?>" width="400" height="400"> </td>
		<td> </td>
		<td> </td>
	</tr>
	<?php
		}
	?>
	
	<tr style="color:#6D84C4;">
		<td >   </td>
		<?php
		 	$que_status=mysql_query("select * from user_post_status where post_id=$postid and user_id=$userid;");
			$que_like=mysql_query("select * from user_post_status where post_id=$postid");
			$count_like=mysql_num_rows($que_like);
			$status_data=mysql_fetch_array($que_status);
			if($status_data[3]=="Like")
			{?>
			
			<td style="padding-top:15;">
		<form method="post">
		<input class="form-control" type="hidden" name="postid" value="<?php echo $postid; ?>">
		<input class="form-control" type="hidden" name="userid" value="<?php echo $userid; ?>">
		<input class="form-control" type="submit" value="Unlike" name="Unlike" style="border:#FFFFFF; background:#FFFFFF; font-size:15px; color:#6D84C4;" onMouseOver="unlike_underLine(<?php echo $postid; ?>)" onMouseOut="unlike_NounderLine(<?php echo $postid; ?>)" id="unlike<?php echo $postid; ?>"></form></td>
			<?php
			}
			else
			{?>
			<td style="padding-top:15;">
		<form method="post">
		<input class="form-control" type="hidden" name="postid" value="<?php echo $postid; ?>">
		<input class="form-control" type="hidden" name="userid" value="<?php echo $userid; ?>">
		<input class="form-control" type="submit" value="Like" name="Like" style="border:#FFFFFF; background:#FFFFFF; font-size:15px; color:#6D84C4;" onMouseOver="like_underLine(<?php echo $postid; ?>)" onMouseOut="like_NounderLine(<?php echo $postid; ?>)" id="like<?php echo $postid; ?>"></form></td>
			<?php
			}
		 ?>
		 <?php
		 
		 	$que_comment=mysql_query("select * from user_post_comment where post_id =$postid order by comment_id");
	$count_comment=mysql_num_rows($que_comment);
		 ?>
		
		<td colspan="3"> &nbsp; <input type="button" value="Comment(<?php echo $count_comment; ?>)" style="background:#FFFFFF; border:#FFFFFF;font-size:15px; color:#6D84C4;" onClick="Comment_focus(<?php echo $postid; ?>);" onMouseOver="Comment_underLine(<?php echo $postid; ?>)" onMouseOut="Comment_NounderLine(<?php echo $postid; ?>)" id="comment<?php echo $postid; ?>"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   <span style="color:#999999;">   <?php echo $post_data[4]; ?> </span> </td>
		<td>   </td>
	</tr>
	<tr>
		<td>   </td>
		<td  bgcolor="#EDEFF4" style="width:9;" colspan="3"><img src="img/like.PNG"><span style="color:#6D84C4;"><?php echo $count_like; ?></span> like this. </td>
		<td> </td>
		<td> </td>
	</tr>
	<tr>
		<td>   </td>
		<td> </td>
		<td> </td>
		<td> </td>
	</tr>
<?php
	while($comment_data=mysql_fetch_array($que_comment))
	{
		$comment_id=$comment_data[0];
		$comment_user_id=$comment_data[2];
		$que_user_info1=mysql_query("select * from users where user_id=$comment_user_id");
		$que_user_pic1=mysql_query("select * from user_profile_pic where user_id=$comment_user_id");
		$fetch_user_info1=mysql_fetch_array($que_user_info1);
		$fetch_user_pic1=mysql_fetch_array($que_user_pic1);
		$user_name1=$fetch_user_info1[1];
		$user_Email1=$fetch_user_info1[2];
		$user_gender1=$fetch_user_info1[4];
		$user_pic1=$fetch_user_pic1[2];
?>
	<tr>
		<td> </td>
		<td width="4%" bgcolor="#EDEFF4" style="padding-left:12;" rowspan="2">  <img src="../../fb_users/<?php echo $user_gender1; ?>/<?php echo $user_Email1; ?>/Profile/<?php echo $user_pic1; ?>" height="40" width="47">    </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" > <a href="../fb_view_profile/view_profile.php?id=<?php echo $comment_user_id; ?>" style="text-transform:capitalize; text-decoration:none; color:#3B5998;" onMouseOver="Comment_name_underLine(<?php echo $comment_id; ?>)" onMouseOut="Comment_name_NounderLine(<?php echo $comment_id; ?>)" id="cuname<?php echo $comment_id; ?>"> <?php echo $user_name1; ?></a> </td>
	<?php
		if($userid==$post_user_id)
		{ ?>
			<td align="right" rowspan="2" bgcolor="#EDEFF4"> 
			<form method="post">  
				<input class="form-control" type="hidden" name="comm_id" value="<?php echo $comment_id; ?>" >
				<input class="form-control" type="submit" name="delete_comment" value="  " style="background-color:#FFFFFF; border:#FFFFFF; background-image:url(img/delete_comment.gif); width:13; height:13;"> &nbsp;
			</form> </td>
		<?php
		}
		else if($userid==$comment_user_id)
		{ ?>
		<td align="right" rowspan="2" bgcolor="#EDEFF4">
			<form method="post">  
				<input class="form-control" type="hidden" name="comm_id" value="<?php echo $comment_id; ?>" >
				<input class="form-control" type="submit" name="delete_comment" value="  " style="background-color:#FFFFFF; border:#FFFFFF; background-image:url(img/delete_comment.gif); width:13; height:13;"> &nbsp;
			</form> </td>
		<?php
		}
		else
		{?>
			<td align="right" rowspan="2" bgcolor="#EDEFF4">  </td>
		<?php
		}
	?>
		
	</tr>
	<?php
	$clen=strlen($comment_data[3]);
	if($clen>0 && $clen<=60)
	{
		$cline1=substr($comment_data[3],0,60);
	?>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline1; ?></td>
	</tr>
	<?php
	}
	else if($clen>60 && $clen<=120)
	{
		$cline1=substr($comment_data[3],0,60);
		$cline2=substr($comment_data[3],60,60);
	?>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline1; ?></td>
	</tr>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline2; ?></td>
	</tr>
	<?php
	}
	else if($clen>120 && $clen<=180)
	{
		$cline1=substr($comment_data[3],0,60);
		$cline2=substr($comment_data[3],60,60);
		$cline3=substr($comment_data[3],120,60);
	?>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline1; ?></td>
	</tr>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline2; ?></td>
	</tr>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline3; ?></td>
	</tr>
	<?php
	}
	else if($clen>180 && $clen<=240)
	{
		$cline1=substr($comment_data[3],0,60);
		$cline2=substr($comment_data[3],60,60);
		$cline3=substr($comment_data[3],120,60);
		$cline4=substr($comment_data[3],180,60);
	?>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline1; ?></td>
	</tr>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline2; ?></td>
	</tr>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline3; ?></td>
	</tr>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline4; ?></td>
	</tr>
	<?php
	}
	else if($clen>240 && $clen<=300)
	{
		$cline1=substr($comment_data[3],0,60);
		$cline2=substr($comment_data[3],60,60);
		$cline3=substr($comment_data[3],120,60);
		$cline4=substr($comment_data[3],180,60);
		$cline5=substr($comment_data[3],240,60);
	?>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline1; ?></td>
	</tr>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline2; ?></td>
	</tr>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline3; ?></td>
	</tr>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline4; ?></td>
	</tr>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline5; ?></td>
	</tr>
	<?php
	}
	else if($clen>300 && $clen<=360)
	{
		$cline1=substr($comment_data[3],0,60);
		$cline2=substr($comment_data[3],60,60);
		$cline3=substr($comment_data[3],120,60);
		$cline4=substr($comment_data[3],180,60);
		$cline5=substr($comment_data[3],240,60);
		$cline6=substr($comment_data[3],300,60);
	?>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline1; ?></td>
	</tr>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline2; ?></td>
	</tr>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline3; ?></td>
	</tr>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline4; ?></td>
	</tr>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline5; ?></td>
	</tr>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline6; ?></td>
	</tr>
	<?php
	}
	else if($clen>360 && $clen<=420)
	{
		$cline1=substr($comment_data[3],0,60);
		$cline2=substr($comment_data[3],60,60);
		$cline3=substr($comment_data[3],120,60);
		$cline4=substr($comment_data[3],180,60);
		$cline5=substr($comment_data[3],240,60);
		$cline6=substr($comment_data[3],300,60);
		$cline7=substr($comment_data[3],360,60);
	?>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline1; ?></td>
	</tr>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline2; ?></td>
	</tr>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline3; ?></td>
	</tr>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline4; ?></td>
	</tr>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline5; ?></td>
	</tr>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline6; ?></td>
	</tr>
	<tr>
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline7; ?></td>
	</tr>
	<?php
	}
	?>
	<?php
	}
	?>
	<tr>
	<td> </td>
	<td width="4%" style="padding-left:17;" bgcolor="#EDEFF4" rowspan="2">  <img src="../../fb_users/<?php echo $gender; ?>/<?php echo $user; ?>/Profile/<?php echo $img; ?>" style="height:33; width:33;">    </td>
		<td bgcolor="#EDEFF4" colspan="2" style="padding-top:15;"> 
		<form method="post" name="commenting" onSubmit="return blank_comment_check()"> 
		<input class="form-control" type="text" name="comment_txt" placeholder="Write a comment..." maxlength="420" style="width:440;" id="<?php echo $postid;?>"> 
		<input class="form-control" type="hidden" name="postid" value="<?php echo $postid; ?>"> 
		<input class="form-control" type="hidden" name="userid" value="<?php echo $userid; ?>"> 
		<input class="form-control" type="submit" name="comment" style="display:none;"> 
		</form> </td>
	</tr>
<tr><td></td><td></td><td></td><td></td></tr>	
	
<?php } ?>
	</table>
	</div>
	  </div></div>
	<?php
		include("Home_error/Home_error.php");
	?>
  	<!-- MainPanel Ends Here -->
	  </div>
  </div>
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