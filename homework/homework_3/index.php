<!DOCTYPE html>

<?php
    include "core/functions.php";
    include "core/Password.php";
?>

<html>
    <header>
        <title>Password Generator</title>
        <style type="text/css">
            @import url("css/styles.css");
        </style>
        
        <script>
            function copy() {
              var copyText = document.getElementById("finalPass");
              copyText.select();
              document.execCommand("copy");
              alert("Copied the text: " + copyText.value);
            }
        </script>
    </header>
    
    
    <body>
        <h1>Andy's Password Generator</h1>
        
        <form id = "getPass" method = "post">
            <span class = "inputText">Password Size:</span> <input id = "passSize" type = "number" name = "passSize" value = "<?php echo (empty($_POST["passSize"]) ? "6" : $_POST["passSize"]); ?>" min = "6" max = "30">
            <br />
            <br />
            
            <span class = "inputText">Keyword:</span> <input id = "keyword" type = "text" name = "passKeyword" value = "<?php echo (!empty($_POST["passKeyword"]) ? $_POST["passKeyword"] : " "); ?>">
            <br />
            <br />
            
            <span class = "inputText">Includes:</span> <br />
            <input type = "checkbox" name= "alphanumeric[]" value= "numbers" <?php if (in_array("numbers", $_POST['alphanumeric'])) echo "checked='checked'"; ?>>
            <span class = "inputText"> Numbers [0-9] </span> <br />
            
            <input type = "checkbox" name= "alphanumeric[]" value= "symbols" <?php if (in_array("symbols", $_POST['alphanumeric'])) echo "checked='checked'"; ?>>
            <span class = "inputText"> Symbols [#, $, %, etc.] </span> <br />
            
            <input type = "checkbox" name= "alphanumeric[]" value= "caps" <?php if (in_array("caps", $_POST['alphanumeric'])) echo "checked='checked'"; ?>>
            <span class = "inputText"> Capital Characters </span> <br /><br />
            
            <input id = "submitButton" type = "submit" name = "submit" value = "Submit">
        </form>
        
        <br />
        
        <?php
            if (isset($_POST) && !empty($_POST)) {
                // Password Size
                if (!empty($_POST["passSize"])) {
                    $passSize = $_POST["passSize"];
                } else {
                    $passSize = null;
                    echo "<h2> You must enter a password size! </h2>";
                }
                
                // Keyword
                if (!empty($_POST["passKeyword"])) {
                    $passKeyword = $_POST["passKeyword"];
                } else {
                    $passKeyword = null;
                    echo "<h2> You must enter a keyword! </h2>";
                }
                
                // Numbers, Symbols, and Caps
                if (!empty($_POST["alphanumeric"])) {
                    $alphas = $_POST["alphanumeric"];
                    // this should be an array w checkbox vals
                } else {
                    $alphas = null;
                    echo "<h2> You must check at least one box! </h2>";
                }
                
                if ($passKeyword != null && $alphas != null) {
                    if ($passSize < strlen($passKeyword)) {
                        echo "<h2> Password size is smaller than keyword! </h2>";
                    } else {
                        $passObj = new Password($alphas, $passKeyword, $passSize);
                        $password = $passObj->generatePassword();
                        echo "<textarea id = 'finalPass' readonly>" . $password . "</textarea>";
                        echo "<br />";
                        echo "<br />";
                        echo "<button id = 'copyButton' onclick = 'copy()'> Copy! </button>";
                    }
                }
            }
        
        ?>
        
        
        
        
        
        <!-- Footer -->
        
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