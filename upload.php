<!DOCTYPE html>
<html>
<title>ALLAN - Admin Page</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="images/favicon.ico">
<link rel="stylesheet" href="w3.css">
<body>

  <div class="row" style="background-color:#e31837;">
  <a href="index.php"><img style="max-width:400px; width:100%; height:auto; display:block; margin:0 auto;" src="images/brand.png"></a>
  </div>
<!-- Page Container -->
<div class="w3-content w3-margin-top" style="max-width:1400px;">

  <!-- The Grid -->
  <div class="w3-row-padding">


    <!-- Main Column -->
    <div class="w3-col">

      <div class="w3-container w3-card-2 w3-white w3-margin-bottom">
        <br>


<?php
$target_dir = "upload/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5242880) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "pdf" && $imageFileType != "docx"
&& $imageFileType != "xlsx" && $imageFileType != "pptx") {
    echo "Sorry, only JPG, JPEG, PNG, GIF, PDF, DOCX, PPTX and XLSX files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  $myResult = (bool) (preg_match("`^[-0-9A-Z_\.]+$`i",$_FILES["fileToUpload"]["name"]));
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>

<!-- End Main Column -->
</div>

<!-- End Grid -->
</div>


<!-- End Page Container -->
</div>

</body>
</html>
