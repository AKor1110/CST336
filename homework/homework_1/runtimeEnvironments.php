<!DOCTYPE html>
<html>

    <head>
      <meta charset = "utf-8">
      <title> Compiler Design: Syntax Analysis </title>
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
            <a href = "syntaxAnalysis.php"> Syantax Analysis </a>
            <a href = "runtimeEnvironments.php" style = "background-color: white; color: cornflowerblue;"> Runtime Environments </a>
            <a href = "resources.php"> Resources </a>
        </nav>
        
        <hr>
        <br />
        
        <div id = "colLeft">
            <h2> What is a runtime environment? </h2>
            
            <p>
                <strong><u>Runtime environment</u></strong> is a state of the target machine
                which may include software libraries, environment variables, etc., to 
                provide services to the processes running in the system.
            </p>
            
            <p>
                The runtime support system is similar to a package in that it is generated
                with the executable program itself and manages the communication between the
                process and runtime environment. The support system also takes care of memory
                allocation and deallocation while the program is being executed.
            </p>
            
            <br />
            
            <p>
                <img src = "imgs/heap_allocation.png" alt = "Heap Allocation"/>
            </p>
        </div>
        
        <div id = "colRight">
            <h2> Activation Tree </h2>
        
            <p>
                When a program is ran, we assume that the program control flows in
                a sequential manner and every called procedure receives a procedure's
                controls. After executing a called procedure, it returns the control
                back to the caller. It is easy to visualize this control flow in a
                representation of a tree, an <strong><u>activation tree</u></strong>.
            </p>
                
            <br />
            
            <p>
                <img src = "imgs/activationTree.png" alt = "Activation tree"/>
            </p>
        </div>
        
        <br />

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