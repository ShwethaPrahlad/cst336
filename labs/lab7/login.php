<?php


?>
<!DOCTYPE html>
<html>
    <head>
        <title> Admin Login screen</title>
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
  <!-- <script>
    $(document).ready(function(){
        
            
      $("#submitButton").on("click", function(){
         
          
            var user = $("[name=username]").val();
            var pwd = $("[name=password]").val();
            var url= $("#formElements").attr("action").val();
            //alert(url);
            
            //alert(user);
            //alert(pwd);
            //var newUrl = "loginProcess.php?username=" +user+"&password=" +pwd;
            //alert(newUrl);
               
                $.ajax({
                    type: "POST",
                    url: "loginProcess.php",
                    dataType: "json",
                    data: { "username": user,
                            "password": pwd
                    },
                     success: function(data, status) {
                     // alert(data);
                      if (data === "false"){
                          $("#errorMessage").html("Username or Password are incorrect!"); 
                      }  
                     }
                     
                }); //ajax    
            
        }); //submit button
      
           
    });   // document ready
        
    </script> -->
  </head>
    <body>
        <form method="POST" action="loginProcess.php" id="formElements" class="jumbotron">
            
            Username: <input type="text" name="username"/><br/><br>
            
            Password: <input type="password" name="password"/> <br/> <br/><br>
            
            <input type="submit" id="submitButton" value="Login!"><br/><br/><br>
            
            <div id= "errorMessage"></div>
     </form>
    </body>
    <footer>
    <div id="footerDiv">
        &copy; 2019 Shwetha Prahlad, CST 336 Internet Programming.<br/> Disclaimer: The content on this web page is fictitious. It represents information only for academic purposes.<br/><br/>
        <div id="logo">
            <img src="../../images/CSUMB_Logo.png" id="footer_image" />
        </div>
    </div>
</footer>
</html>