






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     
    <!-- bootstrap -->
    <link rel="stylesheet" href="./assets/css/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_css_bootstrap.min.css">
 
     <!-- external style sheet -->
     <link rel="stylesheet"  href="./assets/css/style.css">
  
</head>
<body>

  <div class="container">
    <div class="row">
      <div class="col">
      <div class="card" >
  <div class="card-header">
   <h1>Student CRUD Application</h1>
  </div>

  <div class="card-body">

  <button class="btn btn-success mb-3" ><a href="pages/form.php" class="text-light text-decoration-none ">Add New</a></button>
  <table class="table table-dark table-striped">
  <thead class=" text-center">
    <tr >
      <th >#</th>
      <th >FirstName</th>
      <th >LastName</th>
      <th >Age</th>
      <th >Email</th>
      <th>obtions</th>
    </tr>
  </thead>
  <tbody  class=" text-center">
      

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

// Create connection
// $conn = new mysqli($servername, $username, $password,$dbname);


$sql="select * from crud_students";
$run=mysqli_query($conn,$sql);

$id=1;

while($row= mysqli_fetch_array($run)){
  $uid=$row['id'];
  $firstname=$row['firstname'];
  $lastname=$row['lastname'];
  $age=$row['age'];
  $email=$row['email'];
  ?>
 

 <tr>
  <td><?php echo $id ?></td>
  <td><?php echo $firstname ?></td>
  <td><?php echo $lastname ?></td>
  <td><?php echo $age ?></td>
  <td><?php echo $email ?></td>

  <td>
  <button class="btn btn-success mb-3" ><a href="pages/update.php?edit=<?php echo $uid?>" class="text-light text-decoration-none ">Update</a></button>
  <button class="btn btn-danger mb-3" ><a href="pages/del.php?del=<?php echo $uid?>" class="text-light text-decoration-none ">Delete</a></button>
  </td>
 </tr>


<?php $id++; } ?>




  

  </tbody>
</table>
  </div>
 
</div>

      </div>

    </div>
  </div>



<script src="./assets/js/script.js"></script>
<script src="./assets/js/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_js_bootstrap.bundle.min.js"></script>
</body>
</html>







