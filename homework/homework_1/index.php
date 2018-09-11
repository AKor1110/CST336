<!DOCTYPE html>
<html>

    <head>
      <meta charset = "utf-8">
      <title> Andy's Compiler Design </title>
      <link href = "css/styles.css" rel = "stylesheet" type = "text/css"/>
      <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
      <script src="js/scripts.js"></script>

    </head>
    <body>
        
        <header> Compiler Design </header>
        
        <br /> 
        
        <nav>
            <a href = "index.php" style = "background-color: white; color: cornflowerblue;"> Introduction </a>
            <a href = "lexicalAnalysis.php"> Lexical Analysis </a>
            <a href = "syntaxAnalysis.php"> Syantax Analysis </a>
            <a href = "runtimeEnvironments.php"> Runtime Environments  </a>
            <a href = "resources.php"> Resources </a>
        </nav>
        
        <hr>
        
        <br />

        <div id = "colLeft">
           <h2>What is a compiler?</h2>
           
           <p>
               A <strong>compiler</strong> is a software which converts a program
               written in high level programming languages to a low
               level programming language.
           </p>
           
           <p>
               <strong>High level languages </strong> contain directives such as
               <i>#include</i> and <i>#define.</i> These tags direct the pre-processor
               about what to do on compilation.
           </p>
           
           <p>
               The <strong>pre-processor</strong> performs actions such as file inclusion
               by removing the <i>#include</i> directives, and macro expansion through
               <i>#define</i> directives.
           </p>
           
           <h2>Major Phases of Compilation</h2>
           
           <p>
               <strong>Analysis Phase</strong>
               <ol>
                   <li>Lexical Analyzer</li>
                   <li>Syntax Analyzer</li>
                   <li>Semantic Analyzer</li>
               </ol>
           </p>
           
           <p>
               <strong>Synthesis Phase</strong>
               <ol>
                   <li>Intermediate Code Generator</li>
                   <li>Code Optimizer</li>
                   <li>Code Generator</li>
               </ol>
           </p>
           
        </div>
        
        <div id = "colRight">
            <h2 id = "imgTitle">Phases of a Compiler</h2>
            <img id = "phasesOfCompiler" src = "imgs/compilerDesign.png" alt = "Phases of a Compiler"/>
        </div>
       

        <footer>
            
            <hr>
            <br />
                CST 336 Internet Programming. 2018&copy; Kor <br />
                <strong> Disclaimer: </strong>
                The information in this webpage is fictitous. <br />
                It is used for academic purposes only.
    
                <br />
            
            <figure>
                <img id = "csumbLogo" src = "../../templates/img/csumb_logo.png" alt = "CSUMB Logo"/>
            </figure>

        </footer>

    </body>

</html>
