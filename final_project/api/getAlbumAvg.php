<?php

function convert($time) {
    $time = explode(":", $time);
    
    $mins = $time[0] * 60;
    $secs = ltrim($time[1], "0");
    
    return $mins + $secs;
}

include "../inc/Connection.php";

$dbConn = getDatabaseConnection("c9");

$sql = "SELECT * FROM final_albums";

$stmt = $dbConn->prepare($sql);

$stmt->execute();

$records = $stmt->fetchAll(PDO::FETCH_ASSOC);

$totalSecs = 0;

foreach ($records as $record) {
    $totalSecs += convert($record["albumDuration"]);
}

$res = array();
$mins = number_format($totalSecs / count($records) / 60, 2);
$secs = $totalSecs / count($records) % 60;
$res["avg"] = $mins . ":" . $secs;


echo json_encode($res);

?>