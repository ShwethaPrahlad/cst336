<?php
include '../../../inc/dbConnection.php';
$conn = getDatabaseConnection("c9");

$arr = array();


if(!empty($_GET['pName'])) {

$arr[":countryName"] = $_GET['pName'];
$sql = "INSERT INTO `hw4_countries` (`cName`) VALUES (:countryName)";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($arr);
    
    $sql ="SELECT COUNT(*) searchCount FROM hw4_countries WHERE cName= :countryName";
    $stmt = $conn->prepare($sql);
    $stmt->execute($arr);
    
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($record);    
}


    
?>