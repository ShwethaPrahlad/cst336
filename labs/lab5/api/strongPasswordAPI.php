<?php
header('Access-Control-Allow-Origin: *');

//$pwdLength = $_GET['length'];
//echo json_encode($pwdLength);

//$lettersArray = array("a", "b", "c"...);

$lettersArray = range("a","z");

//print_r($lettersArray); //displays all elements in an Array, for debugging purposes

$password = "";

for ($i = 0; $i < 10; $i++) {
    $randomIndex = rand(0,25); //generates random number from 0 to 25, inclusive
    $password = $password . $lettersArray[$randomIndex]; //Use a DOT to concatenate strings
    //$password .=  $lettersArray[$randomIndex ]; /
}

$password = str_shuffle($password); //shuffles the letters of the password
$password[0] = rand(0,9);
//echo $password;

$sugPwd = array();
$sugPwd['suggestedPwd'] = $password;

echo json_encode($sugPwd);

?>

