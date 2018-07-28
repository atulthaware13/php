<?php
extract($_POST);
if(isset($login))
{
require_once"db_connect.php";
$sql_chk="select*from user_tbl where email='$email' and password='$password'";
$res=mysql_query($sql_chk);
$login_count=mysql_num_rows($res);
if($login_count=1)
{
$row=mysql_fetch_assoc($res);
session_start();
$session['emp_id']=$row['emp_id'];
$session['name']=$row['emp_name'];
header('location:display.php');

}
else
echo"login failed";
}
?>
<form method="POST" action="">
email:<input type="text" name="email"><br/><br/>
password:<input type="password" name="password"><br/><br/>
<input type="submit" name="login" value="login">
</form>