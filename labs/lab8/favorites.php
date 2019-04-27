<!DOCTYPE html>
<html>
    <head>
        <title> Favorites </title>
        <h1> Favorites </h1> <br>
        <link rel="stylesheet" href= "css/styles.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script>
        
        function displayFavorites(keywordLink){
            
            var keyword = $(keywordLink).html();
            
             $.ajax({
             method: "GET",
                url: "api/favoritesAPI.php",
            dataType: "json",
                data: { 
                    "action": "favorites",
                    "keyword": keyword
                   },
             success: function(data, status) {
              $("#favoriteImages").html("");
              data.forEach(function(keyword){
                 $("#favoriteImages").append("<img src ='" + keyword.imageURL + "width='300' height='280'>");
              });
             }, //success
              complete: function(data, status) {
              //alert(status);
            
             }//complete
          }); //ajax
        }
         $(document).ready(function(){
           $.ajax({
             method: "GET",
                url: "api/favoritesAPI.php",
                dataType: "json",
                data: { 
                    "action": "keyword",
                   },
             success: function(data, status) {
              //alert(data[0].keyword);
               $("#keywordDisplay").html("");
               data.forEach(function(key){
                   $("#keywordDisplay").append("<a onclick='displayFavorites(this)' href='#'>" + key.keyword + "</a> ");
                });
             }, //success
             
             complete: function(data, status) {
              //alert(status);
            
             } //complete
             
          }); //ajax
          
        }); //document ready
        
    </script>
    <style>

    </style>
    </head>
    <body>
    <div id="keywordDisplay"></div><br>
    <div id="favoriteImages"></div>
    </body>
</html>