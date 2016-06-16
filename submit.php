<?php
canUpload = 1;
$target_dir = $_POST["ainame"]."/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$fileType = pathinfo($target_file,PATHINFO_EXTENSION);
if ($fileType != "go") {
	canUpload = 0;
}
if ($_POST["ainame"] != basename($_FILES["fileToUpload"]["name"]),".go") {
	canUpload = 0;
}
if ($_FILES["fileToUpload"]["size"] > 1000000) {
	canUpload = 0;
}
if (canUpload == 1) {
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
	system("./evaluate")
} else {
    echo "Sorry, there was an error uploading your file.";
}
}
?>