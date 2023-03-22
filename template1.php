<?php

$file = 'text/titolo.html';
$file2 = 'text/corpo.html';
$file3 = 'text/immagine.txt';
$file4 = 'text/titolo_pagina.txt';
$file5 = 'text/custom.css';

// check if form has been submitted
if (isset($_POST)) {
    // save the text contents
    file_put_contents($file, 'aa');
}

if (isset($_POST)) {
    // save the text contents
    file_put_contents($file2, 'ddd');
}

if (isset($_POST)) {
    // save the text contents
    file_put_contents($file3, 'ff');
}

if (isset($_POST)) {
    // save the text contents
    file_put_contents($file4, 'gg');
}

if (isset($_POST)) {
    // save the text contents
    file_put_contents($file5, 'hh');
}

header("location:edit.php");
