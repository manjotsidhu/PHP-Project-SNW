<?php
	session_start();
	error_reporting(1);
	$user=$_SESSION['fbuser'];
	mysql_connect("sql209.rf.gd","rfgd_20139087","R8qN11KQ");
	mysql_select_db("rfgd_20139087_cg");
	$query1=mysql_query("select * from users where Email='$user'");
	$rec1=mysql_fetch_array($query1);
	$userid=$rec1[0];
	mysql_query("update user_status set status='Offline' where user_id='$userid'");
	unset($_SESSION['fbuser']);
	//session_destroy();
	header("location:../../index.php");
?>