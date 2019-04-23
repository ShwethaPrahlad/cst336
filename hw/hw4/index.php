<!DOCTYPE html>
<html>
<head>
<title> Countries API Demo </title>
<link rel="stylesheet" href="styles/styles.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>

    function searchCountry() {
         $.ajax({
             method: "GET",
                url: "api/findCountriesAPI.php",
            dataType: "json",
                data: { "pName":$("#cName").val(),
                "pRegion":$("#region").val(),
                "pCurrencyName":$("#currency").val()
                },
             success: function(data, status) {
               //alert(data.Response.length);
               $("#searchInformation").html("Countries Found:");
               $("#searchInformation").append("<div class='row1'>" + 
                                              "<div class='col1'> Name </div>"+
                                              "<div class='col2'> Region </div>"+
                                              "<div class='col3'> Sub-Region </div>"+
                                              "<div class='col4'> Latitude </div>"+
                                             "<div class='col5'> Longitude </div>"+ 
                                             "<div class='col6'> Currency </div>"+ 
                                             "<div class='col7'> Flag </div>"+
                                             "</div><br>");
               for(var i=0; i< data.Response.length; i++){
               $("#searchInformation").append("<div class='row2'>" + 
                                              "<div class='col1'>" + data.Response[i].Name + "</div>"+ 
                                              "<div class='col2'>" + data.Response[i].Region +"</div>"+
                                              "<div class='col3'>"+ data.Response[i].SubRegion + "</div>"+
                                              "<div class='col4'>" + data.Response[i].Latitude + "</div>"+
                                             "<div class='col5'>" + data.Response[i].Longitude + "</div>"+ 
                                             "<div class='col6'>" + data.Response[i].CurrencyName + "</div>"+
                                             "<div class='col7'>" + "<a href= '" + data.Response[i].FlagPng + "'> See Flag </a>" + "</div>"+
                                             "</div><br>");
                                              
               } //for
               
            } //success
    
         });  //ajax
    } // search Country
    
  $(document).ready(function() {     
      $("#searchButton").on("click", function() { 
         
         $.ajax({
             method: "GET",
                url: "api/searchCountAPI.php",
            dataType: "json",
                data: { "pName":$("#cName").val()
           },
             success: function(data, status) {
                 //alert("inside search count API");
                 //alert(data);
                 $("#searchCount").html("This country information has been searched " + data.searchCount + " times(s)");
             }
         });//ajax
         
       }); //searchButton
  }); //document ready

    
</script>
</head>
<body class="jumbotron">
<h1> Countries Information Search </h1>
Country Name: <input type="text" id="cName"/><br/><br/>
Region: <input type="text" id="region"/><br/><br/>
Currency: <input type="text" id="currency"/><br/><br/>
<button onclick="searchCountry()" id="searchButton">Search</button>
<br/><br/>
<div id="searchCount"></div>
<div id="searchInformation"></div><br>
</body>
</html>