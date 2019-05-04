<?php

 if (!empty($_FILES)) {

   // print_r($_FILES);
    
    echo "Image size: " . $_FILES['myFile']['size']; 
    echo "<br>";
    
    if ($_FILES['myFile']['size'] <= 0){
     
    echo "Sorry! Cannot upload the image as the image size could not be determined.";    
    echo "<br>";
    
    }
    else if (($_FILES['myFile']['size'] > 0) && ($_FILES['myFile']['size'] < 1000000)) {
    
    move_uploaded_file( $_FILES['myFile']['tmp_name'], "gallery/" . $_FILES['myFile']['name']);
    
    echo "Image successfully uploaded!";
    echo "<br>";
    
    } 
    
    else {
        
        echo "Sorry! Cannot upload the image as the image size is larger than 1 MB";
        echo "<br>";
    }

}


    function displayImagesUploaded() {

        $images = scandir("gallery"); //returns all file names within a folder
        
        //print_r($images);
        
        for ($i = 2; $i < count($images); $i++) {
            
            echo "<img src='gallery/$images[$i]' width='50' />";
            
        }//for
    
    }//function


?>


<!DOCTYPE html>
<html>
    <head>
        <title> Lab 9: File Upload </title>
        <link rel="stylesheet" href= "css/styles.css">
    </head>
    <body>
        
        
        <form  method="POST" enctype="multipart/form-data">
        
            <input type="file" name="myFile" />
            <button> Upload File! </button>
            
        </form>

        <hr>
        <h3> Images uploaded: </h3>
        
        <?= displayImagesUploaded() ?>
        
    </body>
</html>