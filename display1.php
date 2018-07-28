<?php
extract($_POST);
require_once"db_connect.php";
if(isset($string))
{

$query="select * from user_tbl where emp_name like '$searchstr%'";
//$search_result=mysql_query($query);
$search_result = filterTable($query);

}
else
{

$query="select * from user_tbl";
//$search_result=mysql_query($query);
$search_result = filterTable($query);

}

function filterTable($query)
{
require_once"db_connect.php";
$filter_Result = mysql_query($query);
return $filter_Result;
	
}
?>
<!DOCTYPE html>
<html>
<head>
<title>
<h1>Display db records</h1>
</title>
</head>
<body>
<div>
<form method="post" action="">
<input type="text" placeholder="search by name" name="searchstr"/>
<input type="submit" value="search" name="string"/>
</form>
</div>

<table border="1px">
<thead>
 <tr>
  <th>emp_id</th>
  <th>emp_name</th>
  <th>emp_mobile</th>
  <th>emp_email</th>
  <th>emp_password</th>
  <th>profile_pick</th>
  <th colspan="2">action</th>
 </tr>
  </thead>


<tbody>
       <?php
	  $i=1;  
	  while($row=mysql_fetch_array($search_result)):
	  ?>
	 
	<tr> 
	  <td><?php echo $i;?></td>
	 <!-- <td><?php echo $row['$emp_id'];?></td> -->
 	   <td><?php echo ucfirst($row['emp_name']);?></td>
	  <td><?php echo $row['emp_mobile'];?></td>
	  <td><?php echo $row['emp_email'];?></td>
	  <td><?php echo $row['emp_password'];?></td>
      <td><img src="upload/<?php echo $row['profile_pick']; ?>" width=40 height=40 /></td>
	  <td>
	  <a href="delete.php? user_id=<?php echo($row['emp_id']);?>">delete</a>
	  <a href="update.php? user_id=<?php echo($row['emp_id']);?>">update</a>
	  </td>
	  </tr>
	  <?php $i++;
	  endwhile ?>
</tbody>
	  
</table>
</body>
</html>