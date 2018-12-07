<!DOCTYPE html>

<html>
    <header>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        
        <title>Login</title>
        <link  href="css/styles.css" rel="stylesheet" type="text/css" />
        
    
    
    <body>
        <h1>Login</h1>
        <h2>Credentials required before submiting form.</h2>
        <p>You can log in using usernames <strong>user_1</strong> or <strong>user_2</strong>. The password is <strong>s3cr3t</strong>.</p>
        <form method="post" action="verifyUser.php">
            <input type="text" id="username" name="username" placeholder="Username"/><br />
            <input type="password" id="password" name="password" placeholder="Password" /><br />
            <input type="submit" name="submit" value="Login"/>
        </form>
        
    </body>
</html>