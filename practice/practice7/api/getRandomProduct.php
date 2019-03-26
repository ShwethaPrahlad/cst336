<?php
include '../../../inc/dbConnection.php';
$dbConn = getDatabaseConnection("midterm_practice");

$sql = "SELECT * from `mp_product`";

$stmt = $dbConn -> prepare($sql);  //$connection MUST be previously initialized
$stmt->execute();
$records = $stmt->fetchAll(PDO::FETCH_ASSOC); //use fetch for one record, fetchAll for multiple

//print_r($records); //displays array content

//echo json_encode($records);

$products = array();
$products = $records;
//print_r($products[17]);
$productsLength = sizeOf($products) - 1;
$randomProduct = "";
$randomIndex= rand(0,$productsLength);
//print_r($randomIndex);
$randomProduct = $products[$randomIndex];
//print_r($randomProduct);
echo json_encode($randomProduct);
?>
