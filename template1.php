<?php

$file2 = 'text/corpo.html';

if (isset($_POST)) {
    // save the text contents
    file_put_contents($file2, '<button class="btn btn-dark">ciao</button>');
}

header("location:edit.php");
