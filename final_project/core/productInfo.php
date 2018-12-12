<?php
session_start();

include '../inc/Connection.php';
$dbConn = getDatabaseConnection("c9");
include '../inc/functions.php';
validateSession();

if (isset($_GET['songId'])) {

  $productInfo = getProductInfo($_GET['songId'], "song");    

} else if (isset($_GET['albumId'])) {
    $productInfo = getProductInfo($_GET['albumId'], "album");
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title> Product Info </title>
    </head>
    <body>
        
        <?php
            if (isset($_GET['albumId'])) {
        ?>
        
        <h3><?= ucwords($productInfo["albumName"]) ?> </h3>
        <h4><?= ucwords($productInfo["albumArtist"]) ?> </h4>
        <h4><?= ucwords($productInfo["albumGenre"]) ?> </h4>
        <h4>Year: <?= $productInfo["albumYear"]?>, Length: <?= $productInfo["albumDuration"] ?></h4>
        <h4><?= $productInfo["albumNumSongs"] ?> songs! </h4>
        
        <?php
            
            } else {
                
        ?>
        
        <h3><?= ucwords($productInfo["songName"]) ?></h3>
        <h4>Artist: <?= ucwords($productInfo["songArtist"]) ?></h4>
        <h4>Genre: <?= ucwords($productInfo["songGenre"]) ?></h4>
        <h4>Length: <?= $productInfo["songDuration"] ?> </h4>
        
        <?php
            }
        ?>
 
    </body>
</html>