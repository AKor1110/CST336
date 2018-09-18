<!DOCTYPE html>
<html>

    <head>
      <meta charset = "utf-8">
      <title> Compiler Design: Lexical Analysis </title>
      <link href = "css/styles.css" rel = "stylesheet" type = "text/css"/>
      <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
      <script src="js/scripts.js"></script>

    </head>
    <body>
        
        <header> Compiler Design </header>
        <br />
        
        <nav>
            <a href = "index.php"> Introduction </a>
            <a href = "lexicalAnalysis.php" style = "background-color: white; color: cornflowerblue;"> Lexical Analysis </a>
            <a href = "syntaxAnalysis.php"> Syntax Analysis </a>
            <a href = "runtimeEnvironments.php"> Runtime Environments  </a>
            <a href = "resources.php"> Resources </a>
        </nav>
        
        <hr>
        <br />
        
        <div id = "colLeft">
           <h2 id = "imgTitle">Flow of Lexical Analysis</h2>
           <img id = "lexicalAnalysis" src = "imgs/lexicalAnalysis.png" alt = "Lexical Analysis"/>
           
        </div>
        
        <div id = "colRight">
            <h2>Tokens</h2>
           
           <p>
               <strong><u>Tokens</u></strong> are strings of characters that can be organized
               as units of grammar of the programming language.
           </p>
           
           <h2>Example of Tokens</h2>
           
           <p>
               <ul>
                   <li> Alphabetic tokens (keywords): <i>while, for, if, etc. </i></li>
                   <li> Punctuation tokens: <i> void, return, etc. </i></li>
                   <li> Type tokens: <i> id, number, real, etc. </i></li>
               </ul>
           </p>
           
           <h2> How a Lexical Analyzer Functions</h2>
           <p>
               <ol>
                   <li>Tokenization</li>
                   <li>Remove white space characters</li>
                   <li>Remove comments</li>
                   <li>Generation of error messages through coordinates</li>
               </ol>
           </p>
           
           <h2> Example Process </h2>
           
           <p>
               Consider the program: <br />
               
               <div id = "codeExample">
                   <!-- Can use code tag to format code -->
                   int main() { <br />
                   &nbsp;&nbsp; int a, b; <br />
                   &nbsp;&nbsp; a = 10; <br />
                   &nbsp;&nbsp; return 0; <br />
                    } <br />
                    
                   <br />
               </div>
               
               <div id = "validTokens">
               <h3> All valid tokens:</h3>
                   <ul>
                       <li>int</li>
                       <li>main</li>
                       <li>(</li>
                       <li>)</li>
                       <li>{</li>
                       <li>}</li>
                       <li>a</li>
                       <li>b</li>
                       <li>,</li>
                       <li>;</li>
                       <li>=</li>
                       <li>return</li>
                   </ul>
               </div>
           </p>
           
           
        </div>
        

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