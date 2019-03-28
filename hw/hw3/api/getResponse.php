<?php
header('Access-Control-Allow-Origin: *');

//******
//This Web API checks whether a username exists in the "usernames" array
//It returns the data in JSON format
//******

$usageRights1 = "labeled for noncommercial reuse";

$usageRights2 = "labeled for noncommercial reuse with modification";

$usageRights3 = "labeled for reuse with modification";

//Scenario 1

$usageRightChosen1 = array();

if(strtolower($_GET['sceone']) === $usageRights1) {
    $usageRightChosen1['correct'] = true;
}
else {
    $usageRightChosen1['correct'] = false;
}

//echo json_encode($usageRightChosen1);

//Scenario 2

$usageRightChosen2 = array();

if($_GET['scetwo'] === $usageRights2) {
    $usageRightChosen2['correct'] = true;
}
else {
    $usageRightChosen2['correct'] = false;
}

//echo json_encode($usageRightChosen2);

//Scenario 3

$usageRightChosen3 = array();

if($_GET['scethree'] === $usageRights3) {
    $usageRightChosen3['correct'] = true;
}
else {
    $usageRightChosen3['correct'] = false;
}

//echo json_encode($usageRightChosen3);

$usageRightChosen = array($usageRightChosen1, $usageRightChosen2, $usageRightChosen3);

echo json_encode($usageRightChosen);
?>
