<?php
error_reporting(1);
		$user=$_SESSION['fbuser'];
		mysql_connect("localhost","root","");
		mysql_select_db("candygram");
		$query1=mysqli_query($conn ,"select * from users where Email='$user'");
		$rec1=mysqli_fetch_array($query1);
		$userid=$rec1[0];
		$query2=mysqli_query($conn ,"select * from user_profile_pic where user_id=$userid");
		$rec2=mysqli_fetch_array($query2);
		
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
			$path = "../../cg_users/Male/".$user."/Profile/";
		}
		else
		{
			$path = "../../cg_users/Female/".$user."/Profile/";
		}
		
		$img_name=$_FILES['file']['name'];
    	$img_tmp_name=$_FILES['file']['tmp_name'];
    	$prod_img_path=$img_name;
		if($gender=="Male")
		{
			move_uploaded_file($img_tmp_name,"../../cg_users/Male/".$user."/Profile/".$prod_img_path);
		}
		else
		{
			move_uploaded_file($img_tmp_name,"../../cg_users/Female/".$user."/Profile/".$prod_img_path);
		}
    	mysqli_query($conn ,"update user_profile_pic set image='$img_name' where user_id=$userid;");
		header("location:Profile.php");
}

if(isset($_POST['file1']) && ($_POST['file1']=='Upload'))
{
		if($gender=="Male")
		{
			$path = "../../cg_users/Male/".$user."/Cover/";
		}
		else
		{
			$path = "../../cg_users/Female/".$user."/Cover/";
		}
		
		$img_name=$_FILES['file1']['name'];
    	$img_tmp_name=$_FILES['file1']['tmp_name'];
    	$prod_img_path=$img_name;
		if($gender=="Male")
		{
			move_uploaded_file($img_tmp_name,"../../cg_users/Male/".$user."/Cover/".$prod_img_path);
		}
		else
		{
			move_uploaded_file($img_tmp_name,"../../cg_users/Female/".$user."/Cover/".$prod_img_path);
		}
    	mysqli_query($conn ,"insert into user_cover_pic(user_id,image) values('$userid','$img_name');");
		header("location:Profile.php");
}

if(isset($_POST['file2']) && ($_POST['file2']=='Upload'))
{
		if($gender=="Male")
		{
			$path = "../../cg_users/Male/".$user."/Cover/";
		}
		else
		{
			$path = "../../cg_users/Female/".$user."/Cover/";
		}
		
		$img_name=$_FILES['file2']['name'];
    	$img_tmp_name=$_FILES['file2']['tmp_name'];
    	$prod_img_path=$img_name;
		if($gender=="Male")
		{
			move_uploaded_file($img_tmp_name,"../../cg_users/Male/".$user."/Cover/".$prod_img_path);
		}
		else
		{
			move_uploaded_file($img_tmp_name,"../../cg_users/Female/".$user."/Cover/".$prod_img_path);
		}
		mysqli_query($conn ,"update user_cover_pic set image='$img_name' where user_id=$userid;");
		header("location:Profile.php");
}
?>
<html>
<head>
	<link href="background_file/background_css/profile.css" rel="stylesheet" type="text/css">
    <link href="../fb_font/font.css" rel="stylesheet" type="text/css">
    <LINK REL="SHORTCUT ICON" HREF="../cg_title_icon/candygram.png?<?php echo time(); ?>" />
    <script src="background_file/background_js/event.js"></script>
	<script src="background_file/background_js/searching.js"></script>
	<script src="background_file/background_js/searched_reco_event.js"></script>
<script src="background_file/background_js/profile_pic&cover_pic.js"></script>
</head>
<body id="body">
<!--cover img-->
<?php 
	$query3=mysqli_query($conn ,"select * from user_cover_pic where user_id=$userid");
	$rec3=mysqli_fetch_array($query3);
	$cover_img=$rec3[2];
	
	$que_post_bg=mysqli_query($conn ,"select * from user_post where user_id=$userid");
	$count_bg=mysql_num_rows($que_post_bg);
	$count_bg=$count_bg+1;
?>

<?php
	include("background_file/background_error/background_error.php");
?>
</body>
</html>