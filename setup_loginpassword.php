<?php session_start(); //Start session
if (isset($_SESSION['UserData']['Username'])) { //Check if the session variable exists with the user name

} else {
    header("Location: login.php"); //If does not exist redirect
    exit;
}
?>

<?php
session_start();

//Read the login credentials from the config.json file
$config = file_get_contents('config.json');
$user = json_decode($config, true);

//Get the new password from the input box
$NewPassword = isset($_POST['newpassword']) ? $_POST['newpassword'] : '';

if (!empty($NewPassword)) {
    //Change user's password
    $user['password'] = password_hash($NewPassword, PASSWORD_DEFAULT);

    //Save the changes in the config.json file
    file_put_contents('config.json', json_encode($user));

    //Delete this file
    unlink("setup_loginpassword.php");
    unlink("setup_page.php");

    //Go to this page
    header("location:logout.php");
}