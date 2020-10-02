<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location:login.php");
    exit;
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

    <title>welcome - <?php  echo $_SESSION['username']?></title>
  </head>
  <body>
  <!-- make a new folder partials and this folder also a build a page _nav.php. in page nav.php with present navbar its directly attach with login.php--->
    <?php require 'partials/_nav.php'?>

    

  <div class="container my-5">

      <div class="alert alert-success" role="alert">
          <h4 class="alert-heading">welcome to  <?php  echo $_SESSION['username']?></h4>
          <p>Aww yeah <?php  echo $_SESSION['username']?>, you successfully logged in to our Information e-Learning website . This website to many contain to choice your any subject and article userful for you. please you can read any thing.. </p>
       <hr>
          <p class="mb-0">Whenever you need to, be sure to logout <a href="http://localhost/phpproject/new/loginsys/logout.php"> using this link for logout our website..</a></p>
      </div>
    
  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>




