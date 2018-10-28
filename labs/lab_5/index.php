<!DOCTYPE html>

<?php
    session_start();
    
    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = array();
    }
    
    if (isset($_POST["itemName"])) {

        $newItem = json_decode($_POST["itemName"], TRUE);
        $found = false;
        
        foreach ($_SESSION["cart"] as &$item) {
            if ($item["itemName"] == $newItem["itemName"]) {
                $item["quantity"] += 1;
                $found = true;
            }   
        }
        
        
        if (!$found) {
            $newItem["quantity"] = 1;
            array_push($_SESSION["cart"], $newItem);
        }
    }
    
    include "functions.php";
    
    if (isset($_GET["query"])) {
        include "wmapi.php";
        $query = $_GET["query"];
        $items = getProducts($query);
    }
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <title>Products Page</title>
    </head>
    <body>
    <div class='container'>
        <div class='text-center'>
            
            <!-- Bootstrap Navagation Bar -->
            <?php includeNavBar(); ?>
            <br /> <br /> <br />
            
            <!-- Search Form -->
            <form enctype="text/plain">
                <div class="form-group">
                    <label for="pName">Product Name</label>
                    <input type="text" class="form-control" name="query" id="pName" placeholder="Name">
                </div>
                <input type="submit" value="Submit" class="btn btn-default">
                <br /><br />
            </form>
            
            <!-- Display Search Results -->
            <?php displayResults(); ?>
        </div>
    </div>
    </body>
</html>