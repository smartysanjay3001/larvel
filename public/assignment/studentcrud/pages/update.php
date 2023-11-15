<?php


$servername = "192.168.7.254";
$username = "sanjay_juntrdev_usr";
$password = "l4u58rHjnyCZh6d3";
$dbname="sanjay_juntrdev_db";
$port=42209;


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname,$port);

// Check connection
if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
}

$edit=$_GET['edit'];
$sql="SELECT * FROM crud_students WHERE id='$edit'";
$run=mysqli_query($conn,$sql);

$row=mysqli_fetch_array($run);
    
$uid=$row['id'];
  $firstname=$row['firstname'];
  $lastname=$row['lastname'];
  $age=$row['age'];
  $email=$row['email'];





?>


<?php



if(isset($_POST['submit1'])){
    $edit=$_GET['edit'];
    $Firstname=$_POST['firstname'];
    $Lastname=$_POST['lastname'];
    $Age=$_POST['age'];
    $Email=$_POST['email'];

  $sql="UPDATE crud_students SET firstname='$Firstname',lastname='$Lastname',age='$Age',email='$Email'  WHERE id='$edit'";

  echo $sql;


  
  if ($conn->query($sql) === TRUE) {
   
      header('location:../index.php');
  } else {
    echo "Error updating record: " . $conn->error;
    header('location:./404 file/index.html');
  }

}


    
?>







<!DOCTYPE html>
<html lang="en">
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

<div class="container">
  <div class="row">
      <div class="col-md-9">
      <div class="card" >
        <div class="card-header">
             <h1>Update Student Crud Application</h1>
        </div>

         <div class="card-body">
           

                    <form method="post">
            <div class="mb-3">
                <label for="firstname" class="form-label">FIRSTNAME</label>
                <input type="text" class="form-control" id="firstname"  name="firstname" placeholder="enter first name" value="<?php echo $firstname ?>">
            </div>
           
            <div class="mb-3">
                <label for="lastname" class="form-label">LASTNAME</label>
                <input type="text" class="form-control" id="lastname"  name="lastname" placeholder="enter last name"   value="<?php echo $lastname ?>">
            </div>




            <div class="mb-3">
                <label for="age" class="form-label">AGE</label>
                <input type="number" class="form-control" id="age"  name="age" placeholder="age"    value="<?php echo $age ?>">
            </div>

            
            <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="email"    value="<?php echo $email ?>">
    
  </div>

           
            
            
          <input type="submit" class="btn btn-success" name="submit1" value="Edit">
            </form>
          

    
          </div>
    
         </div>

       </div>

   </div>
</div>



<script src="../assets/js/script.js"></script>
<script src="../assets/js/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_js_bootstrap.bundle.min.js"></script>
</body>
</html>
