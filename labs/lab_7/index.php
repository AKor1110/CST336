<!DOCTYPE html>
<html>
    <head>
        <title> Admin Login </title>
        <style>
            body {
                text-align:center;
                background-color: cornflowerblue;
            }
            
        </style>
    </head>
    <body>

        <h1> Ottermart - Admin Login </h1>
        
        <form method="post" action="loginProcess.php">
          Username:  <input type="text" name="username"/> <br> <br />
          Password:  <input type="password" name="password"/> <br> <br />
          <input id = "button" type="submit" value="Login">
        </form>


    <footer>

            <br />

            <figure>
              <img id = "csumbLogo" src = "../../templates/img/csumb_logo.png" alt = "CSUMB Logo"/>
              <img id = "buddyVerified" src = "../../templates/img/buddy_verified.png" alt = "Buddy Verified" />
            </figure>


        </footer>
    </body>
    
</html>