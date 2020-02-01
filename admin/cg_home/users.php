<?php
	session_start();
	error_reporting(1);
	if(isset($_SESSION['fbadmin']))
	{
		$conn = mysqli_connect("localhost","root","", "connection");
?>
<?php
	if(isset($_POST['mdelete']))
	{
		$dm_id=intval($_POST['user_male_id']);
		mysqli_query($conn ,"delete from users where user_id=$dm_id");
	}
	if(isset($_POST['fdelete']))
	{
		$df_id=intval($_POST['user_female_id']);
		mysqli_query($conn ,"delete from users where user_id=$df_id");
	}
?>
<?php
	include("background.php");
?>
<html>
<head>
	<title>Users</title>
	<script>
		function user_name_underLine(uid)
		{
			document.getElementById("uname"+uid).style.textDecoration = "underline";
		}
		function user_name_NounderLine(uid)
		{
			document.getElementById("uname"+uid).style.textDecoration = "none"
		}
	</script>
</head>
<body>
<?php
	$all_users_que=mysqli_query($conn ,"select * from users");
	$all_count=mysqli_num_rows($all_users_que);
?>

	<div style="position:absolute; left:27%; top:10%;"> <img src="img/all_users.png" height="100" width="100"> </div>
	<div style="position:absolute; left:35%; top:12%;"> <h1 style="color:#3B59A4;"> All Users(<span style="color:#999;"><?php echo $all_count; ?></span>) </h1> </div>
    <hr style="position:absolute;left:25%;top:25%;height:0.5%;width:50%; border-color:#CCCCCC; box-shadow:0px 5px 5px 0px rgb(0,0,0); ">
    
<?php
	$all_male_que=mysqli_query($conn ,"select * from users where Gender='Male' order by user_id desc");
	$all_male_count=mysqli_num_rows($all_male_que);
?>
    <div style="position:absolute; left:26%; top:42%;"> <img src="img/male.png" height="60" width="60">  </div>
    <div style="position:absolute; left:30.5%; top:42%;"> <h2> Male(<span style="color:#999;"><?php echo $all_male_count; ?></span>) </h2> </div>
    <div style="position:absolute; left:19%; top:55%;">
    <table border="1">
    <tr>
    	<th> User ID</th>
        <th> Name </th>
        <th> Fb join Date</th>
        <th> Delete </th>
    </tr>
<?php
	while($male_info=mysqli_fetch_array($all_male_que))
	{
?>
    	<tr>
        	<td> <?php echo $male_info[0]; ?> </td>
        	<td> <a href="../cg_view_profile/view_profile.php?id=<?php echo $male_info[0]; ?>" style="text-transform:capitalize; color:#3B59A4; text-decoration:none;" onMouseOver="user_name_underLine(<?php echo $male_info[0]; ?>)" onMouseOut="user_name_NounderLine(<?php echo $male_info[0]; ?>)" id="uname<?php echo $male_info[0]; ?>"> <?php echo $male_info[1]; ?> </a> </td>
            <td> <?php echo $male_info[6]; ?> </td>
            <td style="padding-left:13; padding-top:8;"> <form method="post"> 
            	<input type="hidden" name="user_male_id" value="<?php echo $male_info[0]; ?>"> 
            	<input type="submit" name="mdelete" value="" style="background-image:url(img/delete_post.gif); background-color:#FFF; border:none; width:16"> 
                 </form> 
            </td>
        </tr>
<?php
	}
?>
   	</table>
    </div>
    
    
    
    
    
<?php
	$all_female_que=mysqli_query($conn ,"select * from users where Gender='Female' order by user_id desc");
	$all_female_count=mysqli_num_rows($all_female_que);
?>
    <div style="position:absolute; left:58%; top:42%;"> <img src="img/female.png" height="60" width="60">  </div>
    <div style="position:absolute; left:63%; top:42%;"> <h2> Female(<span style="color:#999;"><?php echo $all_female_count; ?></span>) </h2> </div>
    <div style="position:absolute; left:53%; top:55%;">
    <table border="1">
    <tr>
    	<th> User ID</th>
        <th> Name </th>
        <th> Fb join Date</th>
        <th> Delete </th>
    </tr>
<?php
	while($female_info=mysqli_fetch_array($all_female_que))
	{
?>
    	<tr>
        	<td> <?php echo $female_info[0]; ?> </td>
        	<td> <a href="../cg_view_profile/view_profile.php?id=<?php echo $female_info[0]; ?>" style="text-transform:capitalize; color:#3B59A4; text-decoration:none;" onMouseOver="user_name_underLine(<?php echo $female_info[0]; ?>)" onMouseOut="user_name_NounderLine(<?php echo $female_info[0]; ?>)" id="uname<?php echo $female_info[0]; ?>"> <?php echo $female_info[1]; ?> </a> </td>
            <td> <?php echo $female_info[6]; ?> </td>
            <td style="padding-left:13; padding-top:8;"> <form method="post"> 
            	 <input type="hidden" name="user_female_id" value="<?php echo $female_info[0]; ?>">
            	 <input type="submit" name="fdelete" value="" style="background-image:url(img/delete_post.gif); background-color:#FFF; border:none; width:16"> 
                 </form> 
            </td>
        </tr>
<?php
	}
?>
   	</table>
    </div>
<div style="position:absolute; left:90%; top:100%;" > &nbsp; </div>	
</body>
</html>
<?php
	}
	else
	{
		header("location:../../index.php");
	}
?>