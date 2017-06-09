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
			$path = "../../cg_users/Male/".$user."/Post/";
		}
		else
		{
			$path = "../../cg_users/Female/".$user."/Post/";
		}
		
		$img_name=$_FILES['file']['name'];
    	$img_tmp_name=$_FILES['file']['tmp_name'];
    	$prod_img_path=$img_name;
		if($gender=="Male")
		{
			move_uploaded_file($img_tmp_name,"../../cg_users/Male/".$user."/Post/".$prod_img_path);
		}
		else
		{
			move_uploaded_file($img_tmp_name,"../../cg_users/Female/".$user."/Post/".$prod_img_path);
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
<meta name="viewport" content="width=1024,initial-scale=0">
<link href="../../Main_Template/js/tether.min.js?<?php echo time(); ?>" rel="stylesheet">
<link href="../../Bootstrap_4/css/bootstrap.min.css?<?php echo time(); ?>" rel="stylesheet">
<?php 
	$query3=mysql_query("select * from user_cover_pic where user_id=$userid");
							$rec3=mysql_fetch_array($query3);
							$cover_img=$rec3[2];
							
							$que_post_bg=mysql_query("select * from user_post where user_id=$userid");
							$count_bg=mysql_num_rows($que_post_bg);
							$count_bg=$count_bg+1;
	
?>
<style type="text/css">
	.card.hovercard .cardheader {
    background-image:url('<?php $filename="../../cg_users/".$gender."/".$user."/Cover/".$cover_img;
							if (getimagesize($filename)) {
								echo "$filename";
							} else {
								echo "img/cover.jpg";
							}
							?>');
	background-size: 100%;
	height:100px;
	
}
	</style>
	<script type="text/javascript">
	$(document).ready( function() {
    	$(document).on('change', '.btn-file :file', function() {
		var input = $(this),
			label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		input.trigger('fileselect', [label]);
		});

		$('.btn-file :file').on('fileselect', function(event, label) {
		    
		    var input = $(this).parents('.input-group').find(':text'),
		        log = label;
		    
		    if( input.length ) {
		        input.val(log);
		    } else {
		        if( log ) alert(log);
		    }
	    
		});
		function readURL(input) {
		    if (input.files && input.files[0]) {
		        var reader = new FileReader();
		        
		        reader.onload = function (e) {
		            $('#img-upload').attr('src', e.target.result);
		        }
		        
		        reader.readAsDataURL(input.files[0]);
		    }
		}

		$("#imgInp").change(function(){
		    readURL(this);
		}); 	
	});
	</script>
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
	.btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}

#img-upload{
    width: 100%;
}
#sticky {
	top:100px;
}
#sticky.stick {
    position: fixed;
    top: 0;
    z-index: 10;
}
</style>
<script>

function sticky_relocate() {
    var window_top = $(window).scrollTop();
    var footer_top = $("#footer").offset().top;
    var div_top = $('#sticky-anchor').offset().top;
    var div_height = $("#sticky").height();
    
    var padding = 20;  // tweak here or get from margins etc
    
    if (window_top + div_height + 100 > footer_top - padding)
        $('#sticky').css({top: (window_top + div_height - footer_top + padding) * -1})
    else if (window_top > div_top) {
        $('#sticky').addClass('stick');
        $('#sticky').css({top:100})
    } else {
        $('#sticky').removeClass('stick');
    }
}

$(function () {
    $(window).scroll(sticky_relocate);
    sticky_relocate();
});
</script>
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
                <a class="nav-link " href="Home.php">Home</a>	
            </li>
			<li class="nav-item active">
                <a class="nav-link" href="../cg_profile/photos.php">Photos</a>
            </li>
			<li class="nav-item dropdown">
			<div class="btn-group">
  <button type="button" class="btn btn-success">Welcome, <?php echo $name; ?></button>
  <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="Home.php">NewsFeed</a>
    <a class="dropdown-item" href="../cg_profile/Profile.php">Profile Info</a>
    
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="Settings.php">Account Settings</a>
    <a class="dropdown-item" href="../cg_logout/logout.php">LogOut</a>
  </div>
</div>
      </li>
        </ul>
    </div>
</nav>
<!--NavBar Ends Here-->
<!--Here Starts The Main Body -->
 <div class="modal-body row">
<div class="col-sm-3"></div>
<div id="sticky-anchor"></div>
 <div id="sticky" class="col-sm-3" style="position:fixed;">
   	<div class="container">
    <!-- SidePanel Starts Here -->
   		<!-- Profile Sidebar Starts Here-->
    		<div class="card card_abs hovercard">
                <div class="cardheader" >
                </div>
                <div class="avatar"><a href="../cg_profile/profile.php">
                    <img alt="" src="../../cg_users/<?php echo $gender; ?>/<?php echo $user; ?>/Profile/<?php echo $img; ?>"></a>
                </div>
                <div class="info">
                    <div class="title">
                        <a href="../cg_profile/profile.php"><?php echo $name; ?></a>
                    </div>
                    <?php
					$user_data_query=mysql_query("select * from users where Email='$user'");
					$user_data=mysql_fetch_array($user_data_query);
					$bday=$user_data[5];
					$gender=$user_data[4];
					$Emial_id=$user_data[2];
					?>
					<div class="desc"><?php echo $gender; ?> |	
					<?php echo $bday; ?>
					</div>
                    <div class="desc"><?php echo $Emial_id; ?></div>
                </div>
                <div class="bottom">
					<ul class="list-group">
					<a href="Home.php" class="list-group-item list-group-item list-group-item-success list-group-item-action justify-content-center">News Feed</a>
					<a href="../cg_profile/Profile.php" class="list-group-item list-group-item-info list-group-item list-group-item-action justify-content-center">About Yourself</a>
					<a href="../cg_profile/photos.php" class="list-group-item list-group-item-warning list-group-item list-group-item-action justify-content-center">Photos</a>
					<a href="Settings.php" class="list-group-item list-group-item-danger list-group-item list-group-item-action justify-content-center">Account Settings</a>
					</ul>
                </div>
            </div>
            <!-- Profile Sidebar ends Here-->
    <!-- SidePanel Ends Here -->
  	</div>
  </div>
  <div class="col-sm-8">
   <div class="container">
    <!-- MainPanel Starts Here -->
	<script type="text/javascript">
	$(function ac() { $('#collapse1').collapse('toggle');$('#collapse2').collapse('toggle')});
	</script>
    		<div class="jumbotron-fluid container">
  <h3 class="display-4">Hello, Welcome To CandyGram</h3>
  <br>
</div>
<div class="row">
<div class="col-sm-8">
<div class="card">
 <div id="accordion" role="tablist" aria-multiselectable="true">
  <div class="card">
    <div class="card-header" role="tab" id="headingOne">
      <h5 class="mb-0">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
          Update Status With Photos
        </a>
      </h5>
    </div>

    <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
      <div class="card-block">
        <form  method="post" enctype="multipart/form-data" name="posting_pic" id="post_pic" onSubmit="return Img_check();">
	<div class="form-group">
		<textarea class="form-control" rows="3" name="post_txt" maxlength="511" placeholder="What's on your mind?"></textarea>
		
	</div>	<input class="form-control" type="hidden" name="pic_post_time">
	<div class="form-group">
		<select class="form-control" name="priority"> 
<option value="Public"> Public </option> 
<option value="Private"> Only me </option> 
</select>
  </div>
  <div class="row">
  <div class="col-lg-3"><button class="btn btn-success form-control" type="submit" value="post" name="file" id="post_button" onClick="time_get1()">Post !!!</button></div>
	<div class="col-lg-7">	
	<div class="form-group">
        <div class="input-group">
            <span class="input-group-btn">
                <span class="btn btn-danger btn-file">
                    Browse <input class="form-control" type="file" name="file" id="imgInp">
					
                </span>
            </span>
            <input type="text" class="form-control" readonly>
        </div>
    </div></div>
	
	</div>
	<img id='img-upload'/>
	</form>
		</div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" role="tab" id="headingTwo">
      <h5 class="mb-0">
        <a class="collapsed show" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          Update Status
        </a>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" >
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
 </div></div></div>
	</form> 
		</div>
    </div>
  </div>
</div>
 </div>
</div>
<div class="col-sm-4">
<div class="card">
      <div class="card-block">
        <h4 class="card-title">Whats New <span class="badge badge-success">New</span></h4>
        <p class="card-text">Now You Can Post Photos<br>Now You Can Search from your friends <br>Now you can view profile of your friends<br>Added PHP to Profile Panel<br>Posts Feeds Themed a bit<br>Improvements in navigation</p>
        <a href="https://github.com/manjotsidhu/PHP-Project-SNW" class="btn btn-primary">More Info</a>
      </div>
    </div>
</div>
</div>
<br>
<!-- POSTS PANEL -->
	<div class="card">
  <div class="card-block">
	<div style="">
	<table cellspacing="0" class="" style="border-bottom: none;">
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
			if($post_txt=="Join")
			{?>
				<td colspan="4"align="right">&nbsp;  </td>
			<td>  </td>
			<td> </td>
			<?php
			}
			else
			{
			?>
			<td colspan="4"align="right"> 
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
		<?php	
		}
	?>
 	
 	<tr class="tr_l tr_r hds" style="background-color:#F7F7F9;border-top:outset; border-top-width:thin;border-top-color:#999999;">
		<td width="5%" style="padding-left:25;" rowspan="2"> <img src="../../cg_users/<?php echo $user_gender; ?>/<?php echo $user_Email; ?>/Profile/<?php echo $user_pic; ?>" height="40" width="45" class="img rounded">  </td>
		<td > </td>
		<td> </td>
		<td> </td>
	</tr>
	<tr class="tr_l tr_r hds" style="background-color:#F7F7F9;border-left:outset; border-left-width:thin;border-left-color:#999999;border-bottom:outset; border-bottom-width:thin;border-bottom-color:#999999">
		<td colspan="3" style="padding:0;"><div style="float:right;padding-top:5px"><span style="color:#999999;"><?php echo $post_data[4]; ?></span>  </div>  <a href="../cg_view_profile/view_profile.php?id=<?php echo $post_user_id; ?>" style="text-transform:capitalize; text-decoration:none; color:#003399;" onMouseOver="post_name_underLine(<?php echo $postid; ?>)" onMouseOut="post_name_NounderLine(<?php echo $postid; ?>)" id="uname<?php echo $postid; ?>"><h4 class="card-title" style="padding-left:5px"><?php echo $user_name; ?></h4></a></td>
	</tr>
<?php
	$len=strlen($post_data[2]);
	if($len>0 && $len<=73)
	{
		$line1=substr($post_data[2],0,73);
	?>
	<tr class="tr_l tr_r">
		<td></td>
		<td colspan="3" style="padding-left:7;min-height:30%"><br><blockquote class="blockquote"><p class="lead"><?php echo $line1; ?> </p></td>
	</tr>
	<?php
	}
	else if($len>73 && $len<=146)
	{
		$line1=substr($post_data[2],0,73);
		$line2=substr($post_data[2],73,73);
	?>
	<tr class="tr_l tr_r">
		<td></td>
		<td colspan="3" style="padding-left:7;min-height:30%"><blockquote class="blockquote"><p class="lead"><?php echo $line1; ?> </p></td>	
	</tr>
	<tr class="tr_l tr_r">
		<td> </td>
		<td colspan="3" style="padding-left:7;min-height:30%"><blockquote class="blockquote"><p class="lead"><?php echo $line2; ?> </p></td>
	</tr>
	<?php
	}
	else if($len>146 && $len<=219)
	{
		$line1=substr($post_data[2],0,73);
		$line2=substr($post_data[2],73,73);
		$line3=substr($post_data[2],146,73);
	?>
	<tr class="tr_l tr_r">
		<td></td>
		<td colspan="3" style="padding-left:7;min-height:30%"><blockquote class="blockquote"><p class="lead"><?php echo $line1; ?> </p></td>	
	</tr>
	<tr class="tr_l tr_r">
		<td></td>
		<td colspan="3" style="padding-left:7;min-height:30%"><blockquote class="blockquote"><p class="lead"><?php echo $line2; ?> </p></td>	
	</tr>
	<tr class="tr_l tr_r">
		<td></td>
		<td colspan="3" style="padding-left:7;min-height:30%"><blockquote class="blockquote"><p class="lead"><?php echo $line3; ?> </p></td>	
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
	<tr class="tr_l tr_r">
		<td></td>
		<td colspan="3" style="padding-left:7;min-height:30%"><p class="lead"><?php echo $line1; ?> </p></td>	
	</tr>
	<tr class="tr_l tr_r">
		<td></td>
		<td colspan="3" style="padding-left:7;min-height:30%"><p class="lead"><?php echo $line2; ?> </p></td>	
	</tr>
	<tr class="tr_l tr_r">
		<td></td>
		<td colspan="3" style="padding-left:7;min-height:30%"><p class="lead"><?php echo $line3; ?> </p></td>	
	</tr>
	<tr class="tr_l tr_r">
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
	<tr class="tr_l tr_r">
		<td></td>
		<td colspan="3" style="padding-left:7;min-height:30%"><p class="lead"><?php echo $line1; ?> </p></td>	
	</tr>
	<tr class="tr_l tr_r">
		<td></td>
		<td colspan="3" style="padding-left:7;min-height:30%"><p class="lead"><?php echo $line2; ?> </p></td>	
	</tr>
	<tr class="tr_l tr_r">
		<td></td>
		<td colspan="3" style="padding-left:7;min-height:30%"><p class="lead"><?php echo $line3; ?> </p></td>	
	</tr>
	<tr class="tr_l tr_r">
		<td></td>
		<td colspan="3" style="padding-left:7;min-height:30%"><p class="lead"><?php echo $line4; ?> </p></td>	
	</tr>
	
	<tr class="tr_l tr_r">
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
	<tr class="tr_l tr_r">
		<td></td>
		<td colspan="3" style="padding-left:7;min-height:30%"><p class="lead"><?php echo $line1; ?> </p></td>	
	</tr>
	<tr class="tr_l tr_r">
		<td></td>
		<td colspan="3" style="padding-left:7;min-height:30%"><p class="lead"><?php echo $line2; ?> </p></td>	
	</tr>
	<tr class="tr_l tr_r">
		<td></td>
		<td colspan="3" style="padding-left:7;min-height:30%"><p class="lead"><?php echo $line3; ?> </p></td>	
	</tr>
	<tr class="tr_l tr_r">
		<td></td>
		<td colspan="3" style="padding-left:7;min-height:30%"><p class="lead"><?php echo $line4; ?> </p></td>	
	</tr>
	
	<tr class="tr_l tr_r">
		<td></td>
		<td colspan="3" style="padding-left:7;min-height:30%"><p class="lead"><?php echo $line5; ?> </p></td>	
	</tr>
	
	<tr class="tr_l tr_r">
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
	<tr class="tr_l tr_r">
		<td></td>
		<td colspan="3" style="padding-left:7;min-height:30%"><p class="lead"><?php echo $line1; ?> </p></td>	
	</tr>
	<tr class="tr_l tr_r">
		<td></td>
		<td colspan="3" style="padding-left:7;min-height:30%"><p class="lead"><?php echo $line2; ?> </p></td>	
	</tr>
	<tr class="tr_l tr_r">
		<td></td>
		<td colspan="3" style="padding-left:7;min-height:30%"><p class="lead"><?php echo $line3; ?> </p></td>	
	</tr>
	<tr class="tr_l tr_r">
		<td></td>
		<td colspan="3" style="padding-left:7;min-height:30%"><p class="lead"><?php echo $line4; ?> </p></td>	
	</tr>
	
	<tr class="tr_l tr_r">
		<td></td>
		<td colspan="3" style="padding-left:7;min-height:30%"><p class="lead"><?php echo $line5; ?> </p></td>	
	</tr>
	
	<tr class="tr_l tr_r">
		<td></td>
		<td colspan="3" style="padding-left:7;min-height:30%"><p class="lead"><?php echo $line6; ?> </p></td>	
	</tr>
	
	<tr class="tr_l tr_r">
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
	<tr class="tr_l tr_r">
		<td>   </td>
		<td colspan="3"><img class="img rounded img-thumbnail" src="../../cg_users/<?php echo $user_gender; ?>/<?php echo $user_Email; ?>/Post/<?php echo $post_img; ?>" width="500" height="400"> </td>
		<td> </td>
		<td> </td>
	</tr>
	<?php
		}
	?>
	<tr class="tr_l tr_r" style="color:#6D84C4;vertical-align:bottom"><!-- color of comment,like -->
		<td >   </td>
		<?php
		 	$que_status=mysql_query("select * from user_post_status where post_id=$postid and user_id=$userid;");
			$que_like=mysql_query("select * from user_post_status where post_id=$postid");
			$count_like=mysql_num_rows($que_like);
			$status_data=mysql_fetch_array($que_status);
			if($status_data[3]=="Like")
			{?>
			
			<td style="position:relative;top:15px">
		<form method="post">
		<input class="form-control" type="hidden" name="postid" value="<?php echo $postid; ?>">
		<input class="form-control" type="hidden" name="userid" value="<?php echo $userid; ?>">
		<input class="form-control btn btn-warning" type="submit" value="Unlike" name="Unlike" onMouseOver="unlike_underLine(<?php echo $postid; ?>)" onMouseOut="unlike_NounderLine(<?php echo $postid; ?>)" id="unlike<?php echo $postid; ?>"></form></td>
			<?php
			}
			else
			{?>
			<td style="position:relative;top:15px">
		<form method="post">
		<input class="form-control" type="hidden" name="postid" value="<?php echo $postid; ?>">
		<input class="form-control" type="hidden" name="userid" value="<?php echo $userid; ?>">
		<input class="form-control btn btn-success align-bottom " type="submit" value="Like" name="Like" onMouseOver="like_underLine(<?php echo $postid; ?>)" onMouseOut="like_NounderLine(<?php echo $postid; ?>)" id="like<?php echo $postid; ?>"></form></td>
			<?php
			}
		 ?>
		 <?php
		 
		 	$que_comment=mysql_query("select * from user_post_comment where post_id =$postid order by comment_id");
	$count_comment=mysql_num_rows($que_comment);
		 ?>
		
		<td colspan="3"> &nbsp; <input class="form-control btn btn-info col-lg-3" type="button" value="Comment(<?php echo $count_comment; ?>)" onClick="Comment_focus(<?php echo $postid; ?>);" onMouseOver="Comment_underLine(<?php echo $postid; ?>)" onMouseOut="Comment_NounderLine(<?php echo $postid; ?>)" id="comment<?php echo $postid; ?>"> </td>
		<td>   </td>
	</tr>
	<tr class="tr_l tr_r">
		<td>   </td>
		<td  bgcolor="#EDEFF4" style="width:9;" colspan="3"><img src="img/like-ico.png" width="35px" height="35px"><span style="color:#6D84C4;">&nbsp;<?php echo $count_like; ?></span> like this. </td>
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
	<tr class="tr_l tr_r">
		<td> </td>
		<td width="4%" bgcolor="#EDEFF4" style="padding-left:12;" rowspan="2">  <img class="img rounded" src="../../cg_users/<?php echo $user_gender1; ?>/<?php echo $user_Email1; ?>/Profile/<?php echo $user_pic1; ?>" height="47" width="47">    </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" > <a href="../cg_view_profile/view_profile.php?id=<?php echo $comment_user_id; ?>" style="text-transform:capitalize; text-decoration:none; color:#3B5998;" onMouseOver="Comment_name_underLine(<?php echo $comment_id; ?>)" onMouseOut="Comment_name_NounderLine(<?php echo $comment_id; ?>)" id="cuname<?php echo $comment_id; ?>"> <?php echo $user_name1; ?></a> </td>
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
	<tr class="tr_l tr_r">
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
	<tr class="tr_l tr_r">
		<td> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline1; ?></td>
	</tr>
	<tr class="tr_l tr_r">
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
	<tr class="tr_l tr_r">
		<td> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline1; ?></td>
	</tr>
	<tr class="tr_l tr_r">
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline2; ?></td>
	</tr>
	<tr class="tr_l tr_r">
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
	<tr class="tr_l tr_r">
		<td> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline1; ?></td>
	</tr>
	<tr class="tr_l tr_r">
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline2; ?></td>
	</tr>
	<tr class="tr_l tr_r">
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline3; ?></td>
	</tr>
	<tr class="tr_l tr_r">
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
	<tr class="tr_l tr_r">
		<td> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline1; ?></td>
	</tr>
	<tr class="tr_l tr_r">
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline2; ?></td>
	</tr>
	<tr class="tr_l tr_r">
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline3; ?></td>
	</tr>
	<tr class="tr_l tr_r">
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline4; ?></td>
	</tr>
	<tr class="tr_l tr_r">
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
	<tr class="tr_l tr_r">
		<td> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline1; ?></td>
	</tr>
	<tr class="tr_l tr_r">
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline2; ?></td>
	</tr>
	<tr class="tr_l tr_r">
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline3; ?></td>
	</tr>
	<tr class="tr_l tr_r">
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline4; ?></td>
	</tr>
	<tr class="tr_l tr_r">
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline5; ?></td>
	</tr>
	<tr class="tr_l tr_r">
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
	<tr class="tr_l tr_r">
		<td> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline1; ?></td>
	</tr>
	<tr class="tr_l tr_r">
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline2; ?></td>
	</tr>
	<tr class="tr_l tr_r">
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline3; ?></td>
	</tr>
	<tr class="tr_l tr_r">
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline4; ?></td>
	</tr>
	<tr class="tr_l tr_r">
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline5; ?></td>
	</tr>
	<tr class="tr_l tr_r">
		<td> </td>
		<td bgcolor="#EDEFF4"> </td>
		<td bgcolor="#EDEFF4" style="padding-left:7;" colspan="2"> <?php echo $cline6; ?></td>
	</tr>
	<tr class="tr_l tr_r">
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
	<tr class="tr_l tr_r">
	<td> </td>
	<td width="4%" style="padding-left:17;" bgcolor="#EDEFF4" rowspan="2">  <img class="img rounded" src="../../cg_users/<?php echo $gender; ?>/<?php echo $user; ?>/Profile/<?php echo $img; ?>" style="height:35; width:35;">    </td>
		<td bgcolor="#EDEFF4" colspan="2" style="padding-top:15;"> 
		<form method="post" name="commenting" onSubmit="return blank_comment_check()"> 
		<input class="form-control" type="text" name="comment_txt" placeholder="Write a comment..." maxlength="420" style="width:440;" id="<?php echo $postid;?>"> 
		<input class="form-control" type="hidden" name="postid" value="<?php echo $postid; ?>"> 
		<input class="form-control" type="hidden" name="userid" value="<?php echo $userid; ?>"> 
		<input class="form-control" type="submit" name="comment" style="display:none;"> 
		</form> </td>
	</tr>
<tr class="tr_l tr_r"><td></td><td></td><td></td><td></td></tr>
<tr class="tr_l tr_r"><td></td><td></td><td></td><td></td></tr>		
	
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
	<div id="footer">
  <footer class="footer">
        <div class="container">
                <div class="col-lg-12">
                    <ul class="list-inline" style="">
                        <li class="list-inline-item">
                            <a href="Home.php">Home</a>
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
                    <h6>Made With Love By You & Manjot Sidhu ...<br>Thanks God , Github , Git , Bootstrap , jquery , Bootsnipp , Stackoverflow , w3schools and much more</h6>
                </div>
        
        </div>
    </footer>
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