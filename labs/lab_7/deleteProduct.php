<?php
session_start();

include 'inc/Connection.php';
$dbConn = getDatabaseConnection("ottermart");
include 'inc/functions.php';
validateSession();

$sql = "DELETE FROM om_product WHERE productId = " . $_GET['productId'];
$stmt=$dbConn->prepare($sql);
$stmt->execute();

header("Location: admin.php");



?>