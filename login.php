<!DOCTYPE html>
<html>
<title>ALLAN - Admin Page</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="images/favicon.ico">
<link rel="stylesheet" href="w3.css">
<body>

<!-- Page Container -->
<div class="w3-content w3-margin-top" style="max-width:1400px;">

  <!-- The Grid -->
  <div class="w3-row-padding">


    <!-- Main Column -->
    <div class="w3-col">

      <div class="w3-container w3-card-2 w3-white w3-margin-bottom">
        <h2 class="w3-text-grey w3-padding-16" style="margin-bottom:0px !important"><a href="index.php" style="text-decoration:none;">Project ALLAN</a></h2> Awesome Lodge LAN Accessible Network<br><hr><br>


<?php

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

    <form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>';
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
