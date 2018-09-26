<?php

include 'inc/charts.php';
$posters = array("ready_player_one","rampage","paddington_2","hereditary","alpha","black_panther","christopher_robin","coco","dunkirk","first_man");

function min($array, $i, $j) {
    return ($array[$i][0] < $array[$j][0] ? $i : $j);
}

function swap(&$array, $i, $j) {
    $temp = $array[$i];
    $array[$i] = $array[$j];
    $array[$j] = $temp;
}

function selectionSort($array) {
    for ($i = 0; $i < count($array) - 1; $i++) {
        $min = $i;
        for ($j = $i + 1; $j < count($array); $j++) {
            $min = min($array, $j, $min);
        }
        
        swap($array, $i, $min);
    
    }
    return $array;
}

function getPosters() {
    $allPosters = array();
    
    global $posters;
    $visited = array();
    
    for ($i = 0; $i < 4; $i++) {
        $randomPoster = $posters[rand(0,count($posters)-1)];
        while (in_array($randomPoster, $visited)) {
            $randomPoster = $posters[rand(0,count($posters)-1)];   
        }
        
        
        $og = $randomPoster;
        
        $randomPoster = explode("_", $randomPoster);
        $res = "";
        
        foreach ($randomPoster as $s) {
            if ($s != "_") {
                $res = $res . ucfirst($s) . " ";
            }
        }
        
        $allPosters[] = array($res, $og);
        $visited[] = $og;
    }
    
    return $allPosters;
}

function movieReviews($poster) {
    
    $res = $poster[0];
    $path = $poster[1];

    echo "<div class='poster'>";
    echo "<h2>" . $res . "</h2>";
    echo "<img width='100' src='img/posters/$path.jpg'>";    
    echo "<br>";
    
    //NOTE: $totalReviews must be a random number between 100 and 300
    $totalReviews = 200; 
    
    //NOTE: $ratings is an array of 1-star, 2-star, 3-star, and 4-star rating percentages
    //      The sum of rating percentages MUST be 100
    
    $n1 = rand(0, 25);
    $n2 = rand(0, 25);
    $n3 = rand(0, 25);
    $n4 = 100 - $n1 - $n2 - $n3;
    
    $ratings = array($n1, $n2, $n3, $n4);
    
    //NOTE: displayRatings() displays the ratings bar chart and
    //      returns the overall average rating
    $totalReviews = rand(100, 300);
    $overallRating = round(displayRatings($totalReviews, $ratings));
    echo "<br>";
    
    for ($i = 0; $i < $overallRating; ++$i) {
        echo "<img src='img/star.png' width='25'>";
    }
    //NOTE: The number of stars should be the rounded value of $overallRating

    echo "<br>Total reviews: $totalReviews";
    echo "</div>";
    
    sort($ratings);
    return $ratings;
}    

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Movie Reviews </title>
        <style type="text/css">
            body {
                text-align:center;
                background-image: url("img/bg.jpg");
                color: white;
            }
            #main {
                display:flex;
                justify-content: center;
            }
            .poster {
                padding: 0 10px;
            }
        </style>
    </head>
    <body>
       
       <h1> Movie Reviews </h1>
        <div id="main">
           <?php
             //NOTE: Add for loop to display 4 movie reviews
             $posters = getPosters();
             
             selectionSort($posters);
             
             $res = array();
             $maxRatings = 0;
             
             for ($i = 0; $i < 4; $i++) {
                 $reviews = movieReviews($posters[$i])[3];
                 
                 if ($reviews > $maxRatings) {
                     $maxRatings = $reviews;
                     $res = $posters[$i];
                 }
             }
           
        echo "</div>";
        echo "<br/>";
        echo "<hr>";
        echo "<h1>Based on ratings you should watch:</h1>";
       
        echo "<br />";
        
        echo "<div class='poster'>";
        echo "<h2>" . $res[0] . "</h2>";
        echo "<img width='100' src='img/posters/" . $res[1] . ".jpg'>";    
        echo "<br>";
       
         ?>
       
    </body>
</html>