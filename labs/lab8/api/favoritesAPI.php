<?php

    include '../../../inc/dbConnection.php';
    $conn = getDatabaseConnection("c9");
    
//receives these parameters: action, url, keyword

//TO GET THE 2 EXTRA POINTS IN THE HANDS-ON PORTION OF THE FINAL EXAM
//1. Add favorites to database
//2. Remove favorites from database
//3. Display the keyword list from database (use DISTINCT)


   $arr = array();
   $action = $_GET['action'];
  switch ($action) {
      
     case "add": 
        $sql = "INSERT INTO `lab8_pixabay` ( `imageURL`, `keyword`) 
    VALUES (:url, :keyword)";
    
    $arr[":url"] = $_GET['url'];
    $arr[":keyword"] = $_GET['keyword'];
    
                 break;
                 

     case "delete": 
          $sql = "DELETE FROM `lab8_pixabay` WHERE imageURL = :url";
          $arr[":url"] = $_GET['url'];
          
                 break;
                 
  }//switch
  
 
  
    $stmt = $conn->prepare($sql);
    $stmt->execute($arr);
    
    //$records = $stmt->fetch(PDO::FETCH_ASSOC);
    //echo json_encode($records);

?>