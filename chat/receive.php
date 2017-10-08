<?php
error_reporting(0);
ini_set('display_errors', 0);
$lastreceived=$_POST['lastreceived'];
$room_file=file("room1.txt",FILE_IGNORE_NEW_LINES);
for($line=0;$line<count($room_file);$line++){
$messageArr=split("<!@!>",$room_file[$line]);
if($messageArr[0]>$lastreceived)echo $messageArr[1]."<br>";
}
echo "<SRVTM>".$messageArr[0];
?>
