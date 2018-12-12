<!DOCTYPE html>
<?php
    session_start();
?>

<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    	  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>   
    	  
        <title> OtterMusic - Login </title>
        <style>
            body {
                text-align:center;
                background-color: cornflowerblue;
            }
            
            .error {
                color: red;
            }
        </style>
        
    </head>
    <body>

        <h1> OtterMusic - Admin Login </h1>
        
        <form method="post" action="core/loginProcess.php">
          Username:  <input type="text" name="username"/> <br> <br />
          Password:  <input type="password" name="password"/> <br> <br />
          <input id = "button" type="submit" name = "login" value="Login">
        </form>
        
        <br />
        
        <form action = "core/guest.php">
            <input id = "button" type = "submit" name = "guest" value = "Continue As Guest">
        </form>
        <br />
        
        <?php
            if (isset($_SESSION["failedLogin"]) && !empty($_SESSION["failedLogin"])) {
                echo "<h2 class = 'error'> Incorrect username/password. </h2>";
            }
         ?> 


    <footer>

            <br />

            <figure>
              <!-- <img id = "csumbLogo" src = "../../templates/img/csumb_logo.png" alt = "CSUMB Logo"/> -->
              <!-- <img id = "buddyVerified" src = "../../templates/img/buddy_verified.png" alt = "Buddy Verified" /> -->
            </figure>


        </footer>
    </body>
    
</html>