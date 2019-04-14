<?php
include '../../../inc/dbConnection.php';
$dbConn = getDatabaseConnection("midterm_practice");

$sql = "SELECT * from `mp_codes`";

$stmt = $dbConn -> prepare($sql);  //$connection MUST be previously initialized
$stmt->execute();
$records = $stmt->fetchAll(PDO::FETCH_ASSOC); //use fetch for one record, fetchAll for multiple

//print_r($records); //displays array content
//echo json_encode($records);

$promoCodes= array();
$promoCodes = $records;
$promoLength = sizeOf($promoCodes) - 1;
$randomPromoCode = "";
$randomIndex= rand(0,$promoLength);
$randomPromoCode = $promoCodes[$randomIndex];
echo json_encode($randomPromoCode);

?>