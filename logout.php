<?php session_start(); /* Starts session */
session_destroy(); /* Destroy session */
header("location:login.php");  /* Redirect to login page */
exit;
?>