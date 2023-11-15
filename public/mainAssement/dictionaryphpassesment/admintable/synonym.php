<?php

include('../pages/sqlconnect/connect.php');
if(isset($_SESSION["name"])){
  // header("location:addword2.php");

}
else{
  header("location:../index.php");
}

if(isset($_POST['submit'])){
  $wordid=$_POST['wordid'];
  $word=$_POST['words'];
  $name=$_POST['sell'];


  

  $sql="SELECT $name FROM Dictionary_words WHERE word_id='$wordid'";
 

 
  $result=$conn->query($sql);
  if($result->num_rows >0){


    while($row1=$result->fetch_assoc()){
      $array_sys=json_decode($row1[$name],true);
    }

    array_push($array_sys,$word);
    $sys_array=json_encode($array_sys,true);
    $sql1="update Dictionary_words set $name='$sys_array' where word_id='$wordid' ";

    if($conn->query($sql1)===true){
      $msg="Inserted successfully";
    }

  }








}
if(isset($_POST["logout"])){
  session_destroy();
  header("location:../index.php");
}





?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_css_bootstrap.min.css">
</head>
<body>
     <!-- nav bar -->
     <nav class="navbar navbar-expand-lg  navbar-dark" id="navbar">
        <div class="container-fluid  ">
            <h5><a class="nav-link text-warning "  href="./admin.php">ADMIN PANEL</a></h5>
          <button class="navbar-toggler  " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon justify-content-end  "></span>
          </button>
         
          <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav  ">
              <li class="nav-item">
               
              </li>
              <li class="nav-item">
                <a class="nav-link  "  href="./addword2.php">ADD WORD</a>
              </li>
             
              <li class="nav-item">
                <a class="nav-link  text-danger"  href="">ADD SYNONYMS/ANTONYMS</a>
              </li>

              <li class="nav-item">
                <a class="nav-link "  href="./wordtable.php">WORD TABLE</a>
              </li>

              <li class="nav-item">
                <a class="nav-link "  href="./comment.php">COMMENTS TABLE</a>
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
        <section class="fsd">

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
    


          
          <div class="container ff sd">
    
   
            <form action="" class="d-flex flex-column align-items-center gap-3 w-100" method="post" enctype="multipart/form-data">
            <h3 class="text-warning mx-auto ">Add Synonyms /Antonyms Here</h3>
            <input type="text" class="fff  py-2 px-3 rounded " placeholder="Enter Word Id" name="wordid">
            <input type="text" class="fff  py-2 px-3 rounded " placeholder="Enter the Word" name="words" >
            <select name="sell" id="" class="px-5 py-1 text-center">
                <option value=""  class="px-5 py-1 text-center">choose the values</option>
                <option value="synonyms"  class="px-5 py-1 text-center" >Synonyms</option>
                <option value="antonyms"  class="px-5 py-1 text-center">Antonyms</option>
            </select>

            <input type="file" class=" ms-5 mt-4 rounded text-white">
            <input type="submit" class="bg-success text-white py-1 px-4  rounded mx-auto" value="ADD" name="submit"></input>
            </form>
       
    
    </div>
        





          
        </section>

   








    <script src="../assets/js/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_js_bootstrap.bundle.min.js"></script>
</body>
</html>