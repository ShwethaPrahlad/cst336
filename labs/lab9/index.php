<?php

 if (!empty($_FILES)) {

   // print_r($_FILES);
    
    echo "Image size: " . $_FILES['myFile']['size']; 
    echo "<br>";

    if (($_FILES['myFile']['size'] > 0) && ($_FILES['myFile']['size'] < 1000000)) {
    
    move_uploaded_file( $_FILES['myFile']['tmp_name'], "gallery/" . $_FILES['myFile']['name']);
    
    echo "Image successfully uploaded!";
    echo "<br>";
    
    } 
    
    else {
        
        echo "Sorry! Cannot upload the image as the image size is larger than 1 MB or the image size could not be determined";
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
     <footer>
            <br/><br/><br/><br/><br/>
            &copy;&nbsp;2019 Shwetha Prahlad, CST 336 Internet Programming.<br/>
            Disclaimer: The content on this web page is fictitious. It represents information only for academic purposes.<br/> <br/>
            <div id = "logo">
               <img src = "../../images/CSUMB_Logo.png" id = "footer_image" alt= "CSUMB Logo with the name and an otter"/>
            </div>
            <div id = "badge">
               <img src = "../../images/buddy_verified.png" id = "buddy_badge"/>
            </div>
        </footer>
</html>