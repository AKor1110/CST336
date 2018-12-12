<?php

function validateSession() {
    return 0;
}

function displayAllSongs() {
    global $dbConn;
    
    $sql = "SELECT * FROM final_songs ORDER BY songName";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo "<div id = 'songList'>";
    echo "<h2> SONGS: </h2>";
    foreach ($records as $record) {
        echo "<a class='btn btn-primary' role='button' href='updateRecord.php?songId=".$record['id']."'>Update</a>  ";
        echo "<form action='deleteRecord.php' onsubmit='return confirmDelete()'>";
        echo "   <input type='hidden' name='songId' value='".$record['id']."'> ";
        echo "   <button class='btn btn-outline-danger' type='submit'>Delete</button>";
        echo "</form>";
        
        echo " [<a 
        
        onclick='openModal()' target='productModal'
        href='productInfo.php?songId=".$record['id']."'>" . ucwords($record['songName']) ."</a>]  ";
        echo " - " . ucwords($record['songArtist'])  . "<br><br>";
    }
    
    echo "</div>";
    
}

function displayAllAlbums() {
    global $dbConn;
    
    $sql = "SELECT * FROM final_albums ORDER BY albumName";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo "<div id = 'albumList'>";
    echo "<h2> ALBUMS: </h2>";
    foreach ($records as $record) {
        echo "<a class='btn btn-primary' role='button' href='updateRecord.php?albumId=".$record['id']."'>Update</a>  ";
        echo "<form action='deleteRecord.php' onsubmit='return confirmDelete()'>";
        echo "   <input type='hidden' name='albumId' value='".$record['id']."'> ";
        echo "   <button class='btn btn-outline-danger' type='submit'>Delete</button>";
        echo "</form>";
        
        echo " [<a 
        
        onclick='openModal()' target='productModal'
        href='productInfo.php?albumId=".$record['id']."'>" . ucwords($record['albumName']) ."</a>]  ";
        echo " - " . ucwords($record['albumArtist'])  . "<br><br>";
    }
    
    echo "</div>";
    
}

function getProductInfo($productId, $type) {
    global $dbConn;
    
    if ($type == "song") {
        $sql = "SELECT * FROM final_songs WHERE id = $productId";   
    } else {
        $sql = "SELECT * FROM final_albums WHERE id = $productId";
    }
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC); //we're expecting multiple records   
    //print_r($record);
    
    return $record;
}

?>