<?php
$connection = mysql_connect('localhost','root','') or die(mysql_error());
$database = mysql_select_db('candygram') or die(mysql_error());

$myql = mysqli_query($conn ,"SELECT users.user_id , users.Name , users.Email , users.Gender , user_profile_pic.image FROM users INNER JOIN user_profile_pic ON users.user_id=user_profile_pic.user_id");
while($row=mysql_fetch_array($myql)) {
echo $row['user_id'].'<br>';
echo $row['Name'].'<br>';
echo $row['Email'].'<br>';
echo $row['Gender'].'<br>';
echo $row['image'].'<br>';
}
?>
