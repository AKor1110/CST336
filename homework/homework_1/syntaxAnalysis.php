<!DOCTYPE html>
<html>

    <head>
      <meta charset = "utf-8">
      <title> Compiler Design: Syntax Directed Translation </title>
      <link href = "css/styles.css" rel = "stylesheet" type = "text/css"/>
      <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
      <script src="js/scripts.js"></script>

    </head>
    <body>
        
        <header> Compiler Design </header>
        <br />
        
        
        <nav>
            <a href = "index.php"> Introduction </a>
            <a href = "lexicalAnalysis.php"> Lexical Analysis </a>
            <a href = "syntaxAnalysis.php" style = "background-color: white; color: cornflowerblue;"> Syantax Analysis </a>
            <a href = "runtimeEnvironments.php"> Runtime Environments  </a>
            <a href = "resources.php"> Resources </a>
        </nav>
        
        <hr>

        <h2>How do you analyze syntax?</h2>
        <p>
            <strong> <u>Syntax Analysis</u></strong> is done after lexical analysis, and 
            verifies if the syntactical structure of the input is correct or not.
        </p>
        
        <p>
            A compiler analyzes syntax by building a data structure called a 
            Parse tree or Syntax tree. The tree utilizes the predefined grammar
            of a language. <strong> If the given input can be created with the
            use of a syntax tree, then the input is found to have the correct syntax.</strong>
        </p>
        
        <br />
        
        <iframe width="560" height="315" src="https://www.youtube.com/embed/TkRy17gnq3E" frameborder = "0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        
        <footer>
        
            <hr>
                CST 336 Internet Programming. 2018&copy; Kor <br />
                <strong> Disclaimer: </strong>
                The information in this webpage is fictitous. <br />
                It is used for academic purposes only.
    
                <br />
            <figure>
                <img id = "csumbLogo" src = "../../templates/img/csumb_logo.png" alt = "CSUMB Logo"/>
                <img id = "buddyVerified" src = "../../templates/img/buddy_verified.png" alt = "Buddy Verified" />
            </figure>

        </footer>

    </body>

</html>