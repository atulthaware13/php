
<?php
extract($_POST);
$uid=$_GET['user_id'];
//echo $uid;
require_once"db_connect.php";
if(isset($update))
{
$update_qry="update user_tbl set emp_name='$emp_name',emp_email='$emp_email',emp_mobile='$emp_mobile',profile_pick='$profile_pick' where emp_id=$uid";
$result=mysql_query($update_qry);
if($result)
header('location:display.php');
else
echo"Not updated";
}

//getting existion info 
$sql_get="select * from user_tbl where emp_id='$uid'";
$res=mysql_query($sql_get);
$row=mysql_fetch_assoc($res);
?>
<form method="POST" action="">
Name:<input type="text" name="name" value="<?php echo $row['emp_name'];?>"/><br/><br/>
email:<input type="text" name="email" value="<?php echo $row['emp_email'];?>"/><br/><br/>
Mobile:<input type="text" name="mobile" value="<?php echo $row['emp_mobile'];?>"/>
<input type="submit" name="update" value="update"/> 
</form>