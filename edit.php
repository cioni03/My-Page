<?php session_start(); //Start session
if (isset($_SESSION['UserData']['Username'])) { //Check if the session variable exists with the user name

} else {
    header("Location: login.php"); //If does not exist redirect
    exit;
}
?>

<!--Save and get data-->
<?php
$url = 'edit.php';

$file = 'text/titolo.html';
$file2 = 'text/corpo.html';
$file3 = 'text/immagine.txt';
$file4 = 'text/titolo_pagina.txt';
$file5 = 'text/custom.css';

// check if form has been submitted
if (isset($_POST['titolo'])) {
    // save the text contents
    file_put_contents($file, $_POST['titolo']);
}

if (isset($_POST['corpo'])) {
    // save the text contents
    file_put_contents($file2, $_POST['corpo']);
}

if (isset($_POST['immagine'])) {
    // save the text contents
    file_put_contents($file3, $_POST['immagine']);
}

if (isset($_POST['titolo_pagina'])) {
    // save the text contents
    file_put_contents($file4, $_POST['titolo_pagina']);
}

if (isset($_POST['custom'])) {
    // save the text contents
    file_put_contents($file5, $_POST['custom']);
}

// read the textfile
$text = file_get_contents($file);
$text2 = file_get_contents($file2);
$text3 = file_get_contents($file3);
$text4 = file_get_contents($file4);
$text5 = file_get_contents($file5);
?>

<!--Html page-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Modifica profilo</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="text/custom.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container" style="padding-top:60px;">
        <div class="row">
            <div class="col-xl-10 offset-xl-1">
                <h1 style="text-align: center;"><a style="text-decoration: none; color: #212529;" href="index.php">Your
                        page 😎</a></h1>

                <!--Page element-->
                <form name="form" action="" method="POST">
                    <h1 style="font-size:16px; font-weight:500;">Tab title</h1>
                    <input name="titolo_pagina" class="form-control" type="text" value="<?php echo htmlspecialchars($text4); ?>" style="width: 100%; margin-bottom:10px;">
                    <h1 style="font-size:16px; font-weight:500;">Profile picture</h1>
                    <input name="immagine" class="form-control" type="text" value="<?php echo htmlspecialchars($text3); ?>" style="width: 100%; margin-bottom:10px;">
                    <h1 style="font-size:16px; font-weight:500;">Page title</h1>
                    <input name="titolo" class="form-control" type="text" value="<?php echo htmlspecialchars($text); ?>" style="width: 100%; margin-bottom:10px;">
                    <h1 style="font-size:16px; font-weight:500;">Body text</h1>
                    <textarea id="mytextarea" rows="12" name="corpo" class="form-control" style="width: 100%;"><?php echo htmlspecialchars($text2); ?></textarea>
                    </br>
                    <h1 style="font-size:16px; font-weight:500;">Custom CSS</h1>
                    <textarea rows="8" name="custom" class="form-control" style="width: 100%;"><?php echo htmlspecialchars($text5); ?></textarea>
                    <input class="btn btn-dark" type="submit" value="Save page" style="margin-top:10px; border-radius:0px;" />
                </form>

                <!--Settings section-->
                <div style="margin-top:60px;" class="accordion accordion-flush">

                    <!--First accordition-->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                Settings
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">

                                <!--First option-->
                                <form class="d-flex flex-column" method="post" action="changepassword.php">
                                    <p>Use a minimum 4-character password. You cannot use some special symbols.</p>
                                    <input placeholder="Insert here your old password" class="form-control" type="password" id="oldpassword" name="oldpassword" maxlength="10" pattern="[^(){}/><\][\\\x22,;|]+">
                                    <input placeholder="Insert here your new password" class="form-control" type="password" id="newpassword" name="newpassword" style="margin-top: 15px;" minlength="4" maxlength="10" pattern="[^(){}/><\][\\\x22,;|]+">
                                    <button class="btn btn-dark" type="submit" style="margin-top: 15px;">Change my
                                        password</button>
                                </form>

                                <!--Second option-->
                                <form class="d-flex flex-column" method="post" style="margin-top: 35px;">
                                    <p>Start your site from scratch. This action is not reversible.</p>
                                    <button name="clean_btn" class="btn btn-dark" type="submit">Reset MyPage</button>
                                </form>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!--Button-->
        <div class="container">
            <a href="index.php" class="float-edit">
                <i class="fa fa-eye my-float"></i>
            </a>
            <a href="logout.php" class="float-exit">
                <i class="fa fa-sign-out my-float"></i>
            </a>
            <a href="" onclick="downloadPage()" class="float-download">
                <i class="fa fa-download my-float"></i>
            </a>
        </div>

        <!--Import script-->
        <script src="js/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
        <script>
            tinymce.init({
                selector: '#mytextarea', //Set this id
                plugins: 'fullscreen codeeditor emoticons image anchor visualblocks importcss link wordcount table', //Add my plugins
                paste_data_images: true,
                promotion: false, //Hide logo
                branding: false, //Hide name
                language: 'en', //Item lang
                height: 1300, //Default height
                content_css: "https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css,text/custom.css", //Import css inside his area to render bootstrap element
                toolbar: [
                    "undo redo | styleselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | codeeditor | fullscreen | anchor"
                ],
                codeeditor_themes_pack: "twilight merbivore dawn kuroir",
                codeeditor_wrap_mode: true,
                codeeditor_font_size: 14,
            });
        </script>

        <!--Credits - Thank you if you choose to leave them here! :) -->
        <p style="text-align: center; font-size:10px; color:#757575; margin-top:30px;"> Thank you for using mypage ❤️
        </p>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</html>

<script>
    function downloadPage() {
        // Create a link with the download attribute and the file name
        var link = document.createElement('a');
        link.download = 'index.html';

        // Make an HTTP GET request to get the HTML code of the index.php page
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Create a temporary element to manipulate the HTML code
                var temp = document.createElement('div');
                temp.innerHTML = this.responseText;

                // Remove elements with specific classes
                var classesToRemove = ['float-edit', 'float-exit', 'float-download', 'btn_download'];
                classesToRemove.forEach(function(className) {
                    var elements = temp.getElementsByClassName(className);
                    for (var i = elements.length - 1; i >= 0; i--) {
                        elements[i].parentNode.removeChild(elements[i]);
                    }
                });

                // Get the modified HTML code
                var newhtml = temp.innerHTML;

                // Encode the HTML code in base64
                var base64 = btoa(unescape(encodeURIComponent(newhtml)));

                // Set the link's href attribute with the data: prefix and the base64 code
                link.href = 'data:text/html;base64,' + base64;

                // Add the link to the document
                document.body.appendChild(link);

                // Simulate a click on the link to download the file
                link.click();

                // Remove the link from the document
                document.body.removeChild(link);
            }
        };
        xhr.open('GET', 'index.php', true);
        xhr.send();
    }
</script>

<!--Check if the button with 'name = "button"' was clicked-->
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['clean_btn'])) {
        echo "<script>
                var ask = confirm('Are sure do you want to reset your page?');
                if(ask==true)
                {
                     window.location = 'clean.php';    
                }
                else
                {
                    window.location = 'edit.php';    
                }
            </script>";
    }
}
?>