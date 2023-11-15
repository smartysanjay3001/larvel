<?php
$servername = "192.168.7.254";
$username = "sanjay_juntrdev_usr";
$password = "l4u58rHjnyCZh6d3";
$dbname="sanjay_juntrdev_db";
$port=42209;


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname,$port);

// Check connection
if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
}


// sql to delete a record
$del=$_GET['del'];
$sql = "DELETE FROM crud_students WHERE id='$del'";
// $result=mysqli_query($conn,$sql);

if ($conn->query($sql) === TRUE) {
    header('location:../index.php');
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>