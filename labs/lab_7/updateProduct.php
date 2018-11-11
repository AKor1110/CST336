<?php
session_start();

include 'inc/Connection.php';
$dbConn = getDatabaseConnection("ottermart");
include 'inc/functions.php';
validateSession();


if (isset($_GET['updateProduct'])){  //user has submitted update form
    $productName = $_GET['productName'];
    $description = $_GET['description'];
    $price =  $_GET['price'];
    $catId =  $_GET['catId'];
    $image = $_GET['productImage'];
    
    $sql = "UPDATE om_product 
            SET productName= :productName,
               productDescription = :productDescription,
               price = :price,
               catId = :catId,
               productImage = :productImage
            WHERE productId = " . $_GET['productId'];
         
    
}


if (isset($_GET['productId'])) {

  $productInfo = getProductInfo($_GET['productId']);    
  
 // print_r($productInfo);
    
    
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title> Update Products! </title>
        <style>
            body {
                text-align:center;
                background-color: cornflowerblue;
            }
            
        </style>
    </head>
    <body>

        <h1> Updating a Product </h1>
        
        <form>
            <input type="hidden" name="productId" value="<?=$productInfo['productId']?>">
           Product name: <input type="text" name="productName" value="<?=$productInfo['productName']?>"><br><br>
           Description: <textarea name="description" cols="50" rows="4"> <?=$productInfo['productDescription']?> </textarea><br><br>
           Price: <input type="text" name="price" value="<?=$productInfo['price']?>"><br><br>
           Category: 
           <select name="catId">
              <option value="">Select One</option>
              <?php
              
              $categories = getCategories();
              
              foreach ($categories as $category) {
                  
                  echo "<option  "; 
                  echo  ($category['catId']==$productInfo['catId'])?"selected":"";
                  echo " value='".$category['catId']."'>" . $category['catName'] . "</option>";
                  
              }
              
              ?>
           </select> <br /> <br>
           Set Image Url: <input type="text" name="productImage" value="<?=$productInfo['productImage']?>"><br> <br>
           <input type="submit" name="updateProduct" value="Update Product">
        </form>
        
        
    </body>
</html>