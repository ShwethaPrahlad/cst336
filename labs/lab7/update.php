<html>
    <head>
    <title>Update Product</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>

          $.ajax({
                    type: "GET",
                    url: "../lab6/api/getCategories.php",
                    dataType: "json",
                    success: function(data, status) {
                        data.forEach(function(key) {
                            $("#catId").append("<option value=" + key["catId"] + ">" + key["catName"] + "</option>");
                        });
                        getProductInfo();
                    }
                }); //get categories AJAX
                
          function getProductInfo(){        
                
            $.ajax({
                    type: "GET",
                    url: "api/getProductInfoAPI.php",
                    dataType: "json",
                    data: {"productId": <?=$_GET['productId']?>},
                    success: function(data, status) {
                      $("#productName").val(data["productName"]); 
                      $("#productDescription").val(data["productDescription"]);
                      $("#productPrice").val(data["productPrice"]);
                      $("#productImage").val(data["productImage"]);      
                      $("#catId").val(data.catId).change();
                    }
                }); //get product info AJAX      
                
                        
        }//getProductInfo func
        
    $(document).ready(function() {
                
            $("#submitButton").on("click", function(){
                 $.ajax({
                    type: "GET",
                    url: "api/updateProductAPI.php",
                    dataType: "json",
                    data: {"productId": <?=$_GET['productId']?>,
                           "productName": $("#productName").val(),
                           "productDescription": $("#productDescription").val(),
                           "productImage": $("#productPrice").val(),
                           "productPrice": $("#productImage").val(),
                           "catId": $("#catId").val()
                    },
                    success: function(data, status) {
                    $("#updateMessage").html("Product has been updated");
                
                
                    } //success
                    
                 }); //ajax
                 
            });  //submit on click 
                
    });     //document ready     
    
    </script>
    </head>
    <body>
        <h1>Update product</h1>
        Enter Product Name:<input type="text" id = "productName" size="50">
        <br>
        Enter Product Description: <textarea id="productDescription" cols="40" rows="3"></textarea>
        <br>
        Product Image:<input type = "text" id = "productImage">
        <br/>
        Product Price: <input type="text" id="productPrice">
        <br/>
        Categories Name: <select id = "catId">
        <option> Select One </option>
        </select><br>
        <div id="updateMessage"></div><br>
        <button id="submitButton">Update Product</button><br>
    </body>
</html>