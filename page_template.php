<?php session_start(); //Start session
if (isset($_SESSION['UserData']['Username'])) { //Check if the session variable exists with the user name

} else {
    header("Location: login.php"); //If does not exist redirect
    exit;
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


                <div class="container-fluid" style="max-width: 300px;">

                    <div class="row">

                        <h2 style="text-align: center;"><a style="text-decoration: none; color: #212529;" href="index.php">Set template</a></h2>
                        <h6 style="text-align: center;"><a style="text-decoration: none; color: #212529;" href="edit.php">Go back to your dashboard</a></h6>


                        <div class="" role="group" aria-label="Basic example" style="margin-top: 35px; text-align: center;">
                            <form name="form" action="clean.php" method="POST">
                                <input class="btn btn-dark" type="submit" value="Start from scratch" style="margin-top:10px; border-radius:0px;" />
                            </form>
                            <form name="form" action="template1.php" method="POST">
                                <input class="btn btn-dark" type="submit" value="Template 1" style="margin-top:10px; border-radius:0px;" />
                            </form>
                        </div>


                    </div>

                </div>

                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
                <script src="https://code.jquery.com/jquery-3.6.1.min.js" crossorigin="anonymous"></script>
                <script src="js/tinymce.min.js"></script>

                <p style="text-align: center; font-size:10px; color:#757575; margin-top:30px;"> Thank you for using
                    mypage ❤️</p>
</body>

</html>