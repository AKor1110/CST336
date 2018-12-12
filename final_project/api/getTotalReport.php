<?php

include "../inc/Connection.php";

$dbConn = getDatabaseConnection("c9");

$sql = "SELECT COUNT(DISTINCT(songArtist)) as num FROM final_songs";

$stmt = $dbConn->prepare($sql);
$stmt->execute();

$records = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode($records);

?>