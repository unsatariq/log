<?php
 $Driver_ID= $_POST['ID'];
 $StartTime= $_POST['st']=time();
 $expense_amt=$_POST['ea'];
 $commodity_name= $_POST['commodityname']; 
 $commodity_weight= $_POST['commodityweight']; 

 $Destination=$_POST['destination']; 
 $expense_type=$_POST['ety'];
 $EndTime=time();
/*  $Latitude=$_POST['lat'];
 $Longitude=$_POST['lon']; */
 
 $servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydbpdo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO Trips (Driver_ID, commodity_name, commodity_weight,Destination,start_time,longitude,latitude,expense_amt,expense_type,end_time)
VALUES ('$Driver_ID', '$commodity_name', '$commodity_weight','$Destination','$StartTime','','','$expense_amt','$expense_type','$EndTime')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
