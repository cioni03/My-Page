<?php session_start(); /* Starts session */

if (isset($_POST['Submit'])) {

        /* Set user with username and password */
        $logins = array('admin' => 'password', 'admin1' => 'password1');

        /* Check and assign submitted username and password to new variable */
        $Username = isset($_POST['Username']) ? $_POST['Username'] : '';
        $Password = isset($_POST['Password']) ? $_POST['Password'] : '';

        /* Check username and password existence in defined array */
        if (isset($logins[$Username]) && $logins[$Username] == $Password) {

                /* Success: Set session variables and redirect to Protected page  */
                $_SESSION['UserData']['Username'] = $logins[$Username];
                header("location:edit.php");
                exit;
        } else {

                /*Unsuccessful attempt: Set error message */
                $msg = "<span style='color:red'>Wrong username or password</span>";
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
                                                        <div class="col-md-12" style="text-align: center;"><img src="<?php
                                                                                                                        $version = (file_exists("text/immagine.txt")) ? file_get_contents("text/immagine.txt") : "0.0.0.0";
                                                                                                                        echo $version;
                                                                                                                        ?>" style="max-width:150px; border-radius: 50px;margin: 20px;"></div>
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

                                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
                                <script src="https://code.jquery.com/jquery-3.6.1.min.js" crossorigin="anonymous"></script>
                                <script src="https://unpkg.com/@popperjs/core@2"></script>
                                <script src="js/tinymce.min.js"></script>

                                <p style="text-align: center; font-size:10px; color:#757575; margin-top:30px;"> Thank you for using mypage ❤️</p>
</body>

</html>