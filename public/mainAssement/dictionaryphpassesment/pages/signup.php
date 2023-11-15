<?Php 
include('sqlconnect/connect.php');
ob_start();


  if(isset($_POST["submit"])){
    $name=$_POST['name'];
    $email=$_POST['email'];

    $pwd=$_POST['pwd'];
    $registerurl=$_SESSION['reg_url'];
    $entryurl=$_SESSION['entry_url'];
   

    $hashed_pwd=password_hash($pwd,PASSWORD_DEFAULT);
   
  

   

      $sql="INSERT INTO Dictionary_register_details(fullname,email,password,entrypath,registerpath) values('$name','$email','$hashed_pwd','$entryurl','$registerurl')";

      if($conn->query($sql)===true){
         header("location:login.php");
      }
      else{
        $conn->error; 
      }
    

   
    
   

  

  }


?>

<!DOCTYPE html>
<html lang="en" ng-app="myapp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     
    <!-- bootstrap -->
    <link rel="stylesheet" href="../assets/css/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_css_bootstrap.min.css">
 
     <!-- external style sheet -->
     <link rel="stylesheet"  href="../assets/css/style.css">

     
    
  
</head>
<body>
    <section class="bh">

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





<div class="form-container">
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" class="form">
      <h2>Sign up</h2>
      <div class="form-input">
        <input type="text" id="name" name="name" required>
        <label for="name">User name</label>
      </div>

      <div class="form-input">
      
        <input type="text" id="email" name="email"  required>
        <label for="email">Email</label>
      </div>


      <div class="form-input">
        <input type="password" id="pwd" name="pwd" required>
        <label for="pwd">Password</label>
      </div>


      

      
      <div class="form-input sd">
  <button class="signup" type="submit" name="submit">signup</button>
      </div>

      <div class="form-input sd1">
        <p>Already have an account?<a href="login.php">Login </a></p>
            </div>

    </form>

  </div>

  </section>

 <!-- jquery -->
 <script src="../assets/js/jquery.js"></script>
<script src="../assets/js/script.js"></script>
<script src="../assets/js/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_js_bootstrap.bundle.min.js"></script>
</body>
</html>








