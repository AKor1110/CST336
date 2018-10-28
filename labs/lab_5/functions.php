<?php

include "Item.php";

function includeNavBar() {
    $count = displayCartCount();
    echo "<nav class='navbar navbar-default - navbar-fixed-top'>
                <div class='container-fluid'>
                    <div class='navbar-header'>
                        <a class='navbar-brand' href='#'>Shopping Land</a>
                    </div>
                    <ul class='nav navbar-nav'>
                        <li><a href='index.php'>Home</a></li>
                        <li><a href='scart.php'>
                        <span class = 'glyphicon glyphicon-shopping-cart' aria-hidden = 'true'></span>
                        Cart: $count </a></li>
                    </ul>
                </div>
            </nav>";
}

function displayResults() {
    global $items;
    
    if (isset($items) && !empty($items)) {
        $results = 0;
        
        echo "<table class = 'table' >";
        
        foreach ($items as $_item) {
            if ($results > 14) break;
            $item = new Item($_item);
            $item->displayRow();
            $results++;
        }
        
        echo "</table>";
    }
}

function displayCart() {
    if (isset($_SESSION["cart"])) {

        echo "<table class = 'table'>";
        
        foreach ($_SESSION["cart"] as $item) {
            echo "<tr>";
            
            echo "<td><img src = '" . $item["itemImage"] . "'></td>";
            echo "<td><h4>" . $item["itemName"] . "</h4></td>";
            echo "<td><h4>$" . $item["itemPrice"] . "</h4></td>";
            
            echo "<form method = 'post'>";
            echo "<input type = 'hidden' name = 'itemID' value = '" . $item["itemID"] . "'>";
            echo "<td><input type = 'text' name = 'update' class = 'form-control' placeHolder = '" . $item["quantity"] . "'></td>";
            echo "</form>";
            
            echo "<form method = 'post'>";
            echo "<input type = 'hidden' name = 'removeID' value = '" . $item["itemID"] . "'>";
            echo "<td><button class = 'btn btn-danger'> Remove </button></td>";
            echo "</form>";
            
            echo "</tr>";
        }
        
        echo "</table>";
    }
}

function displayCartCount() {
    $count = 0;
    
    foreach ($_SESSION["cart"] as $item) {
        $count += $item["quantity"];   
    }
    return $count;
}



?>