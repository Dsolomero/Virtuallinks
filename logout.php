<?php 

session_start();

//destroy - the session

session_unset();
//go to the login page
header('location:login.php'); 

?>