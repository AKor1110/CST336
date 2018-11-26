<!DOCTYPE html>

<html>
    
    <header>
        <link  href="css/styles.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <style>
            body {
                text-align:center;
                color:purple;
            }
        </style>
    </header>
    
    <body>
        <h2>Holiday Shopping</h2>
        
        <?php
            $shipping = $_GET["orderShipping"];
            $total = $_GET["orderTotal"];
            
            echo "<h2> Thank you for your purchase! Your items will arrive in " . $shipping . "</h2>";
            echo "<h2> Your credit card has been charged $" . $total . ".</h2>";
            
            ?>
    </body>
</html>