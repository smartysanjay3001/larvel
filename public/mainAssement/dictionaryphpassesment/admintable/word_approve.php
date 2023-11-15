<?php



include('../pages/sqlconnect/connect.php');
$edit=$_GET["edit"];

$sql="UPDATE  Dictionary_words  SET status='1'  WHERE word_id='$edit'";




  
  if ($conn->query($sql) === TRUE) {
   
      header('location:./wordtable.php');
  } else {
    echo "Error updating record: " . $conn->error;
    // header('location:./404 file/index.html');
  }



?>