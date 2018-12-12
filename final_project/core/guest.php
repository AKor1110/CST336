<!DOCTYPE html>
<?php
    session_start();
    
?>

<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    	  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>   
    	  
        <title> OtterMusic - Guest </title>
        <style>
            body {
                text-align:center;
                background-color: cornflowerblue;
            }
            
            .error {
                color: red;
            }
        </style>
        
        <script>
            
            function display(c) {
                   $("#form").html("");
                   var val = $(c).val();
                   
                   var elements = [];

                   if (val == "albums") {
                       elements.push("<input id = 'type' type = 'hidden' name = 'type' value = 'albums'>");
                       elements.push("<span> Album Name: </span><input id = 'name' type = 'text' name = 'albumName' value = '<?php echo $_POST['albumName']; ?>'><br/><br/>");
                       elements.push("<span> Album Year: </span><input id = 'year' type = 'number' name = 'albumYear' value = '<?php echo $_POST['albumYear']; ?>'><br/><br/>");
                       elements.push("<span> Album Genre: </span><input id = 'genre' type = 'text' name = 'albumGenre' value = '<?php echo $_POST['albumGenre']; ?>'><br/><br/>");
                       elements.push("<span> Album Artist: </span><input id = 'artist' type = 'text' name = 'albumArtist' value = '<?php echo $_POST['albumGenre']; ?>'><br/><br/>");
                       elements.push("<span> Sort By: </span> <select id = 'sort' name = 'sort'> <option value = ''> Select One </option> <option value = 'albumArtist'>Artist</option> <option value = 'albumGenre'>Genre</option> <option value = 'albumName'>Name</option> <option value = 'albumYear'>Year</option></select><br />");
                       elements.push("<br /><input id = 'submit' type = 'submit' name = 'submit' value = 'Search!'>");
                       
                   } else {
                       elements.push("<input id = 'type' type = 'hidden' name = 'type' value = 'songs'>");
                       elements.push("<span> Song Name: </span><input id = 'name' type = 'text' name = 'songName' value = '<?php echo $_POST['songName'] ?>'><br/><br/>");
                       elements.push("<span> Song Artist: </span><input id = 'artist' type = 'text' name = 'songArtist' value = '<?php echo $_POST['songArtist'] ?>'><br/><br/>");
                       elements.push("<span> Song Genre: </span><input id = 'genre' type = 'text' name = 'songGenre' value = '<?php echo $_POST['songGenre'] ?>'><br/><br/>");
                       elements.push("<span> Sort By: </span> <select id = 'sort' name = 'sort'> <option value = ''> Select One </option> <option value = 'songArtist'>Artist</option> <option value = 'songGenre'>Genre</option> <option value = 'songName'>Name</option></select> <br />");
                       elements.push("<br /><input id = 'submit' type = 'submit' name = 'submit' value = 'Search!'>");
                       
                   }
                   
                   for (var i = elements.length - 1; i >= 0; i--) {
                        $(elements[i]).prependTo("#form");
                    }
            }
        
            $(document).ready(function() {
               $("#option").change(function() {
                   $("#res").html("");
                   display(this);
               });
               
               
            });
        </script>
        
    </head>
    <body>

        <h1> OtterMusic [GUEST] - Main Page </h1>
        
        
        <div>
            Select Data Category:
            <select id = "option">
                <option value = "">Select One</option>
                <option value = "albums">Albums</option>
                <option value = "songs">Songs</option>
            </select>
        </div>
        
        <form action = "../index.php">
            <input type = "submit" value = "Return to Login">
        </form>
        
        <br />
        
        <form id = "form" method = "post">
            
        </form>
        
        <?php
            if (isset($_POST["submit"])) {
            include "../inc/Connection.php";
            $dbConn = getDatabaseConnection("c9");
            
            $type = $_POST["type"];
            
            if ($type == "songs") {
                print_r($_POST);
                
                $songName = $_POST["songName"];
                $songArtist = $_POST["songArtist"];
                $songGenre = $_POST["songGenre"];
                $sortBy = $_POST["sortBy"];
                
                $np = array();
                
                $sql = "SELECT * FROM final_songs WHERE 1";
                
                if (!empty($songName)) {
                    $sql .= " AND songName LIKE :songName";
                    $np[":songName"] = '%' . $songName . '%';
                }
                
                if (!empty($songArtist)) {
                    $sql .= " AND songArtist LIKE :songArtist";
                    $np[":songArtist"] = '%' .$songArtist .'%';
                }
                
                if (!empty($songGenre)) {
                    $sql .= " AND songGenre LIKE :songGenre";
                    $np[":songGenre"] = '%'. $songGenre . '%';
                }
                
                if (!empty($sortBy)) {
                    $sql .= " ORDER BY :sortBy";
                    $np[":sortBy"] = $sortBy;
                }
                
                $stmt = $dbConn->prepare($sql);
                
                if (empty($np)) {
                    $stmt->execute();
                } else {
                    $stmt->execute($np);   
                }
                $record = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                echo "<h1>Search Results: </h1>";
                echo "<div id = 'res'>";
                foreach ($record as $r) {
                    echo "<div id = 'results'>";
                    echo "<h2> Song Name: " . ucwords($r["songName"]) . "</h2>";
                    echo "<h2> Song Artist: " . ucwords($r["songArtist"]) . "</h2>";
                    echo "<h2> Song Genre: " . ucwords($r["songGenre"]) . "</h2>";
                    echo "<h2> Song Duration: " . $r["songDuration"] ."</h2>";
                    echo "</div> <br />";
                }
                echo "</div>";
                
            } else {

                $albumName = $_POST["albumName"];
                $albumArtist = $_POST["albumArtist"];
                $albumGenre = $_POST["albumGenre"];
                $albumYear = $_POST["albumYear"];
                $sortBy = $_POST["sort"];
                
                $np = array();
                
                $sql = "SELECT * FROM final_albums WHERE 1";
                // AND albumYear = :albumYear ORDER BY :sortBy";
                if (!empty($albumName)) {
                    $sql .= " AND albumName LIKE :albumName";
                    $np[":albumName"] = '%' . $albumName . '%';
                }
                
                if (!empty($albumArtist)) {
                    $sql .= " AND albumArtist LIKE :albumArtist";
                    $np[":albumArtist"] = '%' . $albumArtist . '%';
                }
                
                if (!empty($albumGenre)) {
                    $sql .= "  AND albumGenre LIKE :albumGenre";
                    $np[":albumGenre"] = '%' . $albumGenre . '%';
                }
                
                if (!empty($albumYear)) {
                    $sql .= " AND albumYear = :albumYear";
                    $np[":albumYear"] =  $albumYear;
                }
                
                if (!empty($sortBy)) {
                    $sql .= " ORDER BY :sortBy";
                    $np[":sortBy"] = $sortBy;
                }
            
                $stmt = $dbConn->prepare($sql);
                
                if (empty($np)) {
                    $stmt->execute();
                } else {
                    $stmt->execute($np);   
                }
                $record = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                echo "<h1> Search Results: </h1>";
                echo "<div id = 'res'>";
                foreach ($record as $r) {
                    echo "<div id = 'results'>";
                    echo "<h2> Album Name: " . ucwords($r["albumName"]) . "</h2>";
                    echo "<h2> Album Artist: " . ucwords($r["albumArtist"]) . "</h2>";
                    echo "<h2> Album Genre: " . ucwords($r["albumGenre"]) . "</h2>";
                    echo "<h2> Album Year: " . $r["albumYear"] . "</h2>";
                    echo "<h2> Album Duration: " . $r["albumDuration"] ."</h2>";
                    echo "</div> <br />";
                }
                
                echo "</div>";
                
            }
        }
        
        ?>

    <footer>

            <br />

            <figure>
              <!-- <img id = "csumbLogo" src = "../../templates/img/csumb_logo.png" alt = "CSUMB Logo"/> -->
              <!-- <img id = "buddyVerified" src = "../../templates/img/buddy_verified.png" alt = "Buddy Verified" /> -->
            </figure>


        </footer>
    </body>
    
</html>