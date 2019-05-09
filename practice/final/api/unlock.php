<?php

include '../../../inc/dbConnection.php';
$conn = getDatabaseConnection("final_practice");

$sql= "DELETE FROM fe_lock WHERE studentId =".$_GET["studentId"];
$stmt = $conn->prepare($sql);
$stmt->execute();

$sql= "UPDATE `fe_login` SET `failedAttempts` = 0 WHERE `fe_login`.`studentId` =" .$_GET["studentId"];
$stmt = $conn->prepare($sql);
$stmt->execute();
?>