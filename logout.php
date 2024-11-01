<?php  

# If the user wants to log out, the existing session variables will be unset, and they will be redirected to the login page
session_start();
session_unset();
session_destroy();
header('Location: login.php');
?>