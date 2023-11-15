<?php



include('../pages/sqlconnect/connect.php');
$edit=$_GET["edit"];

$sql="delete from Dictionary_comment_section WHERE comment_id='$edit'";




  
  if ($conn->query($sql) === TRUE) {
   
      header('location:./comment.php');
  } else {
    echo "Error updating record: " . $conn->error;
    // header('location:./404 file/index.html');
  }



?>