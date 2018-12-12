<?php
session_start();

include '../inc/Connection.php';
$dbConn = getDatabaseConnection("c9");
include '../inc/functions.php';
validateSession();


if (isset($_GET['updateRecord'])){  //user has submitted update form
    $namedParameters = array();
    
    if (isset($_GET['albumId'])) {
        $albumName = $_GET["albumName"];
        $albumYear = $_GET["albumYear"];
        $albumArtist = $_GET["albumArtist"];
        $albumGenre = $_GET["albumGenre"];
        $albumNumSongs = $_GET["albumNumSongs"];
        $albumDuration = $_GET["albumDuration"];
        
        $namedParameters[":albumName"] = $albumName;
        $namedParameters[":albumYear"] = $albumYear;
        $namedParameters[":albumArtist"] = $albumArtist;
        $namedParameters[":albumGenre"] = $albumGenre;
        $namedParameters[":albumNumSongs"] = $albumNumSongs;
        $namedParameters[":albumDuration"] = $albumDuration;
        
        $sql = "UPDATE final_albums SET albumName = :albumName, 
                                        albumYear = :albumYear,
                                        albumArtist = :albumArtist,
                                        albumGenre = :albumGenre,
                                        albumNumSongs = :albumNumSongs,
                                        albumDuration = :albumDuration 
                WHERE id = " . $_GET['productId'];
        
    } else {
        $songName = $_GET["songName"];
        $songArtist = $_GET["songArtist"];
        $songGenre = $_GET["songGenre"];
        $songDuration = $_GET["songDuration"];
        
        $namedParameters[":songName"] = $songName;
        $namedParameters[":songArtist"] = $songArtist;
        $namedParameters[":songGenre"] = $songGenre;
        $namedParameters[":songDuration"] = $songDuration;
        
        
        $sql = "UPDATE final_songs SET songName = :songName,
                                       songArtist = :songArtist,
                                       songGenre = :songGenre,
                                       songDuration = :songDuration
                WHERE id = " . $_GET['productId'];
        
    }
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($namedParameters);
    header("Location: admin.php");
}


if (isset($_GET['albumId'])) {
  $productInfo = getProductInfo($_GET["albumId"], "album");    
} else {
  $productInfo = getProductInfo($_GET["songId"], "song");
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Update Songs/Albums! </title>
        <style>
            body {
                text-align:center;
                background-color: cornflowerblue;
            }
            
        </style>
    </head>
    <body>

        <h1> Updating a Song or Album </h1>
        
        <?php
            if (isset($_GET['songId'])) {
                
            
        ?>
        
        <form>
            <input type="hidden" name="productId" value="<?=$productInfo['id']?>">
            Song Name: <input type = 'text' name = 'songName' value = "<?= $productInfo["songName"] ?>"> <br /><br />
            Song Artist: <input type = 'text' name = 'songArtist' value = "<?= $productInfo["songArtist"] ?>"> <br /><br />
            Song Genre: <input type = 'text' name = 'songGenre' value = "<?= $productInfo["songGenre"] ?>"> <br /><br />
            Song Duration: <input type = 'text' name = 'songDuration' value = "<?= $productInfo["songDuration"] ?>"> <br /><br />
            <input type="submit" name="updateRecord" value="Update Record">
        </form>
        
        <?php
        
            } else {
        ?>
        
        <form>
            <input type="hidden" name="productId" value="<?=$productInfo['id']?>">
            Album Name: <input type = 'text' name = 'albumName' value = "<?= $productInfo['albumName'] ?>"> <br /><br />
            Album Year: <input type = 'number' name = 'albumYear' value = "<?= $productInfo['albumYear'] ?>"> <br /><br />
            Album Artist: <input type = 'text' name = 'albumArtist' value = "<?= $productInfo['albumArtist'] ?>"> <br /><br />
            Album Genre: <input type = 'text' name = 'albumGenre' value = "<?= $productInfo['albumGenre'] ?>"> <br /><br />
            Album Number of Songs: <input type = 'number' name = 'albumNumSongs' min = '1' value = "<?= $productInfo['albumNumSongs'] ?>"> <br /><br />
            Album Duration: <input type = 'text' name = 'albumDuration' value = "<?= $productInfo['albumDuration'] ?>"> <br /><br />
            <input type="submit" name="updateRecord" value="Update Record">
        </form>
        
        <?php
            }
        ?>
        
        
    </body>
</html>