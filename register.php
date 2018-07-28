<?php
extract($_POST);
//echo $email;
//exit;
require_once"db_connect.php";
if(isset($register))
{
$conn=mysql_connect("localhost","root","");
if($conn)
{
//mysql_select_db("prac_interview");
/*checking for email validation*/
$sql_chk="select emp_email from user_tbl where emp_email='$email'";
$resultset=mysql_query($sql_chk);
$count=mysql_num_rows($resultset);
if($count>0)
{
echo"Email Already Exits";
}
 else
{
	if(isset($_FILES['image']))
	{
		$file_tmp=$_FILES['image']['tmp_name'];
		$file_name=$_FILES['image']['name'];
		//echo $file_name;
		//exit;
		$file_size=$_FILES['image']['size'];
		$ext=strtolower(end(explode(".",$file_name)));
		$allowed_types=array('jpg','jpeg','gif','png');
		if(!in_array($ext,$allowed_types))
		$err_msg="Invalid file";
		if($file_size>2097152)
		$err_msg="file size less than 2mb";
	    if(empty($err_msg))
		{	
			move_uploaded_file($file_tmp,"upload/".$file_name);
			$sql_qry="insert into user_tbl(emp_name,emp_email,emp_mobile,emp_password,profile_pick)
			values('$name','$email','$mobile','$password','$file_name')";

			$res=mysql_query($sql_qry);
			if($res)
				echo"inserted";
			else
				echo "not inserted";
		}
			else
			echo $err_msg;	
		}
      }
	}
	

}


?>