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
  // die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";

// $sql = "CREATE DATABASE users";
// if ($conn->query($sql) === TRUE) {
//   echo "Database created successfully";
// } else {
//   echo "Error creating database: " . $conn->error;
// }



// $sql = "CREATE TABLE register_details(
//         id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//        name VARCHAR(30) NOT NULL,
//         email VARCHAR(50),
//        password VARCHAR(30) NOT NULL,
//        confirmpassword VARCHAR(30) NOT NULL
    
       
//          )";
        
//         if ($conn->query($sql) === TRUE) {
//           echo "Table MyGuests created successfully";
//         } else {
//           echo "Error creating table: " . $conn->error;
//         }
    
    
?>