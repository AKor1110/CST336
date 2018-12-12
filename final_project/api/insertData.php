<?php

include "../inc/Connection.php";

$dbConn = getDatabaseConnection("c9");

$dataType = ($_POST["submitEntry"] == "Add Album!" ? "album" : "song");

if ($dataType == "song") {
    $values = "(NULL, '" . strtolower($_POST["songName"]) . "', '" . strtolower($_POST["songArtist"]) . "', '" . strtolower($_POST["songGenre"]) . "', '" .
                    strtolower($_POST["songDuration"]) . "');";
    
    $sql = "INSERT INTO `final_songs` (`id`, `songName`, `songArtist`, `songGenre`, `songDuration`) VALUES " . $values;
    
} else if ($dataType == "album") {
    $values = "(NULL, '" . strtolower($_POST["albumName"]) . "', '" . $_POST["albumYear"] . "', '" . strtolower($_POST["albumArtist"]) . "', '" .
                     strtolower($_POST["albumGenre"]) . "', '" . $_POST["albumNumSongs"] . "', '" . $_POST["albumDuration"] . "');";
                     
    $sql = "INSERT INTO `final_albums` (`id`, `albumName`, `albumYear`, `albumArtist`, `albumGenre`, `albumNumSongs`, `albumDuration`) VALUES " .
            $values;
}


$stmt = $dbConn->prepare($sql);
$stmt->execute();

header("Location: ../core/admin.php");

?>