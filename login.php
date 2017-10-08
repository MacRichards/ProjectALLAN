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


if (isset($_GET['url'])){
  echo "iframe updated<br>";
  $my_file = 'url.txt';
  $handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file); //implicitly creates file
  $data = 'This is the data';
  fwrite($handle,$_GET['url']);
}

if (isset($_GET['del_files'])){
  echo "<h2>Files Deleted</h2>";

  $path = 'upload/';
  $files = scandir($path);
  $files = array_diff(scandir($path), array('.', '..'));
  foreach ($files as $value) {
    if (!unlink('upload/'.$value))  echo ("Error deleting $value");
    else echo ("Deleted $value<br>");
  }
}

if(isset( $_GET['usr']) && isset($_GET['pwd'])){
  $input_username = substr(strip_tags($_GET['usr']), 0, 50);
  $input_password = substr(strip_tags($_GET['pwd']), 0, 50);
}
else{
  echo "Please provide a username and password";
  die();
}

$username = "admin";
$password = "admin";

  if (isset($_GET['del'])){
    echo "File Deleted";
    $file = "room1.txt";
    if (!unlink($file))  echo ("Error deleting $file");
    else echo ("Deleted $file");
}






  if ($input_username == $username && $input_password == $password) {
    echo '

    <h2>Chat Management</h2>
    <form action="login.php">
    <input id="del" name="del" value="Clear Chat" type="submit">
    </form><br><br><hr><br>

    <h2>Shared File Management</h2>
    <form action="login.php">
    <input id="del_files" name="del_files" value="Clear Shared Files" type="submit">
    </form><br><br><hr><br>

    <h2>Offline Website</h2>
    <form action="login.php">
    <input id="url" name="url" type="text" placeholder="http://western-region.oa-bsa.org">
    <input type="submit" value="Download!" name="submit">
    </form>

    <br><br><hr><br>
    <h2>Upload Shared Files</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload (only JPG, JPEG, PNG, GIF, PDF, DOCX, PPTX and XLSX files are allowed. 5MB Max)<br>
    <input type="file" name="fileToUpload" id="fileToUpload"><br>
    <input type="submit" value="Upload Image" name="submit">
</form><br>';
  }
  else {
    echo "The username or password is wrong";
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
