<?php

include "Connection.php";

$dbConn = getDatabaseConnection("ottermart");
$namedParameters = array();
$namedParameters[":username"] = $_GET["username"];
$sql = "SELECT * FROM om_admin WHERE 1 and username = :username";
$stmt = $dbConn->prepare($sql);
$stmt->execute($namedParameters);
$records = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode($records, JSON_NUMERIC_CHECK);
?>