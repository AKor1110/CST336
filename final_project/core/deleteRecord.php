<?php

include "../inc/Connection.php";

$dbConn = getDatabaseConnection("c9");

if (isset($_GET["songId"])) {
    $id = $_GET["songId"];
    
    $sql = "DELETE FROM final_songs WHERE id = '$id'";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
}

if (isset($_GET["albumId"])) {
    $id = $_GET["albumId"];
    
    $sql = "DELETE FROM final_albums WHERE id = '$id'";
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
}

header("Location: admin.php");


?>