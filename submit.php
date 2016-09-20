<?php

# Make else statements

$canUpload = 1;
$target_dir = "NewAIs/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$fileType = pathinfo($target_file,PATHINFO_EXTENSION);
$name = $_POST["ainame"];
$pass = $_POST["aipass"];
if ($fileType != "go") {
	$canUpload = 0;
	echo "not go file";
}
if ($_POST["ainame"] != basename($_FILES["fileToUpload"]["name"]),".go") {
	$canUpload = 0;
	echo "not go file type";
}
if ($_FILES["fileToUpload"]["size"] > 1000000) {
	canUpload = 0;
	echo "too big";
}
$xml=simplexml_load_file("users.xml") or die("Error: Cannot create object");
$isThere = False;
for ($i=0,$i<count($xml->player),$i++) {
	if ($xml->player[$i]->username == $name && $xml->player[$i]->password == $pass) {
		$isThere = True;
	}
}
if (! $isThere) {
	$canUpload = 0
	echo "not a user";
}
if ($canUpload == 1) {
	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    	echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		#system("./evaluate")
	} else {
 	   echo "Sorry, there was an error uploading your file.";
	}
}
?>
