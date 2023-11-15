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
        <a class="nav-link text-warning "  href="./admin.php">ADMIN PANEL</a>
          <button class="navbar-toggler  " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon justify-content-end  "></span>
          </button>
         
          <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav  ">
              <li class="nav-item">
               
              </li>
              <li class="nav-item ">
                <a class="nav-link  ms-5"  href="./addword2.php">ADD WORD</a>
              </li>
             
              <li class="nav-item">
                <a class="nav-link "  href="./synonym.php">ADD SYNONYMS/ANTONYMS</a>
              </li>

              <li class="nav-item">
                <a class="nav-link "  href="./wordtable.php">WORD TABLE</a>
              </li>

              <li class="nav-item">
                <a class="nav-link text-danger"  href="">COMMENTS TABLE</a>
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

          






          <div class="container mb-4 " >
            
          <h1 class="text-center  text-uppercase text-warning">Comments Table</h1> 
            <div class="row">
              <div class="col" >
              <div class="card bg-secondary  shadow-lg  ">
          <div class="card-header">
          
          </div>
        
          <div class="card-body" style="height: 400px; overflow-y: scroll;">
  
          <table class="table table-dark table-striped "  >
          <thead class=" text-center">
            <tr >
              <th >WORD_ID</th>
              <th >COMMENT</th>
              
              <th >USER</th>
              <th >STATUS</th>
              <th>ACTION</th>
            </tr>
          </thead>
          <tbody  class=" text-center">
          <?php
           $sql="SELECT c.word_id, c.comments, r.fullname,c.status,c.comment_id FROM Dictionary_comment_section AS c INNER JOIN Dictionary_register_details AS r ON c.user_id=r.id ";

           $result=$conn->query($sql);

           while($row=$result->fetch_assoc()){
            
             $wordid=$row['word_id'];
             $commentid=$row['comment_id'];
             $comments=$row['comments'];
             $username=$row['fullname'];
             $wordstatus=$row['status'];
?>
             <tr>
             <td><?php echo $wordid?></td>
             <td><?php echo $comments?></td>
             <td><?php echo $username?></td>
             <td><?php echo $wordstatus?></td>
           
             <td class='mt-2'>
             <?php if($wordstatus==0){?>
             <a href='comment_approve.php?edit=<?php echo  $commentid?>' class='text-light text-decoration-none btn btn-success '>Approve</a>
             <?php } else{?>
             <a href='comment_dis.php?edit=<?php echo  $commentid?>' class='text-light text-decoration-none btn btn-warning  '>DisApprove</a>
             <?php }?>
             <a href='comment_delete.php?edit=<?php echo  $commentid?>' class='text-light text-decoration-none btn btn-danger  '>Delete</a>
            </tr>
           
          
 
           <?php }?>


          
        

              
        
         
        
        
        

         

         
         <!-- <tr>
          <td>1</td>
          <td>super</td>
        
          <td>sanjay</td>
          <td>1</td>
        
          <td class="mt-2">
          <button class="btn btn-success mb-3" ><a href="" class="text-light text-decoration-none ">Approve</a></button>
          <button class="btn btn-warning mb-3" ><a href="" class="text-light text-decoration-none ">DisApprove</a></button>
          <button class="btn btn-danger mb-3" ><a href="" class="text-light text-decoration-none ">Delete</a></button>
          </td>
         </tr>
        



         
         <tr>
          <td>1</td>
          <td>super</td>
        
          <td>sanjay</td>
          <td>1</td>
        
          <td class="mt-2">
          <button class="btn btn-success mb-3" ><a href="" class="text-light text-decoration-none ">Approve</a></button>
          <button class="btn btn-warning mb-3" ><a href="" class="text-light text-decoration-none ">DisApprove</a></button>
          <button class="btn btn-danger mb-3" ><a href="" class="text-light text-decoration-none ">Delete</a></button>
          </td>
         </tr>
         -->



        
          </tbody>
        </table>
          </div>
         
        </div>
        
              </div>
        
            </div>
          </div>


        </section>

   








    <script src="../assets/js/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_js_bootstrap.bundle.min.js"></script>
</body>
</html>