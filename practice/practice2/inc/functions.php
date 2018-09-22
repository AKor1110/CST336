<?php

function generateRow() {
    // Displays the first row displaying Player 1 and Player 2.
    echo '<div class="row">';
    
    for ($i = 1; $i < 3; $i++) {
        echo '<div class="col">';
        echo '<h2>Player ' . $i . '</h2>';
        echo '</div>';
    }
    
    echo '</div>';
}

function winner($p1, $p2) {
    // 0 = paper, 1 = rock, 2 = scissors
    if ($p1 == 0) {
        // If player 1 is paper, player 2 picks rock then p1 wins, 
        // otherwise p2 wins because scissors > paper.
        return ($p2 == 1 ? "p1" : "p2");
        
    } else if ($p1 == 1) {
        // If player 1 is rock, player 2 picks paper then p2 wins,
        // otherwise p1 wins because rock > scissors.
        return ($p2 == 0 ? "p2" : "p1");
        
    } else if ($p1 == 2) {
        // If player 1 is scissors, player 2 picks paper then p1 wins,
        // otherwise p2 wins because rock > scissors.
        return ($p2 == 0 ? "p1" : "p2");
    }
}

function finalWinner($rounds) {
    // Takes in the rounds array and counts who got more points, displays that winner.
    $p1 = 0;
    $p2 = 0;
    
    for ($i = 0; $i < count($rounds); $i++) {
        $p1 += ($rounds[$i] == "p1" ? 1 : 0);
        $p2 += ($rounds[$i] == "p2" ? 1 : 0);
    }
    
    echo '<div id="finalWinner">';
    echo '<h1> The winner is Player ' . ($p1 > $p2 ? "1" : "2") . '</h2>';
    echo '</div>';
}

function displayRow($win, $p1, $p2) {
    // Takes in the winner and each players' image index and displays them appropriately.
    $ops = array(
        "img/paper.png",
        "img/rock.png",
        "img/scissors.png"
    );
    
    $alt = array(
        "paper",
        "rock",
        "scissors"
    );
    
    echo '<div class="row">';
    echo "<div class = 'col" . ($win == "p1" ? ", matchWinner" : "") . "'><img src = '" . $ops[$p1] . "' alt='" . $alt[$p1] . "' width = '150'></div>";
    echo "<div class = 'col" . ($win == "p2" ? ", matchWinner" : "") . "'><img src = '" . $ops[$p2] . "' alt='" . $alt[$p2] . "' width = '150'></div>";
    echo '</div>';
    echo '<hr>';
}

function getMoves() {
    // Generate initial moves, keep changing until they're different.
    $moves = array(
        rand(0, 2),
        rand(0, 2)
    );
    
    while ($moves[0] == $moves[1]) {
        $moves[0] = rand(0, 2);
        $moves[1] = rand(0, 2);
    }
    
    return $moves;
}

function play() {
    // Keeps track of each round.
    $rounds = array();
    // "p1", "p2", "p1" = p1 overall winner
    
    for ($i = 0; $i < 3; $i++) {
        // Generate the players' moves.
        $moves = getMoves();
        $p1    = $moves[0];
        $p2    = $moves[1];
        
        // Determine the winner and add that to an array to keep track of rounds.
        $win      = winner($p1, $p2);
        $rounds[] = $win;
        
        // Display each row based on winners.
        displayRow($win, $p1, $p2);
    }
    
    finalWinner($rounds);
}

?>