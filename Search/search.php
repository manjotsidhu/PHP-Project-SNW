<?php
include('db.php');
if($_POST)
{
$q=$_POST['search'];
$sql_res=mysql_query("select user_id,Name,Email,Gender from users where Name like '%$q%' or Email like '%$q%' order by Name LIMIT 5");
while($row=mysql_fetch_array($sql_res))
{
$s_username=$row['Name'];
$s_email=$row['Email'];
$b_username='<strong>'.$q.'</strong>';
$b_email='<strong>'.$q.'</strong>';
$final_username = str_ireplace($q, $b_username, $s_username);
$final_email = str_ireplace($q, $b_email, $s_email);
?>
<div class="show" align="left">
<img class= "img rounded" src="../../cg_users/<?php echo $user_gender; ?>/<?php echo $user_Email; ?>/Profile/<?php echo $user_pic; ?>" style="width:50px; height:50px; float:left; margin-right:6px;" /><span class="name"><?php echo ucfirst($final_username); ?></span>&nbsp;<br/><?php echo $final_email; ?><br/><br/>
</div>
<?php
}
}
?>
