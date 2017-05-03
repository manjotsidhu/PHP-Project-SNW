<?php
error_reporting(1);
		$user=$_SESSION['fbuser'];
		mysql_connect("localhost","root","");
		mysql_select_db("faceback");
		$query1=mysql_query("select * from users where Email='$user'");
		$rec1=mysql_fetch_array($query1);
		$userid=$rec1[0];
		$query2=mysql_query("select * from user_profile_pic where user_id=$userid");
		$rec2=mysql_fetch_array($query2);
		
		$name=$rec1[1];
		$gender=$rec1[4];
		$user_bday=$rec1[5];
		$img=$rec2[2];
?>
<?php
if(isset($_POST['file']) && ($_POST['file']=='Upload'))
{
		if($gender=="Male")
		{
			$path = "../../fb_users/Male/".$user."/Profile/";
		}
		else
		{
			$path = "../../fb_users/Female/".$user."/Profile/";
		}
		
		$img_name=$_FILES['file']['name'];
    	$img_tmp_name=$_FILES['file']['tmp_name'];
    	$prod_img_path=$img_name;
		if($gender=="Male")
		{
			move_uploaded_file($img_tmp_name,"../../fb_users/Male/".$user."/Profile/".$prod_img_path);
		}
		else
		{
			move_uploaded_file($img_tmp_name,"../../fb_users/Female/".$user."/Profile/".$prod_img_path);
		}
    	mysql_query("update user_profile_pic set image='$img_name' where user_id=$userid;");
		header("location:Profile.php");
}

if(isset($_POST['file1']) && ($_POST['file1']=='Upload'))
{
		if($gender=="Male")
		{
			$path = "../../fb_users/Male/".$user."/Cover/";
		}
		else
		{
			$path = "../../fb_users/Female/".$user."/Cover/";
		}
		
		$img_name=$_FILES['file1']['name'];
    	$img_tmp_name=$_FILES['file1']['tmp_name'];
    	$prod_img_path=$img_name;
		if($gender=="Male")
		{
			move_uploaded_file($img_tmp_name,"../../fb_users/Male/".$user."/Cover/".$prod_img_path);
		}
		else
		{
			move_uploaded_file($img_tmp_name,"../../fb_users/Female/".$user."/Cover/".$prod_img_path);
		}
    	mysql_query("insert into user_cover_pic(user_id,image) values('$userid','$img_name');");
		header("location:Profile.php");
}

if(isset($_POST['file2']) && ($_POST['file2']=='Upload'))
{
		if($gender=="Male")
		{
			$path = "../../fb_users/Male/".$user."/Cover/";
		}
		else
		{
			$path = "../../fb_users/Female/".$user."/Cover/";
		}
		
		$img_name=$_FILES['file2']['name'];
    	$img_tmp_name=$_FILES['file2']['tmp_name'];
    	$prod_img_path=$img_name;
		if($gender=="Male")
		{
			move_uploaded_file($img_tmp_name,"../../fb_users/Male/".$user."/Cover/".$prod_img_path);
		}
		else
		{
			move_uploaded_file($img_tmp_name,"../../fb_users/Female/".$user."/Cover/".$prod_img_path);
		}
		mysql_query("update user_cover_pic set image='$img_name' where user_id=$userid;");
		header("location:Profile.php");
}
?>
<html>
<head>
	<link href="background_file/background_css/profile.css" rel="stylesheet" type="text/css">
    <link href="../fb_font/font.css" rel="stylesheet" type="text/css">
    <LINK REL="SHORTCUT ICON" HREF="../fb_title_icon/Faceback.ico" />
    <script src="background_file/background_js/event.js"></script>
	<script src="background_file/background_js/searching.js"></script>
	<script src="background_file/background_js/searched_reco_event.js"></script>
<script src="background_file/background_js/profile_pic&cover_pic.js"></script>
</head>
<body id="body">
<!--cover img-->
<?php 
	$query3=mysql_query("select * from user_cover_pic where user_id=$userid");
	$rec3=mysql_fetch_array($query3);
	$cover_img=$rec3[2];
	
	$que_post_bg=mysql_query("select * from user_post where user_id=$userid");
	$count_bg=mysql_num_rows($que_post_bg);
	$count_bg=$count_bg+1;
?>

<?php
	include("background_file/background_error/background_error.php");
?>
</body>
</html>