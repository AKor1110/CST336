<?php

include "Connection.php";

$dbConn = getDatabaseConnection("c9");

$sql = "SELECT COUNT(*) as `count`, AVG(`rating`) as `average` FROM p11_ratings";

$stmt = $dbConn->prepare($sql);
$stmt->execute();

$records = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode($records);
?>