<?php
session_start();

include 'inc/Connection.php';
$dbConn = getDatabaseConnection("ottermart");
include 'inc/functions.php';
validateSession();

if (isset($_GET['productId'])) {

  $productInfo = getProductInfo($_GET['productId']);    

}


?>

<!DOCTYPE html>
<html>
    <head>
        <title> Product Info </title>
    </head>
    <body>
    
    <h3><?=$productInfo['productName']?></h3>
     <?=$productInfo['productDescription']?><br>
     <img src='<?=$productInfo['productImage']?>' height='75'/>
 
    </body>
</html>