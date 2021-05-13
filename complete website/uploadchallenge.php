<?php
include '../creategm.php';
// This is the directory where images will be saved
$target_dir = "baitap/";
$target_file = $target_dir . basename( $_FILES["filesToUpload"]["name"]);

// This gets all the other information from the form
$hints=$_POST["hints"];
$challenge=($_FILES["filesToUpload"]["name"]);

// Connects to your Database

require_once("connection.php");
// Writes the information to the database
$sql = "INSERT INTO challenge (name,hints) VALUES ('$challenge', '$hints')";
mysqli_query($conn,$sql);

// Writes the photo to the server
if(move_uploaded_file($_FILES["filesToUpload"]["tmp_name"], $target_file))
{

// Tells you if its all ok
echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded, and your information has been added to the directory";
}
else {

// Gives and error if its not
echo "Sorry, there was a problem uploading your file.";
}
?>
