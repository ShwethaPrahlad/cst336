<?php
header('Access-Control-Allow-Origin: *');

include '../../../inc/dbConnection.php';

$conn = getDatabaseConnection("ottermart");
$namedParameters = array();

//This query works BUT it allows SQL INJECTION (because it's using single quotes)
//$sql = "SELECT * FROM `om_product` WHERE productName LIKE '%$product%'";

$sql = "SELECT * FROM `om_product` WHERE 1"; //Retrieves ALL records

if (!empty($_GET['product'])) { //user entered a product keyword
    $sql.= " AND (productName LIKE :productName OR productDescription LIKE :productName)";
    $namedParameters[":productName"] = "%".$_GET['product']."%";
} 

if (!empty($_GET['productName'])) { //user entered a product name
    $sql.= " AND productName = :productName";
    $namedParameters[":productName"] = $_GET['productName'];
} 

if (!empty($_GET['category'])) { //user entered a category
    $sql.= " AND catId = :categoryId";
    $namedParameters[":categoryId"] = $_GET['category'];
} 

if (!empty($_GET['priceFrom'])) { //user entered a from price 
    $sql.= " AND productPrice >= :priceFrom";
    $namedParameters[":priceFrom"] = $_GET['priceFrom'];
}

if (!empty($_GET['priceTo'])) { //user entered a to price 
    $sql.= " AND productPrice <= :priceTo";
    $namedParameters[":priceTo"] = $_GET['priceTo'];
}
if (isset($_GET['orderBy'])) { //user entered sort by
  if($_GET['orderBy'] == "price"){
    $sql.= " ORDER BY productPrice";
  }
  if($_GET['orderBy'] == "name"){
      $sql.= " ORDER BY productName";
  }
}
$stmt = $conn->prepare($sql);  //$connection MUST be previously initialized
$stmt->execute($namedParameters);
$records = $stmt->fetchAll(PDO::FETCH_ASSOC); //use fetch for one record, fetchAll for multiple
//print_r($records); //debugging  

echo json_encode($records);
?>