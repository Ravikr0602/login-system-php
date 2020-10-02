<?php

session_start();

// if you are not login and you directly come in welcome page then below code directly move to login.php page  

session_unset();
session_destroy();
header("location:welcome.php");
exit;

?>


