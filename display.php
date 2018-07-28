<?php
extract($_POST);
if(isset($string))
{
	    //require_once"db_connect.php";
       //$searchstr = $_POST['searchstr'];
      // search in all table columns
     // using concat mysql function
    $searchstr=explode("|", "$searchstr");
    $fl=$searchstr[0];
    $ls=$searchstr[1];
    $query = "select * from user_tbl where emp_name like '$fl%' and emp_email like '$ls%'";
    //$query="select * from user_tbl where emp_name like '$searchstr%'";
    $search_result = filterTable($query);
}
 else {
    $query = "SELECT * FROM user_tbl";
    $search_result = filterTable($query);
}


// function to connect and execute the query
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
<title>Display Records</title>
</head>
<body>
  <h1>Display DB Records!</h1>
  <div>
    <form method="post" action="">
    Search By Name:<input type="text" placeholder="Search By Name" name="searchstr">
    <input type="submit" name="string" value="Search!">
    </form>
</div><br><br>

  <table border="1px">
    <thead>
      <tr>
        <th>emp_id</th>
        <th>emp_name</th>
		<th>emp_mobile</th>
        <th>emp_email</th>
		<th>emp_password</th>
        <th>Profile Pick</th>
        <th colspan="2">Action</th>
      </tr>     
    </thead>
    <tbody>
      
                  <?php 
				  $i=1;
				  while($row= mysql_fetch_array($search_result)):?>
                  <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo ucfirst($row['emp_name']);?></td>
					<td><?php echo $row['emp_mobile'];?></td>
                    <td><?php echo $row['emp_email'];?></td>
                    <td><?php echo $row['emp_password'];?></td>
                    <td><img src="upload/<?php echo $row['profile_pick']; ?>" width=50 height=50/></td>
                    <td>
                      <a href="delete.php?user_id=<?php echo base64_encode($row['emp_id']);?>" onclick="return window.confirm('Are you sure to Delete');">Delete</a>
                      <a href="update.php?user_id=<?php echo base64_encode($row['emp_id']);?>">Update</a>
                    </td>
                  </tr>
                       <?php  $i++;
					   endwhile;?>
                
    </tbody>
    
  </table>

</body>
</html>