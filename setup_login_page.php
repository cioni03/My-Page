<?php session_start(); //Start session
if (isset($_SESSION['UserData']['Username'])) { //Check if the session variable exists with the user name
    header("Location: edit.php"); //If does not exist redirect
    exit;
} else {
}

//Function to redirect to setup page if the folder TEXT (with all the data) does not exist
function check_setup_file()
{
    //Check if folder exist
    if (file_exists("setup_page.php") || file_exists("setup_loginpassword.php")) {
        // Redirect to setup page
        header("Location: setup_page.php");
    }
}
check_setup_file();


//Function to redirect to setup page if the folder TEXT (with all the data) does not exist
function check_text_folder()
{
    //Check if folder exist
    if (!file_exists("text")) {
        // Redirect to setup page
        header("Location: login.php");
    }
}
check_text_folder();

if (isset($_POST['Submit'])) {
    /*Unsuccessful attempt: Set error message */
    $msg = "<span class='alert alert-danger d-flex align-items-center' role='alert' style='color:red'>Wrong username or
    password</span>";

    $found = false;
    //Read the login credentials from the JSON file
    $config = file_get_contents('config.json');
    $user = json_decode($config, true);

    //Check if the user exists and the password is correct
    $Username = isset($_POST['Username']) ? $_POST['Username'] : '';
    $Password = isset($_POST['Password']) ? $_POST['Password'] : '';

    if ($Username === $user['username'] && password_verify($Password, $user['password'])) {
        //Valid login, saves the user's information in the session and redirects to the protected page
        $_SESSION['UserData']['Username'] = $Username;
        header("location:clean.php");
        exit;
    }
}
?>

<!--Html page-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body style="padding: 30px;">
    <i data-eva="file-text-outline" data-eva-fill="#ff0000" data-eva-height="48" data-eva-width="48"></i>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <img style="border-radius: 50px;margin: 20px;">


                <div class="container-fluid" style="margin-right: auto;  margin-left: auto;  max-width: 300px;">

                    <div class="row">
                        <a href="index.php">
                            <div class="col-md-12" style="text-align: center;">
                                <img src="<?php $version = (file_exists("text/immagine.txt")) ? file_get_contents("text/immagine.txt") : "0.0.0.0";
                                            echo $version; ?>" style="max-width:150px; border-radius: 50px;margin: 20px;">
                            </div>
                        </a>

                        <form class="d-flex flex-column" action="" method="post" name="Login_Form">
                            <?php if (isset($msg)) { ?>
                                <p><?php echo $msg; ?></p>
                            <?php } ?>
                            <h1 style="font-size:19px; font-weight:500;">Username</h1>
                            <input name="Username" type="text" class="Input" maxlength="10" pattern="[^(){}/><\][\\\x22,;|]+">
                            <h1 style="font-size:19px; font-weight:500; margin-top:10px;">Password</h1>
                            <input name="Password" type="password" class="Input" maxlength="10" pattern="[^(){}/><\][\\\x22,;|]+">
                            <input class="btn btn-dark" name="Submit" type="submit" value="Login" class="Button3" style="margin-top:10px; border-radius:0px;">
                        </form>

                    </div>

                </div>

                <p style="text-align: center; font-size:10px; color:#757575; margin-top:30px;"> Thank you for using
                    mypage ❤️</p>
</body>

</html>