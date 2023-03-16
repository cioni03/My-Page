<?php
function folder()
{
    // Create text files and text folder if they don't exist

    // Define the folder path
    $folder = "text";

    // If the folder doesn't exist, create it
    if (!file_exists($folder)) {
        mkdir($folder, 0777, true);
    }

    // Define an array of file names present in the folder
    $files = array("corpo.html", "immagine.txt", "titolo.html", "titolo_pagina.txt", "custom.css");

    // Remove any empty strings from the array
    $files = array_filter($files);

    // Iterate over the array of file names
    foreach ($files as $file) {
        // Define the complete file path
        $path = $folder . "/" . $file;

        // If the file doesn't exist, create an empty file with touch()
        if (!file_exists($path)) {
            touch($path);
        }
    }
}
folder();