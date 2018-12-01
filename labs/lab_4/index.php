<!DOCTYPE html>

<?php

    
    $background_image = "img/sea.jpg";
    
    if (isset($_GET["keyword"])) {
        include_once "api/pixabayAPI.php";
        $search = $_GET["keyword"];
        
        if (!empty($_GET["category"])) {
            $search = $_GET["category"];
        }
        
        //echo "You searched for:  $search";
        
        $imageURLs = getImageURLs($search, $_GET["layout"]);
        $background_image = $imageURLs[array_rand($imageURLs)];
        
    }
    
    function validForm() {
        if (empty($_GET["keyword"]) && empty($_GET["category"])) {
            echo "<h1> ERROR!!! You must type a keyword or select a category </h1>";
            return false;
        }
        
        return true;
    }
?>
<html>
    <head>
        <title>Image Carousel</title>
        <meta charset = "utf-8">
        <link href = "https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel = "stylesheet">
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
        <style>

            body {
                background-image: url('<?= $background_image ?>');
            }
        </style>
    </head>
    
    <body>
        <br />
        <br />
        
        <form method = "GET">
            <input type = "text" name = "keyword" placeholder = "keyword" value = "<?= $_GET['keyword']; ?>">
            <input type = "radio" id = "lhorizontal" name = "layout" value = "horizontal" <?= ($_GET['layout'] == "horizontal")?" checked":"" ?>>
            <label for = "Horizontal"></label><label for="lhorizontal">Horizontal</label>
            <input type = "radio" id = "lvertical" name = "layout" value = "vertical" <?= ($_GET['layout'] == "vertical")?" checked":"" ?>>
            <label for = "Vertical"></label><label for="lvertical">Vertical</label>
            
            
            <select name = "category">
                <option value = "">Select One</option>
                <option value = "ocean">Sea</option>
                <option value = "forest">Forest</option>
                <option value = "mountain">Mountain</option>
                <option value = "snow">Snow</option>
            </select>
            
            <input type = "submit" value = "Submit" />
            
        </form>
        
        <br />
        <br />
        
        
        
        <?php
            if (isset($imageURLs) && validForm() && !empty($imageURLs)) {
               
        ?>
        
        <div id = "carousel-example-generic" class = "carousel slide" data-ride = "carousel">
            <ol class = "carousel-indicators">
                <?php
                    for ($i = 0; $i < 7; $i++) {
                        echo "<li data-target = '#carousel-example-generic' data-slide-to = '$i'";
                        echo ($i == 0) ? "class ='active'" : "";
                        echo "></li>";
                    }
                ?>
            </ol>
            
            
            <div class = "carousel-inner">
                <?php
                        // Display carousel here
                    for ($i = 0; $i < 7; $i++) {
                            
                        do {
                            $randomIndex = rand(0, count($imageURLs));
                                
                        } while (!isset($imageURLs[$randomIndex]));
                            
                        echo "<div class = 'carousel-item";
                        echo ($i == 0) ? " active" : "";
                        echo "'>";
                        echo "<img src = '" . $imageURLs[$randomIndex] . "'>";
                        echo "</div>";
                        unset($imageURLs[$randomIndex]);
                    }
                ?>
        
            </div>
            
          <a class="carousel-control-prev" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        
        </div>
        
        <?php
            } //endif
            
            else {
                echo "<br /><h1> Enter a Keyword or Select a Category! </h1>";
            }
        ?>
        
        <br />
        <br />
        
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src = "https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    </body>
    
    
</html>