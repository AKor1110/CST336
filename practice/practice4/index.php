<!DOCTYPE html>
<html>
    <header>
        <title>Aces vs Kings</title>
        
        <style>
            th {
                width: 82px;
                height: 106px;
            }
            
            body {
                text-align: center;
            }
            
            table, th, tr {
                border: 1px solid black;
            }
            
            
        </style>
    </header>
    
    <body>
                <?php

$rows = $_POST["rows"];
$cols = $_POST["cols"];
$omit = $_POST["card"];

if ($rows * $cols > 39) {
    echo "<script> document.body.innerhtml = ''; </script>";
    echo "<h2> The product of columns and rows must no exceed 39! </h2>";
    exit();
}

echo "<h2>Aces vs Kings</h2>";

$cards = array();

$dirs = array(
    "clubs",
    "diamonds",
    "hearts",
    "spades"
);

shuffle($dirs);

$u = 10;
foreach ($dirs as $suit) {
    if ($suit != $omit) {
        for ($i = 1; $i <= 13; $i++) {
            $thing = "./cards/" . $suit . "/" . $i . ".png";
            array_push($cards, array(
                $thing,
                $i * $u
            ));
        }
    }
    $u *= 10;
}

shuffle($cards);

$newCards = array();

for ($i = 0; $i < $rows * $cols; $i++) {
    array_push($newCards, $cards[$i]);
}

sort($newCards);


for ($i = 0; $i < $rows * $cols; $i++) {
    for ($j = 0; $j < $rows * $cols - $i - 1; $j++) {
        if ($newCards[$j][1] > $newCards[$j + 1][1]) {
            $temp             = $newCards[$j];
            $newCards[$j]     = $newCards[$j + 1];
            $newCards[$j + 1] = $temp;
        }
    }
}


$aces  = 0;
$kings = 0;

echo "<table align ='center'>";

$k = 0;

for ($i = 0; $i < $rows; $i++) {
    echo "<tr>";
    
    for ($j = 0; $j < $cols; $j++) {
        $cur = $newCards[$k][0];
        if (strpos($cur, "1.png") && !strpos($cur, "11.png")) {
            echo "<th style = 'background-color:yellow;'>";
            $aces++;
        }
        
        else if (strpos($cur, "13.png")) {
            echo "<th style = 'background-color:cyan;'>";
            $kings++;
        } else {
            echo "<th>";
        }
        echo "<img src = '" . $newCards[$k][0] . "'/>";
        echo "</th>";
        $k++;
    }
    
    echo "</tr>";
}

    echo "</table>";
    
    
    echo "<br />";
    echo "<div id = 'nums'>";
    echo "Number of Aces: " . $aces;
    echo "<br />";
    echo "Number of Kings: " . $kings;
    echo "<br />";
    echo "<br />";
    echo "</div>";
    
    if ($kings > $aces) {
        echo "<h2> Kings Win! </h2>";
    } else if ($aces > $kings) {
        echo "<h2> Aces Win! </h2>";
    } else {
        echo "<h2> Tie - No winner </h2>";
    }
?>
                   
        <form action = "index.php" method = "post">
            Number of Rows: <input type = "text" name = "rows"><br /><br />
            Number of Columns: <input type = "text" name = "cols"><br /><br />
            Suit to omit: 
            <select name = "card">
                <option value = "clubs">Clubs</option>
                <option value = "diamonds">Diamonds</option>
                <option value = "hearts">Hearts</option>
                <option value = "spades">Spades</option>
            </select>
            
            <input type = "submit" value = "Submit"/>
        </form>
    </body>
    
    
</html>