<?php

include '../../inc/dbConnection.php';
$conn = getDatabaseConnection("final_practice");

function displayLockedAccounts(){
    global $conn;
    $sql = "SELECT * FROM `fe_login` INNER JOIN fe_lock ON fe_login.studentId = fe_lock.studentId";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //print_r($records);
    
    for ($i=0; $i < count($records); $i++) {
        // username, num attempts, button
        echo $records[$i]['username'] . " " .$records[$i]['failedAttempts'] . " <button onClick='unlock(this, ".$records[$i]['studentId'].")' >Unlock</button>";
        echo "<br>";
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Program 2. Final Exam Practice </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
     <script>
        /* global $*/
        
        $(document).ready(function(){
            
           // $("#btn").on("click", function(){});
        
        });
           
            function unlock(btn, studentId){
                //alert(studentId);
                
                $(btn).html("UNLOCKED!");
                $(btn).attr("disabled","disabled");
                
                 $.ajax({
                        type: "GET",
                        url: "api/unlock.php",
                        dataType: "json",
                        data:{"studentId": studentId},
                        success: function(data, status) {
                         // alert("got data");
                        
                        
                        }
                    });    
                    
            }//function
            
        </script>   
   
    </head>
    <body>

        <h1> Unlocking Accounts </h1>

        
        <?= displayLockedAccounts()  ?>



 
    </body>
    
</html>