<?php

include('./sqlconnect/connect.php');
if(isset($_SESSION['name'])){

}
else{
  header("location:../index.php");
}

$msg='';
if(isset($_POST["logout"])){
  header("location:../index.php");
  session_destroy();
}


if(isset($_POST['submit'])){
  $find=$_POST['search5'];
  $search=str_replace(' ','', $find);
   $sql="select * from Dictionary_words where word_name='$search' and (user_id='{$_SESSION['id']}' or status='1')";
   
   $result=$conn->query($sql);
   //  print_r($result);
   if($result->num_rows>0){
     while($row=$result->fetch_assoc()){
       $wordname=$row["word_name"];
       
       $_SESSION['wordname']=$wordname;
       $wordid=$row['word_id'];
       $_SESSION['wordid']=$wordid;
       
      }
      
    }
    if($wordname==$find){
     ob_start();
     header("location:./$search");
     ob_flush();
    
  }
  else{
    header('location:404/index.php');
  }

  

}

 



  // if($_SESSION['wordname']==$find){
  //   header('location:userview.php');
  // }
  // else{
  //   $msg= 'this word not exits my library';
  // }



?>









<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../assets/css/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_css_bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style2.css">
    <link rel="stylesheet" href="../assets/css/style.css">
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
               <h3 class="mt-2" ><a  href="" class=" nav-link   rounded  text-decoration-none text-warning fs fw-bolder me-4 text-center">Welcome <span><?php  echo $_SESSION['name']?></span></a></h3> 
                </li>
                <li class="nav-item">
                <a  href="./addword.php" class=" nav-link border px-3 py-2 rounded bg-primary text-decoration-none text-white text-center">+</a>
                </li>
                <li class="nav-item">
                <form action="" method="post">
                  <input type="submit" name="logout"  class=" nav-link border px-3 py-2 rounded bg-danger text-decoration-none text-white text-center" value="Logout" >
                  </form>
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



  
<div class="container ff z-3">
    
<form action="" class=" d-flex flex-column align-items-center gap-3 w-100 " method="post">
      

      <h3 class="text-warning mx-auto ">Search Word Here</h3>
      <input type="search" class=" py-2 px-4 rounded " name="search5">
      <input type="submit" name="submit" class="bg-success text-white py-2 px-4 rounded mx-auto text-center " value="Search">
     
      
  </form>
 
  <h4 class="text-center text-danger mt-4 text-uppercase"><?php echo $msg?></h4>

</div>
        

    </div>
        

   </section>



    <script src="../assets/js/script.js"></script>
    <script src="../assets/js/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_js_bootstrap.bundle.min.js"></script>
</body>

</html>