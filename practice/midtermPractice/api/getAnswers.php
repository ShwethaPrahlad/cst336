<?php
include '../../../inc/dbConnection.php';
$dbConn = getDatabaseConnection("midterm");

$sql = "SELECT * from m_question WHERE 1";
$namedParameters = array();

if(!empty($_GET['questionId'])){
    $sql.= " AND questionId = :questionId";
    $namedParameters[":questionId"] = $_GET['questionId'];
}
$stmt = $dbConn -> prepare($sql);  //$connection MUST be previously initialized
$stmt->execute($namedParameters);
$records = $stmt->fetchAll(PDO::FETCH_ASSOC); //use fetch for one record, fetchAll for multiple

//print_r($records); //displays array content

echo json_encode($records);