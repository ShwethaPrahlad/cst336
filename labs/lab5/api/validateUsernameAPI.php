<?php
header('Access-Control-Allow-Origin: *');

//validates if the password does not contain username

$username = $_GET['username'];
$pwd = $_GET['password'];

//echo $username."<br>";
//echo $password."<br>";

$pword = array();
if(stripos ($username, $password) !== false) {
    $pword['validPwd'] = false;
}
else {
    $pword['validPwd'] = true;
}
echo json_encode($pword);
?>