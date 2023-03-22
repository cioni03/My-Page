<?php session_start(); //Start session
include("folder.php"); //Include this to recrerate the folder once that it's deleted

function deleteFolderOnClick()
{
    $folderPath = 'text'; //Name of the folder to delete
    if (is_dir($folderPath)) { //Check if the folder exist
        $files = glob($folderPath . '/*'); //Get all the file inside the folder
        foreach ($files as $file) {
            if (is_file($file)) { //Check if it's a file
                unlink($file); //Delete file
            }
        }
        rmdir($folderPath); //Delete empty folder
        folder();
        unlink("setup_clean.php");
        header("location:edit.php"); //Redirect to edit.php page
        exit;
    }
}
deleteFolderOnClick(); //Run this function