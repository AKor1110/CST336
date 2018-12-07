<?php

include "Connection.php";

$dbConn = getDatabaseConnection("c9");
$rating = $_GET["rating"];

$sql = "INSERT INTO `p11_ratings` (`id`, `rating`) VALUES (NULL, '" . $rating . "');";

$stmt = $dbConn->prepare($sql);
$stmt->execute();

echo "success";
?>