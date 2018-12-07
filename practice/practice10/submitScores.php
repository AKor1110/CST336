<?php
include "Connection.php";


$userId = $_POST["userId"];
$score = $_POST["score"];
$dbConn = getDatabaseConnection("c9");

$sql = "INSERT INTO `p10_scores` (`id`, `userId`, `score`) VALUES (NULL, '" . $userId . "', '" . $score . "');";

$stmt = $dbConn->prepare($sql);
$stmt->execute();

$namedParameters = array();
$namedParameters[":userId"] = $userId;
$sql2 = "SELECT COUNT('*') as 'times', AVG('score') as 'average' FROM p10_scores WHERE userId = :userId";

$stmt = $dbConn->prepare($sql2);
$stmt->execute($namedParameters);

$records = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($records);

?>