<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

//Read the login credentials from the config.json file
$config = file_get_contents('config.json');
$user = json_decode($config, true);

//Check if the user exists and the old password is correct
$Username = $_SESSION['UserData']['Username'];
$OldPassword = isset($_POST['oldpassword']) ? $_POST['oldpassword'] : '';
$NewPassword = isset($_POST['newpassword']) ? $_POST['newpassword'] : '';

if ($user['username'] === $Username && password_verify($OldPassword, $user['password'])) {
    //Change user's password
    $user['password'] = password_hash($NewPassword, PASSWORD_DEFAULT);

    //Save the changes in the config.json file
    file_put_contents('config.json', json_encode($user));

    //Show a confirmation message
    header("location:logout.php");
} else {
    //If the old password is incorrect, it shows an error message
    echo "<span style='color:red'>Vecchia password non valida</span>";
}
