<?php

$host = "localhost";
$dbname = "ottermart";
$username = "root";
$password = "";

$dbConn = new PDO("mysql:host=$host;dbname = $dbname", $username, $password);
$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$sql = "";
$stmt = $dbConn->prepare($sql);
$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>