<?php

include "Connection.php";

$conn = getDatabaseConnection("ottermart");

$productId = $_GET["productId"];

$sql = "SELECT * FROM om_product NATURAL JOIN om_purchase WHERE productId = :pId";

$np = array();
$np[":pId"] = $productId;

$stmt = $conn->prepare($sql);
$stmt->execute($np);
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (empty($records)) {
    echo "<h3> Sorry. No purchase history for this item. </h3>.";
} else {
    echo $records[0]["productName"] . "<br />";
    echo "<img src = '" . $records[0]["productImage"] . "' width = '200' /><br />";
    
    foreach ($records as $record) {
        echo "Purchase Date: " . $record["purchaseDate"] . "<br />";
        echo "Unit Price: " . $record["unitPrice"] . "<br />";
        echo "Quantity: " . $record["quantity"] . "<br />";
    }   
}



?>