<?php
include('sqlconnect/connect.php');

$error=" ";

  if(isset($_POST['submit1'])){

    $name1=$_POST['name1'];
    $pwd1=$_POST['pwd1'];


    $sql="SELECT * FROM Dictionary_register_details WHERE fullname='$name1'";
    $result= $conn->query($sql);
    
    if(empty($name1)|| empty($pwd1)){
      $error="Enter The details";

    }

    else{
      while($row=$result->fetch_assoc()){
        $fullname=$row['fullname'];
        $hased_pwd1=$row['password'];
       $is_admin=$row['is_admin'];
      $_SESSION['isadmin'] =$is_admin;
       $_SESSION['id']=$row['id'];

      }
      


    if(password_verify($pwd1,$hased_pwd1)){
      $_SESSION['name']=$name1;
      // $_SESSION['id']=$row['id'];
    
      if( $fullname==$name1 && password_verify($pwd1,$hased_pwd1)==$hased_pwd1 && $is_admin==1){
        header('Location:../admintable/admin.php');
      }

       else{
        header('Location: user.php');

       }

     
       exit();

    }
    else{
      $error="not match";
    }
  

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
    <form action="" method="post" class="form">
      <h2>Login</h2>
      <div class="form-input">
        <input type="text" id="name" name="name1" required>
        <label for="name">User name</label>
        <span class="err"></span>
      </div>



      <div class="form-input">
        <input type="password" id="pwd" name="pwd1" required>
        <label for="pwd">Password</label>
      <span class="err"></span>
      </div>



      

     
      
      <div class="form-input sd">
  <button class="signup" type="submit" name="submit1">Login</button>

      </div>

      <div class="form-input sd">
   <h4 class="err "> <?php echo "$error";?></h4>

      </div>

      <div class="form-input sd1">
        <p>Don't have an account?<a href="signup.php">Register </a></p>
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








