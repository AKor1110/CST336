<!DOCTYPE html>

<html>
    
    <head>
        <meta charset = "utf-8">
        <link href = "css/styles.css" rel = "stylesheet" type = "text/css"/>
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="js/scripts.js"></script>
        <title> Andy's Binary String Generator</title>
    </head>
    
    <body>
        <header>Random 8-bit Binary String Generator</header>
        
        <hr>
        
        <br />
        
        <h4> Hover over each digit to see their decimal value at that position!</h4>
        
        <?php
            include "inc/functions.php";
            $binaryStr = main();
        
            $dec = binToDec($binaryStr);
            $hex = binToHex($binaryStr);
            $ones = binToOnes($binaryStr);
            $twos = binToTwos($binaryStr);
            $str = binaryStrtoStr($binaryStr);
            
            echo "<div id = conversions>";
            displayDec($dec);
            displayHex($hex);
            displayOnes($ones);
            displayTwos($twos);
            echo "</div>";
            
            //writeToFile($str, $dec, $hex, $ones, $twos);
        ?>
        
        <div id = "regenerate">
            <form id = "resubmit" input = "submit">
                <input id = "regen" type = "submit" value = "Regenerate String" />
            </form>
        </div>
        

        <!--<a href = "./binaryInfo.txt" download>-->
        <!--    <button id = "download" type = "button"> Download Binary Information</button>-->
        <!--</a>-->
        
        <footer>
            <hr>
            <br />
                CST 336 Internet Programming. 2018&copy; Kor <br />
                <strong> Disclaimer: </strong>
                The information in this webpage is used for academic purposes only. <br />
                <br />
            
            <figure>
                <img id = "csumbLogo" src = "../../templates/img/csumb_logo.png" alt = "CSUMB Logo"/>
                <!-- <img id = "buddyVerified" src = "../../templates/img/buddy_verified.png" alt = "Buddy Verified" /> -->
            </figure>
            
        </footer>
    </body>
    
    
    
</html>