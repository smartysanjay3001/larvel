<?php
include('sqlconnect/connect.php');
// include('username.php');

$ses=$_SESSION['search11'];
if(isset($_POST["logout"])){
  header("location:../index.php");
  session_destroy();
}
if(isset($_POST["back"])){
  ob_start();
      header("location:./$ses");
      ob_flush();

}

// $searchedWord = explode(".", basename($_SERVER['REQUEST_URI']))[0];
 $msg="";
if(isset($_POST['submit'])){

  $antonyms=$_POST['ant'];
 $wordid= $_SESSION['wordid'];

  $sql="select antonyms from Dictionary_words where word_id='$wordid'";

  $result=$conn->query($sql);
  if($result->num_rows >0){
    while($row=$result->fetch_assoc()){
      $array_sys=json_decode($row['antonyms'],true);

    }

    array_push($array_sys,$antonyms);
    $sys_array=json_encode($array_sys,true);
    $sql1="update Dictionary_words set  antonyms='$sys_array' where word_id='$wordid'";

    if($conn->query($sql1)===true){
      $msg="Inserted successfully";
      ob_start();
      header("location:./$ses");
      ob_flush();
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
               <h3 class="mt-2" > <a  href="" class="   rounded  text-decoration-none text-warning  fw-bolder me-4 text-center " >Welcome <span><?php echo $_SESSION['name'];?></span></a></h3>
                </li>
               
                <li class="nav-item">
                <form action="" method="post">
                  <input type="submit" name="logout"  class=" nav-link border px-3 py-2 rounded bg-danger text-decoration-none text-white text-center" value="Logout" >
                  </form>
                </li>
               
                <li class="nav-item">
                <form action="" method="post">
                  <input type="submit" name="back"  class=" nav-link border border-danger mt-2 px-3 py-2 rounded bg-danger text-decoration-none text-white text-center" value="BACK" >
                  </form>

               
                </li>
               
             
                

                

              </ul>
</div>
              
          </div>

        
        </nav>











 <section class="fr">
      




  
<div class="container ff sd">
    
   
        <form action="" class="d-flex flex-column align-items-center gap-3 w-100" method="post" enctype="multipart/form-data">

        <h3 class="text-warning mx-auto ">Add Antonyms Here</h3>
        <input type="text" class="fff  py-2 px-3 rounded    w-auto " name="ant" >
        <input type="file" class=" ms-5  rounded text-white" name="file">
        <input type="submit" class="bg-success text-white py-1 px-4  rounded mx-auto" value="ADD" name="submit">
        </form>
   

        <h4 class="text-danger  position-absolute bottom-50"><?php echo $msg;?></h4>
      

</div>
    



        

<

    

    </section>

    <script src="../assets/js/script.js"></script>

    <script src="../assets/js/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_js_bootstrap.bundle.min.js"></script>
</body>

</html>