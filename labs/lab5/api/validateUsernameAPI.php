<?php
header('Access-Control-Allow-Origin: *');

//validates if the password does not contain username

$username = $_GET['username'];
$pwd = $_GET['password'];

//echo $username."<br>";
//echo $password."<br>";

$vPwd = array();
if(stripos ($username, $pwd) !== false) {
    $vPwd['validPwd'] = false;
}
else {
    $vPwd['validPwd'] = true;
}
echo json_encode($vPwd);
?>