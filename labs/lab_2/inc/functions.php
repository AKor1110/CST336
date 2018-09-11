<?php

function displaySymbol($i, $pos) {
    $imgs = array("seven", "cherry", "lemon", "orange");
    $img = $imgs[$i];

    echo "<img id = 'reel$pos' src = 'img/$img.png' alt = '$img' title = '" . ucfirst($img) . "' width = '70' />";
}

function displayPoints($slot1, $slot2, $slot3) {
    echo "<div id = 'output'>";
    
    if ($slot1 == $slot2 && $slot2 == $slot3) {
        switch ($slot1) {
            case 0: {
                $totalPoints = 1000;
                echo "<h1> Jackpot! </h1>";
                echo "<audio autoplay> <source src = 'audio/win.mp3' type = 'audio/mpeg'> </audio>";
                break;
            } 
            
            case 1: {
                $totalPoints = 500;
                break;
                
            }
            
            case 2: {
                $totalPoints = 250;
                break;
                
            }
            
            case 3: {
                $totalPoints = 900;
                break;
            }
        }
        
        echo "<h2> You won $totalPoints points! </h2>";
    } else {
        echo "<h3> Try again! </h3>";
    }
    
    echo "</div>";
    
}


function play() {

    for ($i = 1; $i < 4; $i++) {
        ${"randomValue" . $i } = rand(0, 3);
        displaySymbol(${"randomValue" . $i}, $i);
    }
    
    
    
    displayPoints($randomValue1, $randomValue2, $randomValue3);
    
    
}

?>