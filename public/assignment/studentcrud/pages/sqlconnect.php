<?php
session_start();
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
// echo "Connected successfully";



// sql to create table
// $sql = "CREATE TABLE students (
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     firstname VARCHAR(80) NOT NULL,
//     lastname VARCHAR(80) NOT NULL,
//     age INT(6),
//     email VARCHAR(80)
   
//     )";
    
    // if ($conn->query($sql) === TRUE) {
    //   echo "Table MyGuests created successfully";
    // } else {
    //   echo "Error creating table: " . $conn->error;
    // }



    if($_POST["submit"]){
        
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $age=$_POST['age'];
    $email=$_POST['email'];

  $sql="INSERT INTO crud_students(firstname,lastname,age,email)
  VALUES('$firstname','$lastname','$age','$email')";


if (mysqli_query($conn, $sql)) {
    header('location:../index.php');
  } else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}

else{

}
?>


