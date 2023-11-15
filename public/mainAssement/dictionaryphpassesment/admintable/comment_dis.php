<?php



include('../pages/sqlconnect/connect.php');
$edit=$_GET["edit"];

$sql="UPDATE  Dictionary_comment_section  SET status='0'  WHERE comment_id='$edit'";




  
  if ($conn->query($sql) === TRUE) {
    header('location:./comment.php');
      // header('location:./wordtable.php');
  } else {
    echo "Error updating record: " . $conn->error;
    // header('location:./404 file/index.html');
  }



?>