<?php
extract($_POST);
if(isset($search))
{
require_once "db_connect.php";
$sql_search="select emp_name from user_tbl where emp_name like '$searchstr%'";
$res=mysql_query($sql_search);
$count=mysql_num_rows($res);
if($count>0)
{
while($row=mysql_fetch_assoc($res))
{
echo $row['emp_name'];
echo"<br/>";
}
}
else
echo"No record found in db";
}
?>