<?php 
include('../pages/sqlconnect/connect.php');
if(isset($_SESSION["name"])){
  // header("location:addword2.php");

}
else{
  header("location:../index.php");
}

if(isset($_POST["logout"])){
  header("location:../index.php");
  session_destroy();
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
        <a class="nav-link text-warning "  href="">ADMIN PANEL</a>
          <button class="navbar-toggler  " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon justify-content-end  "></span>
          </button>
         
          <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav  ">
            
              <li class="nav-item ms-5">
                <a class="nav-link "  href="./addword2.php">ADD WORD</a>
              </li>
             
              <li class="nav-item ">
                <a class="nav-link "  href="./synonym.php">ADD SYNONYMS/ANTONYMS</a>
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
        <section class="fr">
           
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




        </section>

   


    <script src="../assets/js/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_js_bootstrap.bundle.min.js"></script>
</body>
</html>