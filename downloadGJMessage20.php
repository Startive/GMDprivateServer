<?php
include "connection.php";
require_once "incl/GJPCheck.php";
$accountID = htmlspecialchars($_POST["accountID"],ENT_QUOTES);
$gjp = htmlspecialchars($_POST["gjp"],ENT_QUOTES);
$messageID = htmlspecialchars($_POST["messageID"],ENT_QUOTES);
$query=$db->prepare("select * from messages where messageID = '".$messageID."'");
$query->execute();
$result2 = $query->fetchAll();
$result = $result2[0];
$GJPCheck = new GJPCheck();
$gjpresult = $GJPCheck->check($gjp,$accountID);
if($gjpresult == 1){
	echo "6:".$result["userName"].":3:".$result["userID"].":2:".$result["accID"].":1:".$result["messageID"].":4:".$result["subject"].":8:1:9:0:5:".$result["body"].":7:CVOLTON GDPS";
}else{
	echo -1;
}
?>