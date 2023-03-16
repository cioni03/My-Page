<?php session_start(); /* Starts session */
session_destroy(); /* Destroy session */
header("location:index.php");  /* Redirect to login page */
exit;