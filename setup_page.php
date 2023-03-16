<?php session_start(); //Start session
if (isset($_SESSION['UserData']['Username'])) { //Check if the session variable exists with the user name

} else {
    header("Location: login.php"); //If does not exist redirect
    exit;
}
?>

<?php
//Function to redirect to setup page if the folder TEXT (with all the data) does not exist
function check_text_folder()
{
    //Check if folder exist
    if (!file_exists("text")) {
        // Create text folder and all the file
        include "folder.php";
        folder();
    }
}
check_text_folder();

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
                                            echo $version; ?>"
                                    style="max-width:150px; border-radius: 50px;margin: 20px;">
                            </div>
                        </a>

                        <h2 style="text-align: center;"><a style="text-decoration: none; color: #212529;"
                                href="index.php">Setup page</a></h2>

                        <form class="d-flex flex-column" method="post" action="setup_loginpassword.php">
                            <p style="text-align: center;">Use a minimum 4-character password. </br></br>This password
                                cannot be recovered, so if you
                                loose it you need to delete and reinstall
                                from
                                scratch.</p>
                            <input placeholder="Insert here your password" class="form-control" type="password"
                                id="newpassword" name="newpassword" style="margin-top: 15px;" minlength="4"
                                maxlength="10" pattern="[^(){}/><\][\\\x22,;|]+">
                            <button class="btn btn-dark" type="submit" style="margin-top: 15px;">Set password</button>
                        </form>

                    </div>

                </div>

                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
                <script src="https://code.jquery.com/jquery-3.6.1.min.js" crossorigin="anonymous"></script>
                <script src="js/tinymce.min.js"></script>

                <p style="text-align: center; font-size:10px; color:#757575; margin-top:30px;"> Thank you for using
                    mypage ❤️</p>
</body>

</html>