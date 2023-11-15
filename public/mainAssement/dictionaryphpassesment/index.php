<?php
include('./pages/sqlconnect/connect.php');

$_SESSION['reg_url']=$_SERVER["REQUEST_URI"];
$_SESSION['entry_url']=$_SERVER["REQUEST_URI"];

if(isset($_SESSION["name"])){
  header("location:./pages/user.php");
}
else{
  // header("location:index.php");
}
ob_start();

$msg="";
if(isset($_GET['submit'])){
  $find=$_GET['search'];

  $sql="SELECT * FROM Dictionary_words where status='1' and word_name='$find'";

  $result= $conn->query($sql);
  if ($result->num_rows>0) { 

while($row=$result->fetch_assoc()){
 
  $wordname=$row['word_name'];
  $status=$row['status'];
  $_SESSION['wordname']=$wordname;
 

    }
  }

  if($_SESSION['wordname']==$find && $status==0 ){
    // header('loacation:')
    $msg= 'this word not exits my library';

  }
 else if($wordname==$find && $status==1){
  // header("location:main.php?search5=$find");
    header("location:pages/$find");

  }
  else{
    header('location:pages/404/index.php');
    $msg= 'this word not exits my library';
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

    <link rel="stylesheet" href="./assets/css/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_css_bootstrap.min.css">
    
    <!-- <link rel="stylesheet" href="./assets/css/style2.css"> -->
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>

<!-- nav bar -->
<nav class="navbar navbar-expand-lg  navbar-dark" id="navbar">
          <div class="container-fluid  ">
            <a class="navbar-brand text-warning " href="#">  Dictionary</a>
            <button class="navbar-toggler  " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon justify-content-end  "></span>
            </button>
           
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
              <ul class="navbar-nav gap-3 ">
                <li class="nav-item">
                <a  href="pages/login.php" class=" nav-link border px-3 py-2 rounded bg-success text-decoration-none text-white text-center">Login</a>
                </li>
                <li class="nav-item">
                <a  href="pages/signup.php" class=" nav-link border px-3 py-2 rounded bg-danger text-decoration-none text-white text-center">Register</a>
                </li>
               
             
                

                

              </ul>
           
              
          </div>

        
        </nav> 
          <!-- nav bar end -->

          <section>

    
<div class="area" >
            <ul class="circles">
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
            </ul>
    </div >



  
<div class="container ff z-2">
     
    <form action="" class=" d-flex flex-column align-items-center gap-3 w-100 " method="get">
      

        <h3 class="text-warning mx-auto ">Search Word Here</h3>
        <input type="search" class=" py-2 px-4 rounded " name="search">
        <input type="submit" name="submit" class="bg-success text-white py-2 px-4  rounded mx-auto text-center" value="search" >
    </form>
    <h4 class="text-center text-danger mt-4 text-uppercase"><?php echo $msg?></h4>

</div>
        

 
    </section>


    <script src="./assets/js/script.js"></script>
    <script src="./assets/js/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_js_bootstrap.bundle.min.js"></script>
</body>

</html>