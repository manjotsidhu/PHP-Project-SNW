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
		$img=$rec2[2];
?>
<?php 
	$que_v_user_info=mysqli_query($conn ,"select * from users where user_id=$v_user_id");
	$v_user_data=mysqli_fetch_array($que_v_user_info);
	$v_name=$v_user_data[1];
	$v_gender=$v_user_data[4];
	$v_email=$v_user_data[2];
	$v_bday=$v_user_data[5];
	
	$que_view_user_profile_pic=mysqli_query($conn ,"select * from user_profile_pic where user_id=$v_user_id");
	$user_profile_pic_data=mysqli_fetch_array($que_view_user_profile_pic);
	$profile_img=$user_profile_pic_data[2];


	$que_user_cover_pic=mysqli_query($conn ,"select * from user_cover_pic where user_id=$v_user_id");
	$user_cover_pic_data=mysqli_fetch_array($que_user_cover_pic);
	$cover_img=$user_cover_pic_data[2];
	

	$que_post_img=mysqli_query($conn ,"select * from user_post where user_id=$v_user_id and post_pic!='' and priority='Public' order by post_id desc");
	$photos_count=mysql_num_rows($que_post_img);
	$photos_count=$photos_count+2;

?>
<?php
	$job=$user_info_data[1];
	$school_or_collage=$user_info_data[2];
	$city=$user_info_data[3];
	$hometown=$user_info_data[4];
	$user_data_query=mysqli_query($conn ,"select * from users where user_id=$v_user_id");
	$user_data=mysqli_fetch_array($user_data_query);
	$bday=$user_data[5];
	$gender=$user_data[4];
	$Emial_id=$user_data[2];
	$relationship=$user_info_data[5];
	$m_no=$user_info_data[6];
	$web=$user_info_data[8];
	$fb_id=$user_info_data[9];
	
?>
<html>
<head>
<title> <?php echo $v_name; ?> </title>
	<script src="background_file/background_js/event.js"></script>
	<script src="background_file/background_js/searching.js"></script>
	<script src="background_file/background_js/searched_reco_event.js"></script>
<script src="background_file/background_js/profile_pic&cover_pic.js"></script>
	<link href="background_file/background_css/profile.css" rel="stylesheet" type="text/css">
    <link href="../fb_font/font.css" rel="stylesheet" type="text/css">
    <LINK REL="SHORTCUT ICON" HREF="../cg_title_icon/candygram.png?<?php echo time(); ?>" />
</head>
<body id="body">

<!--Head background-->
<script>
	function bcheck()
	{
		s=document.fb_search.search1.value;
		
		if(s=="")
		{
			return false;
		}
		return true;
	}
</script>
</body>
</html>