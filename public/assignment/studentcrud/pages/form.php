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
             <h1>Student Crud Application</h1>
        </div>

         <div class="card-body">
           

                    <form method="post" action="sqlconnect.php">
            <div class="mb-3">
                <label for="firstname" class="form-label">FIRSTNAME</label>
                <input type="text" class="form-control" id="firstname"  name="firstname" placeholder="enter first name">
            </div>
           
            <div class="mb-3">
                <label for="lastname" class="form-label">LASTNAME</label>
                <input type="text" class="form-control" id="lastname"  name="lastname" placeholder="enter last name">
            </div>




            <div class="mb-3">
                <label for="age" class="form-label">AGE</label>
                <input type="number" class="form-control" id="firstname"  name="age" placeholder="age">
            </div>

            
            <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="email">
    
  </div>

           
            
            
          <input type="submit" class="btn btn-success" name="submit" value="Register">
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
