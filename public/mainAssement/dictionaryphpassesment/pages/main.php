<?php
  include("sqlconnect/connect.php");
 
  $searchedWord = explode(".", basename($_SERVER['REQUEST_URI']))[0];
  
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

    <link rel="stylesheet" href="../assets/css/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_css_bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style2.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
  <?php if(isset($_SESSION['name'])){?>
    <!-- nav bar -->
<nav class="navbar navbar-expand-lg  navbar-dark" id="navbar">
          <div class="container-fluid ">
             
          <form action="" class="d-flex gap-2 float-start dff" method="GET">
  
  <input type="search" class=" py-2 px-4 rounded " name="search1">
<input type="submit" name="submit1" class="bg-success text-white py-2 px-4  rounded mx-auto text-center" value="Search">


</form>
            <button class="navbar-toggler  " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon justify-content-end  "></span>
            </button>
           
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
              <ul class="navbar-nav gap-3 ">
                
                <li class="nav-item">
                <a  href="./addword.php" class=" nav-link border px-3 py-2 rounded bg-primary text-decoration-none text-white text-center">+</a>
                </li>
                <li class="nav-item">
                <form action="" method="post">
                  <input type="submit" name="logout"  class=" nav-link border px-3 py-2 rounded bg-danger text-decoration-none text-white text-center" value="Logout" >
                  </form>
                
                </li>
                <li class="nav-item">
                <a  href="./user.php" class=" nav-link border px-3 py-2 rounded bg-primary text-decoration-none text-white text-center">Back</a>
                </li>
                
                
               
             
                

                

              </ul>
           
              
          </div>

</div>
        </nav> 
          <!-- nav bar end -->



    
     
    <?php } else{?>
      <!-- nav bar -->
<nav class="navbar navbar-expand-lg  navbar-dark" id="navbar">
          <div class="container-fluid ">
  


              <form action="" class="d-flex gap-2 float-start dff" method="get">
  
              <input type="search" class=" py-2 px-4 rounded " name="search1">
        <input type="submit" name="submit1" class="bg-success text-white py-2 px-4  rounded mx-auto text-center" value="Search">
       
     
          </form>
            <button class="navbar-toggler  " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon justify-content-end  "></span>
            </button>
           
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
              <ul class="navbar-nav gap-3 ">
                
                
                
                <li class="nav-item">
                <a  href="../index.php" class=" nav-link border px-3 py-2 rounded bg-primary text-decoration-none text-white text-center">Back</a>
                </li>

                <li class="nav-item">
                <a  href="login.php" class=" nav-link border px-3 py-2 rounded bg-success text-decoration-none text-white text-center">Login</a>
                </li>
                <li class="nav-item">
                <a  href="signup.php" class=" nav-link border px-3 py-2 rounded bg-danger text-decoration-none text-white text-center">Register</a>
                </li>
               
                
                
               
             
                

                

              </ul>
           
              
          </div>

</div>
        </nav> 
          <!-- nav bar end -->



      <?php }?>

<!-- nav bar end
 -->



   <?php #if(isset($_SESSION['name'])){?>

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


    
      
                       


<div class="container fgg ">

        
<?php



$search=$searchedWord ;
$_SESSION['search11']=$search;

 $sql="SELECT * FROM Dictionary_words where word_name='$search' and ( status='1') ";

 $result= $conn->query($sql);

 if ($result->num_rows>0) {

while($row=$result->fetch_assoc()){

 $wordname=$row['word_name'];
 $wordid=$row['word_id'];
 $_SESSION['wordid']=$wordid;
 $img=$row['image'];
 $synonyms=$row['synonyms'];
 $antonyms=$row['antonyms'];
 $sys1=json_decode($synonyms,true);
 $ant1=json_decode($antonyms,true);


   }
   if( $search!==$wordname){
    header("location:404/index.php");
   }
   

  }
 





  if(isset($_GET['submit1'])){
    
    $find=$_GET['search1'];
   $sql="select * from Dictionary_words where word_name='$find' and  status='1'";

   $result=$conn->query($sql);
  //  print_r($result);
   if($result->num_rows>0){
     while($row=$result->fetch_assoc()){
      $wordname=$row['word_name'];
      $wordid=$row['word_id'];
      $_SESSION['wordid']=$wordid;
      $img=$row['image'];
      $synonyms=$row['synonyms'];
      $antonyms=$row['antonyms'];
      $sys1=json_decode($synonyms,true);
      $ant1=json_decode($antonyms,true);
        
     }
     
    
   }
   if( $find==$wordname){
    ob_start();
    header("location:./$find");
    ob_flush();
   }
   else{
     header("location:404/index.php");
   }
    
   
   
 

  

}
    
  

 
      if(isset($_POST['post1'])){

        $commend1=$_POST['comment'];
        date_default_timezone_set("Asia/Kolkata");
        $date=date("Y-m-d h:i:sa");
      

        $sql1="insert into Dictionary_comment_section(word_id,user_id,comments,comment_time) values('$wordid','{$_SESSION['id']}','$commend1','$date')";
        if($conn->query($sql1)==true){
          // echo"sucess";
        }
        else{
          $conn->error;
        }

        

      }
    
    
      // $wordname=$row['word_name'];
      // $wordid=$row['word_id'];
      // $img=$row['image'];
      // $synonyms=$row['synonyms'];
      // $antonyms=$row['antonyms'];
      //  $sys1=json_decode($synonyms,true);
      // $ant1=json_decode($antonyms,true);



 
 ?>



    <h1 class="text-warning fw-bolder fs-1">Word:<span class="text-white"><?php echo $wordname ?></span></h1>
    <hr>
    <?php  echo "<img src='./img/$img' alt='' height='250' width='300'>"?>
    <hr> <?php if(isset($_SESSION['name'])){?>
    <h4 class="text-warning fw-bolder ">Synonyms-<span class="text-white"> <?php echo   implode(', ',$sys1) ?></span>   <a  href="./synonyms.php" class=" bg-danger text-white py-1 px-3 rounded btn btn-danger text-decoration-none text-white text-center">+</a></h4>
    <h4 class="text-warning fw-bolder ">Antonyms-<span class="text-white"><?php echo implode(', ',$ant1) ?></span>   <a  href="./antonyms.php" class=" bg-danger text-white py-1 px-3 rounded btn btn-danger text-decoration-none text-white text-center">+</a></h4>
    <?php } else{?>
      <h4 class="text-warning fw-bolder ">Synonyms-<span class="text-white"> <?php echo   implode(', ',$sys1) ?></span>   </h4>
    <h4 class="text-warning fw-bolder ">Antonyms-<span class="text-white"><?php echo implode(', ',$ant1) ?></span> </h4>

    <?php } ?>
    <hr>

    <div>
        <h4 class="text-warning fw-bolder ">- Add Comments Here -</h4>
        <?php if(isset($_SESSION["name"])) {?>
        <form action="" method="post" enctype="mutlipart/data-form">
        <textarea  id=""  class="px-4 py-1 " name="comment" placeholder="Add comment "></textarea>
        <br>
        <input type="submit" value="Post" name="post1" class="btn btn-primary py-1 px-4">
        </form>

       <?php } else{?>
        <textarea name="" id="textarea" class="" ></textarea>
        <br>
        <!-- Trigger/Open The Modal -->
<button id="myBtn" class="bg-primary text-white py-1 px-4 rounded">Post</button>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <h5 class="close2">Please Register or Login <a href="">Register?</a> <a href="">Login?</a></h5>
  </div>
       <?php }?>


    </div>
    <hr>
    <h5 class="text-warning fw-bolder ">-  Comments-</h5>

    <hr>
    <?php if(isset($_SESSION["name"])){?>
    <div class='bg-light p-2  w-auto ps-4 bg-secondary-subtle overflow-auto rounded-5' style='height:300px;  overflow-y: scroll;'>
    <?php
      $sql2="SELECT c.comments,r.fullname,c.comment_time FROM ((Dictionary_comment_section AS c INNER JOIN  Dictionary_register_details AS r ON c.user_id=r.id) INNER JOIN Dictionary_words ON Dictionary_words.word_id=c.word_id) WHERE Dictionary_words.word_id='$wordid'AND (r.fullname='{$_SESSION["name"]}' or c.status='1')
      ";
      $result= $conn->query($sql2);
  
      if ($result->num_rows>0) {
    
    while($row=$result->fetch_assoc()){

      $username_list=$row['fullname'];
      $word_comment=$row['comments'];
      $comment_time=$row['comment_time'];

      echo "<span class='fs-5 fw-bolder  fst-italic'> $username_list </span> ";
    
         echo time_elapsed_string($comment_time);

          echo "<p class=' ms-3 fw-medium hr'>$word_comment</p>
";

   
        


    }
  
  }
  


    
    
    ?>
    

</div>
  
  <?php } else{?>
    <div class='bg-light p-2  w-auto ps-4 bg-secondary-subtle overflow-auto rounded-5' style='height:300px;  overflow-y: scroll;'>
    <?php
      $sql2="SELECT c.comments,r.fullname,c.comment_time FROM ((Dictionary_comment_section AS c INNER JOIN  Dictionary_register_details AS r ON c.user_id=r.id) INNER JOIN Dictionary_words ON Dictionary_words.word_id=c.word_id) WHERE Dictionary_words.word_id='$wordid'AND c.status='1'
      ";
      $result= $conn->query($sql2);
  
      if ($result->num_rows>0) {
    
    while($row=$result->fetch_assoc()){

      $username_list=$row['fullname'];
      $word_comment=$row['comments'];
      $comment_time=$row['comment_time'];

      echo "<span class='fs-5 fw-bolder  fst-italic'> $username_list </span> ";
    
         echo time_elapsed_string($comment_time);

          echo "<p class=' ms-3 fw-medium hr'>$word_comment</p>
";

   
        


    }
  
  }
  


    
    
    ?>
    

</div>



  <?php }?>
    
  


</div>



  







    

</section>




<script>
     var modal = document.getElementById("myModal");
var btn = document.getElementById("myBtn");
var span = document.getElementsByClassName("close")[0];
btn.onclick = function() {
  modal.style.display = "block";
}
span.onclick = function() {
  modal.style.display = "none";
}
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
   </script>

       

<script src="../assets/js/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_js_bootstrap.bundle.min.js"></script>

    
</body>
</html>

<?php


function time_elapsed_string($datetime, $full = false) {
  date_default_timezone_set("Asia/Kolkata");
  $t=date("Y-m-d h:i:s");
  $now = new DateTime($t);
  $ago = new DateTime($datetime);
  $diff = $now->diff($ago);

  $diff->w = floor($diff->d / 7);
  $diff->d -= $diff->w * 7;

  $string = array(
      'y' => 'year',
      'm' => 'month',
      'w' => 'week',
      'd' => 'day',
      'h' => 'hour',
      'i' => 'minute',
      's' => 'second',
  );
  foreach ($string as $k => &$v) {
      if ($diff->$k) {
          $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
      } else {
          unset($string[$k]);
      }
  }

  if (!$full) $string = array_slice($string, 0, 1);
  return $string ? implode(', ', $string) . ' ago' : 'just now';
}

?>