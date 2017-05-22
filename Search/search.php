<?php
include('db.php');
if($_POST)
{
$q=$_POST['search'];
$sql_res=mysql_query("select user_id,Name,Email from users where Name like '%$q%' or Email like '%$q%' order by Name LIMIT 5");
while($row=mysql_fetch_array($sql_res))
{
$username=$row['Name'];
$email=$row['Email'];
$b_username='<strong>'.$q.'</strong>';
$b_email='<strong>'.$q.'</strong>';
$final_username = str_ireplace($q, $b_username, $username);
$final_email = str_ireplace($q, $b_email, $email);
?>
<div class="show" align="left">
<img class= "img rounded" src="" style="width:50px; height:50px; float:left; margin-right:6px;" /><span class="name"><?php echo ucfirst($final_username); ?></span>&nbsp;<br/><?php echo $final_email; ?><br/><br/>
</div>
<?php
}
}
?>
