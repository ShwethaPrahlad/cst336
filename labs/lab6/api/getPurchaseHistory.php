<?php
header('Access-Control-Allow-Origin: *');

include '../../../inc/dbConnection.php';

$conn = getDatabaseConnection("ottermart");

$productId = $_GET['productId'];
$sql = "SELECT * 
        FROM om_product
        NATURAL JOIN om_purchase
        WHERE productId = :pId";
        
$np = array();        
$np[':pId'] = $productId;
$stmt = $conn->prepare($sql);  //$connection MUST be previously initialized
$stmt->execute($np);
$records = $stmt->fetchAll(PDO::FETCH_ASSOC); //use fetch for one record, fetchAll for multiple
//print_r($records); //debugging  

echo json_encode($records);
?>