<?php
session_start();

//checks whether user has logged in
if (!isset($_SESSION['adminName'])) {
    exit;
}

    include '../../../inc/dbConnection.php';
    $conn = getDatabaseConnection("ottermart");
    
    $productId =  $_GET['productId'];
    $sql = "UPDATE om_product
    SET productPrice = :productPrice,
    productName = :productName, 
    productDescription =  :productDescription, 
    productImage = :productImage,
    catId = :catId
    WHERE om_product.productId = $productId"; //has to be concatenated if the variable is an array
    
    $arr = array();
    $arr[":productName"] = $_GET["productName"];
    $arr[":productDescription"] = $_GET["productDescription"];
    $arr[":productImage"] = $_GET["productImage"];
    $arr[":productPrice"] = $_GET["productPrice"];
    $arr[":catId"] = $_GET["catId"];
    
    //print_r($arr);
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($arr);
    echo json_encode($arr);
    
?>