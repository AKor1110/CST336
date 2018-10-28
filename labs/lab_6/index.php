<?php

include "Connection.php";
$conn = getDatabaseConnection("ottermart");

function displayCategories() {
    global $conn;
    
    $sql = "SELECT catId, catName from om_category ORDER BY catName";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    print_r(json_encode($records, JSON_NUMERIC_CHECK));
    
    foreach ($records as $record) {
        echo "<option value = '" . $record["catId"] . "'>" . $record["catName"]  . "</option>";
    }
}

function displaySearchResults() {
    global $conn;
    
    if (isset($_GET["searchForm"]) && !empty($_GET["searchForm"])) {

        $namedParameters = array();
        $sql = "SELECT * FROM om_product WHERE 1";
        
        if (!empty($_GET["product"])) {
            $sql .= " AND productName LIKE :productName OR productDescription LIKE :productName";
            $namedParameters[":productName"] = "%" . $_GET["product"] . "%";
        }
        
        if (!empty($_GET["category"])) {
            $sql .= " AND catId = :categoryId";
            $namedParameters[":categoryId"] = $_GET["category"];
        }
        
        if (!empty($_GET["priceFrom"])) {
            $sql .= " AND price >= :priceFrom";
            $namedParameters[":priceFrom"] = $_GET["priceFrom"];
        }
        
        if (!empty($_GET["priceTo"])) {
            $sql .= " AND price <= :priceTo";
            $namedParameters[":priceTo"] = $_GET["priceTo"];
        }
        
        if (isset($_GET["orderBy"])) {
            if ($_GET["orderBy"] == "price") {
                $sql .= " ORDER BY price";
            } else {
                $sql .= " ORDER BY productName";
            }
        }
        
        $stmt = $conn->prepare($sql);
        $stmt->execute($namedParameters);
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        if (empty($records)) {
            echo "<h3> Sorry. No results available. </h3>";
        } else {
            echo "<h3> Products Found: </h3>";
            
            foreach ($records as $record) {
                echo "<a href = \"purchaseHistory.php?productId=" . $record["productId"] . "\"> History </a>";
                echo $record["productName"] . " " .$record["productDescription"] . " $" . $record["price"] . "<br /><br />";
            }
        }
        
        
    }
}

?>

<!DOCTYPE html>


<html>
    <header>
        <title>
            Ottermart Product Search
        </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="styles.css" type="text/css" />
    </header>
    
    <body>
        <div>
            <h1> Ottermart Product Search </h1>
            <form>
                Product: <input type = "text" name = "product" />
                
                <br />
                <br />
                
                Category:
                <select name = "category">
                    <option value = "" >Select One</option>
                    <?= displayCategories() ?>
                    
                </select>
                
                <br />
                <br />
                
                Price: From <input type = "text" name = "priceFrom" size = "7" />
                       To <input type = "text" name = "priceTo" size = "7" />
                
                <br />
                <br />
                
                Order result by:
                <br />
                <input type = "radio" name = "orderBy" value = "price" /> Price <br />
                <input type = "radio" name = "orderBy" value = "name" /> Name <br />
                
                <br /> <br />
                <input type = "submit" value = "Submit" name = "searchForm" />
            
            </form>
            <br />
        
        </div>
        
        <hr>
        
        <?= displaySearchResults() ?>
    </body>
    
</html>