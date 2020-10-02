<?php
 
 if($_SERVER["REQUEST_METHOD"] == "POST"){

 // include _dbconnect.php is a connecting of database directly for reference to another file
 
 $login = false;
 $showError = false;
include 'partials/_dbconnect.php';

$username = $_POST["username"];
$password = $_POST["password"];

// this below sql code to check username and password are exits in database
   
   //$sql ="select * from `userlogin` where `username`='$username' AND `password`='$password'";
   $sql ="select * from `userlogin` where `username`='$username'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){

      // your password hash form to verfiy it is right or wrong if password is right then login
      while($row=mysqli_fetch_assoc($result)){
        
        if(password_verify($password, $row['password'])){

          $login = true;

   // start seesion here if you are successfully logged in then go to welcome.php page

          session_start();
          $_SESSION['loggedin'] = true;
          $_SESSION['username'] = $username;
          header("location:welcome.php");
        }
        else 
  {
      $showError = "Password dosen't exits..";
  }
      }
    
  }
  else 
  {
      $showError = "Invalid username this username dosen't exits..";
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

    <title>Login form</title>
  </head>
  <body>
  <!-- make a new folder partials and this folder also a build a page _nav.php. in page nav.php with present navbar its directly attach with login.php--->
    <?php require 'partials/_nav.php'?>
  
  <!--- after partials.php then using and copy a dismissible alert copy from bootstrap-->

  <!--If the username and password are present in database successfull then show this below alert-->
 <?php

 if($login){
   echo'

    <div class="alert alert-success alert-dismissible fade show" role="alert">
   <strong>Success!</strong> You are logged in...
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
   </button>
 </div>  

';}
 
?>
<!--If username and password is not match in database then show this below alert-->
<?php

if($showError){
  echo'

   <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> ' . $showError.'
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
   <span aria-hidden="true">&times;</span>
  </button>
</div>  

';}

?>

  <div class="container my-5" >
    <h1 class="text-center">Please Login our website..</h1>


    
  <form action="" method="POST">
    <div class="form-group my-4">
    <label for="username">Username</label>
    <input type="text" maxlength="15" class="form-control" id="username" name="username" aria-describedby="emailHelp" placeholder="Please enter username...">
    
    </div>
    <div class="form-group">
    <label for="password">Password</label>
    <input type="password" maxlength="15" class="form-control" id="password" name="password" placeholder="Please enter Password">
    </div>

    <button type="submit" class="btn btn-primary">Login</button>
  </form>
    
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>


