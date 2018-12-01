<?php

function carousel() {
    $dir = new DirectoryIterator("../lab_10/img/");
    $imgs = array();
    
    foreach ($dir as $file) {
        if ($file != "loading.gif" && $file != "." && $file != "..") {
            $imgs[] = "../lab_10/img/" . $file;
        }
    }
    
    echo '<div id = "carousel-example-generic" class = "carousel slide" data-ride = "carousel">';
            echo '<ol class = "carousel-indicators">';
                for ($i = 0; $i < count($imgs); $i++) {
                    echo "<li data-target = '#carousel-example-generic' data-slide-to = '$i'";
                    echo ($i == 0) ? "class ='active'" : "";
                    echo "></li>";
                }
            echo '</ol>';
            
            
            echo '<div class = "carousel-inner">';
                for ($i = 0; $i < count($imgs); $i++) {
                    echo "<div class = 'carousel-item";
                    echo ($i == 0) ? " active" : "";
                    echo "'>";
                    echo "<img src = '" . $imgs[$i]  . "'>";
                    echo "</div>";
                }
        
            echo '</div>';
            
            echo '<a class="carousel-control-prev" href="#carousel-example-generic" data-slide="prev">
              <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#carousel-example-generic" data-slide="next">
              <span class="carousel-control-next-icon"></span>
            </a>';
        echo '</div>';
}

?>