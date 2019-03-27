<?php
header('Access-Control-Allow-Origin: *');

//******
//This Web API checks whether a username exists in the "usernames" array
//It returns the data in JSON format
//******

$usageRights = array("labeled for reuse with modification", "labeled for reuse", "labeled for noncommercial reuse with modification", "labeled for noncommercial reuse", "not filtered by license");
$scenario = $_GET['scenario']; 
print_r($scenario);

$usageRightChosen = array();

if(in_array(strtolower($_GET['scenario']), $usageRights)) {
    $usageRightChosen['available'] = false;
}
else {
    $usageRightChosen['available'] = true;
}


echo json_encode($usageRightChosen);

?>
