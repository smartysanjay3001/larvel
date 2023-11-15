<?php
include('sqlconnect/connect.php');
// include('username.php');


if(isset($_POST["logout"])){
  header("location:../index.php");
  session_destroy();
}
 
$msg="";
ob_start();

if(isset($_POST['submit'])){

  $text=$_POST['textword'];
  // $sys=$_POST['sys'];
  // $ant=$_POST['ant'];
  $array=array();
$array1=json_encode( $array,true);
  $file_name=$_FILES['file']['name'];
  $tem=$_FILES["file"]["tmp_name"];
  $directory="img";
  
  $sql3= "select * from  Dictionary_words";
  $result= $conn->query($sql3);
  
 if($result->num_rows>=0){
  while($row=$result->fetch_assoc()){
    $wordname=$row['word_name'];
    
  
}
if($wordname==$text){
  $msg= "word alredy exits";
}
 if($wordname!=$text){
 $sql="insert into Dictionary_words(word_name,image,synonyms,antonyms,user_id) values('$text','$file_name','$array1','$array1','{$_SESSION['id']}')";


 if($conn->query($sql)==true){
   move_uploaded_file($tem,$directory."/".$file_name);
  
   $msg="added successfully";
   header('location:user.php');
   
 }
 


}


 }
  
 


}





?>









<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../assets/css/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_css_bootstrap.min.css">
    <!-- <link rel="stylesheet" href="../assets/css/style2.css"> -->
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
<nav class="navbar navbar-expand-lg  navbar-dark" id="navbar">
          <div class="container-fluid  ">
            <a class="navbar-brand text-warning " href="#">  Dictionary</a>
            <button class="navbar-toggler  " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon justify-content-end  "></span>
            </button>
           
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
              <ul class="navbar-nav gap-3 ">
                <li class="nav-item">
               <h3 class="mt-2" > <a  href="" class="   rounded  text-decoration-none text-warning  fw-bolder me-4 text-center " >Welcome <span><?php echo $_SESSION['name']?></span></a></h3>
                </li>
               
                <li class="nav-item">
                <form action="" method="post">
                  <input type="submit" name="logout"  class=" nav-link border px-3 py-2 rounded bg-danger text-decoration-none text-white text-center" value="Logout" >
                  </form>
                </li>
               
             
                

                

              </ul>
</div>
              
          </div>

        
        </nav>











 <section class="fr">
      




  
<div class="container ff sd">
    
   
        <form action="" class="d-flex flex-column align-items-center gap-3 w-100" method="post" enctype="multipart/form-data">

        <h3 class="text-warning mx-auto ">Add Word Here</h3>
        <input type="text" class="fff  py-2 px-3 rounded    w-auto " name="textword" placeholder="enter word" >
        
        <input type="file" class=" ms-5  rounded text-white" name="file">
        <input type="submit" class="bg-success text-white py-1 px-4  rounded mx-auto" value="ADD" name="submit">
        </form>
   

        <h5 class="text-danger  position-absolute bottom-50"><?php echo $msg;?></h5>
      

</div>
    



        

<div class="dfd    ">
  <a class=" text-white text-decoration-none bg-danger text-white py-3
  px-5 rounded mx-auto mt-5 ms-5" href="./user.php">Back</a>
</div>

    

    </section>

    <script src="../assets/js/script.js"></script>

    <script src="../assets/js/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_js_bootstrap.bundle.min.js"></script>
</body>

</html>