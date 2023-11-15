<?php



include('../pages/sqlconnect/connect.php');
$edit=$_GET["edit"];

$sql3="select * from Dictionary_words WHERE word_id='$edit'";

$result=$conn->query($sql3);
if($result->num_rows>0){

$row=$result->fetch_assoc();
 $img=$row['image'];

 $file="../pages/img/$img";
  unlink($file);

}




$sql="delete from Dictionary_words WHERE word_id='$edit'";
$sql2="delete from Dictionary_comment_section WHERE word_id='$edit'";



 

  
  if ($conn->query($sql) === TRUE) {
   
      header('location:./wordtable.php');
    
  } else {
    echo "Error updating record: " . $conn->error;
    // header('location:./404 file/index.html');
  }


  if ($conn->query($sql2) === TRUE) {

  }
else {
    echo "Error updating record: " . $conn->error;
    // header('location:./404 file/index.html');
  }


?>