<?php
$uid=$_GET['user_id'];
//echo $user_id;
//exit;
require_once"db_connect.php";
$sql_del="delete from user_tbl where emp_id='$uid'";
$res=mysql_query($sql_del);
if($res)
header("location:display.php");
else
echo"Not deleted";
?>