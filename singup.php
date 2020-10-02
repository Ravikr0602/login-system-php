<?php
 
 if($_SERVER["REQUEST_METHOD"] == "POST"){

 // include _dbconnect.php is a connecting of database directly for reference to another file
 
 $showAlert = false;
 $showError = false;
include 'partials/_dbconnect.php';

// username is define unique key because two same username is not vaild.
$username = $_POST["username"];
$password = $_POST["password"];
$conpassword = $_POST["conpassword"];

// this below code add to valdition purpose if password and confirm password is same and username is not present already in database then login
   
  //$exists =false;
 // check wethier this username Exits
  $existSql = "select * from `userlogin` where `username` = '$username'"; 
  $result = mysqli_query($conn, $existSql);
  $numExitsRows = mysqli_num_rows($result);
  if($numExitsRows > 0){
     // $exists =true;

     $showError = "Username is already exits please enter another username.";
  }
  else 
  {
      //$exists =false;
  

  if(($password == $conpassword)){
    
// 35 line no is to improve your password  
    $hash= password_hash($password, PASSWORD_DEFAULT);
    $sql ="INSERT INTO `userlogin` (`username`, `password`, `date`) VALUES ('$username', '$hash', CURRENT_TIMESTAMP())";

    $result = mysqli_query($conn, $sql);
    if ($result){
        $showAlert = true;
    }
  }
  else 
  {
      $showError = "password do not match please enter same password ..";
  }
 }
}



?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Sing up form</title>
  </head>
  <body>
  <!-- make a new folder partials and this folder also a build a page _nav.php. in page nav.php with present navbar its directly attach with login.php--->
    <?php require 'partials/_nav.php'?>
  
  <!--- after partials.php then using and copy a dismissible alert copy from bootstrap-->

  <!--If form are create successfull then show this below alert-->
 <?php

  if($showAlert)
  {
   echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
         <strong>Success!</strong> Your account is now created and you can login...
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
         </button>
         </div>  ';
  }
 
?>
<!--If password is not match then show this below alert-->
<?php

if($showError)
{
  echo  '<div class="alert alert-danger alert-dismissible fade show" role="alert">
         <strong>Error!</strong> ' . $showError. '
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
         </button>
         </div>';
        
}

?>

  <div class="container my-5" >
    <h1 class="text-center">Please Singup our website..</h1>


    
  <form action="" method="POST">
    <div class="form-group my-4">
    <label for="username">Username</label>
    <input type="text" maxlength="15" class="form-control" id="username" name="username" aria-describedby="emailHelp" placeholder="Please enter username...">
    
    </div>
    <div class="form-group">
    <label for="password">Password</label>
    <input type="password" maxlength="15" class="form-control" id="password" name="password" placeholder="Please enter Password">
    
    </div>
    <div class="form-group">
    <label for="conpassword">Confirm Password</label>
    <input type="password" maxlength="15" class="form-control" id="conpassword" name="conpassword" placeholder="Confirm your Password again...">
    <small id="emailHelp" class="form-text text-muted">to make sure enter a same password.</small>
    </div>
    
    <button type="submit" class="btn btn-primary">Singup</button>
  </form>
    
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>


