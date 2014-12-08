<?php
$username = "root";
$password = "";
$hostname = "localhost"; 

//connection to the database
$dbhandle = mysql_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");
//echo "Connected to MySQL<br>";

//select a database
$selected = mysql_select_db("logistics",$dbhandle) 
  or die("Could not select examples");
$qry_str = "";
if($_POST["report_cat"] != "NONE"){
  if($_POST["report_cat"] == "Once"){
		$qry_str = "and `Date` = '".date("Y-m-d")."'";
	}
}
$qry_str1 = "";
if($_POST["report_type"] != "NONE"){
	$qry_str1 = " `Type` = '".$_POST["report_type"]."'";
}

//execute the SQL query and return result
$result = mysql_query("SELECT * FROM employee_detail where $qry_str1");
//print_r("SELECT * FROM employee_detail where 1 $qry_str $qry_str1");
if (!$result) {
    echo 'Could not run query: ' . mysql_error();
    exit;
}
?>
<table cellpadding="0" cellspacing="1" border="1" width="100%">
<tr>
	<th>Name</th>
	<th>Expense</th>
	<th>Income</th>
	<th>Distance</th>
	<th>Luggage Weight</th>
	<th>Type</th>
	<th>Date</th>
</tr>
<?php
$row = array();
$num_rows = mysql_num_rows($result);
if($num_rows != 0){
//fetch the entire data
while($row = mysql_fetch_assoc($result)){ ?>
   <tr>
	<td><?=$row['Name']?></td>
	<td><?=$row['Expense']?></td>
	<td><?=$row['Income']?></td>
	<td><?=$row['Distance']?></td>
	<td><?=$row['lug_weight']?></td>
	<td><?=$row['Type']?></td>
	<td><?=$row['Date']?></td>
	</tr>
<?php }
}else{ ?>
	<tr>
		<td colspan="7">No Record Found.</td>
	</tr>
<?php
}
?>
</table>
<?php
//close the connection
mysql_close($dbhandle);
?>