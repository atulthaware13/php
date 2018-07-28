<?php
if(isset($_FILES['image']))
	{
		$file_tmp=$_FILES['image']['tmp_name'];
		$file_name=$_FILES['image']['name'];
		$file_size=$_FILES['image']['size'];
		$ext=strtolower(end(explode(".",$file_name)));
		$allowed_types=array('jpg','jpeg','gif','png');
		if(!in_array($ext,$allowed_types))
		$err_msg="Invalid file";
		if($file_size > 2097152)
		$err_msg="file size less than 2mb"; 
	    if(empty($err_msg))
		{
			move_uploaded_file($file_tmp,"upload/".$file_name);
			require_once"db_connect.php";
			$sql_ins="insert into user_tbl(profile_pick) values('$file_name')";
			$res=mysql_query($sql_ins);
			if($res)
				echo"inserted";
			else
				echo "not inserted";
		}
			else{
				echo $err_msg;
			}
		}
	
?>