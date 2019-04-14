<?php
include '../../../inc/dbConnection.php';
$dbConn = getDatabaseConnection("midterm");

$sql = "SELECT * from `m_question`";

$stmt = $dbConn -> prepare($sql);  //$connection MUST be previously initialized
$stmt->execute();
$records = $stmt->fetchAll(PDO::FETCH_ASSOC); //use fetch for one record, fetchAll for multiple

//print_r($records); //displays array content

//echo json_encode($records);

$questions = array();
$questions = $records;
//print_r($products[17]);
$questionsNumber = sizeOf($questions) - 1;
$randomQuestion = "";
$randomIndex= rand(0,$questionsNumber);
//print_r($randomIndex);
$randomQuestion = $questions[$randomIndex];
//print_r($randomQuestion);
echo json_encode($randomQuestion);
?>