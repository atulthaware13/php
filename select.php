<select name="emp">
<option value="">select employee</option>
<?php
require_once"db_connect.php";
$sql_qry="select *from user_tbl";
$employees=mysql_query($sql_qry);
while($row=mysql_fetch_assoc($employees))
{
?>
<option value="<?php echo $row['emp_id'];?>">
<?php echo ucfirst($row['emp_name']);?>
</option>
<?php
}
?>
</select>