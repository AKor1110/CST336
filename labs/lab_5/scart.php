<!DOCTYPE html>

<?php
    session_start();
    include "functions.php";
    
    if (isset($_POST["removeID"])) {
        foreach ($_SESSION["cart"] as $itemKey => $item) {
            if ($item["itemID"] == $_POST["removeID"]) {
                unset($_SESSION["cart"][$itemKey]);
            }   
        }
    }
    
    if (isset($_POST["itemID"])) {
        foreach ($_SESSION["cart"] as &$item) {
            if ($item["itemID"] == $_POST["itemID"]) {
                $item["quantity"] = $_POST["update"];
            }
        }
    }

?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <title>Shopping Cart</title>
    </head>
    <body>
        <div class='container'>
            <div class='text-center'>
                
                <!-- Bootstrap Navagation Bar -->
                <?php includeNavBar(); ?>
                
                <br /> <br /> <br />
                <h2>Shopping Cart</h2>
                <!-- Cart Items -->
                <?php
                    if (isset($_SESSION["cart"])) {
                        displayCart();
                    }
                
                ?>
            </div>
        </div>
    </body>
</html>