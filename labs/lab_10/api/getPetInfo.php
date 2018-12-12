<?php

include "../inc/Connection.php";

sleep(1);

$dbConn = getDatabaseConnection("c9");

$petId = $_GET["petid"];
$sql = "SELECT * FROM pets WHERE id = $petId";

$stmt = $dbConn->prepare($sql);
$stmt->execute();

$records = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($records);

?>