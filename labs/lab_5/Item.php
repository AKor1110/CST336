<?php

class Item {
    public $itemName = null;
    public $itemPrice = null;
    public $itemImage = null;
    public $itemID = null;
    
    public function __construct($itemData) {
        $this->itemName = $itemData["name"];
        $this->itemPrice = $itemData["salePrice"];
        $this->itemImage = $itemData["thumbnailImage"];
        $this->itemID = $itemData["itemId"];
    }
    
    public function displayRow() {
        echo "<tr>";
        
        echo "<td><img src = '". $this->itemImage . "'></td>";
        echo "<td><h4>". $this->itemName . "</h4></td>";
        echo "<td><h4>$" . $this->itemPrice . "</h4></td>";
    
        echo "<form method = 'post'>";
        echo "<input type = 'hidden' name = 'itemName' value = '" . json_encode((array) $this) . "'>";
        
        $found = false;
        $quantity = 0;
        
        foreach ($_SESSION["cart"] as $item) {
            if ($item["itemID"] == $this->itemID) {
                $found = true;
                $quantity = $item["quantity"];
                break;
            }   
        }
        
        if ($found) {
            echo "<td><button class = 'btn btn-success'> Added ($quantity) </button></td>"; 
        } else {
            echo "<td><button class = 'btn btn-warning'> Add </button></td>";
        }
        
        echo "</form>";
        
        echo "</tr>";
    }
}

?>