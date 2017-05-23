<?php
include('db.php');
if($_POST)
{
$q=$_POST['search'];
$mysql = mysql_query("SELECT users.user_id , users.Name , users.Email , users.Gender , user_profile_pic.image FROM users INNER JOIN user_profile_pic ON users.user_id=user_profile_pic.user_id");
while($row=mysql_fetch_array($mysql))
{
$s_username=$row['Name'];
$s_email=$row['Email'];
$b_username='<strong>'.$q.'</strong>';
$b_email='<strong>'.$q.'</strong>';
$final_username = str_ireplace($q, $b_username, $s_username);
$final_email = str_ireplace($q, $b_email, $s_email);
$s_gender = $row['Gender'];
$s_img = $row['image'];
?>
<div class="show showss" align="left">
<img class= "img rounded" src="../../cg_users/<?php echo $s_gender; ?>/<?php echo $s_email; ?>/Profile/<?php echo $s_img; ?>" style="width:50px; height:50px; float:left; margin-right:6px;" /><span class="name"><?php echo ucfirst($final_username); ?></span>&nbsp;<br/><?php echo $final_email; ?><br/><br/>
</div>
<?php
}
}
?>
