<!DOCTYPE html>
<html>

<head>
    <title> RPS </title>
    <style type="text/css">
        body {
            background-color: black;
            color: white;
            text-align: center;
        }

        .row {
            display: flex;
            justify-content: center;
        }

        .col {
            text-align: center;
            margin: 0 70px;
        }

        .matchWinner {
            background-color: yellow;
            margin: 0 70px;
        }

        #finalWinner {
            margin: 0 auto;
            width: 500px;
            text-align: center;
        }
        
        hr {
            width:33%;
        }        
    </style>
</head>

<body>

    <?php
    
        include "inc/functions.php";
        
        echo '<h1> Rock, Paper, Scissors </h1>';
        
        generateRow();
        play();
        
    
    ?>
    
    Images source: https://www.kisspng.com/png-rockpaperscissors-game-money-4410819/
</body>

</html>
