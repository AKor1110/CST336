<!DOCTYPE html>

<?php
    include "Connection.php";
    $conn = getDatabaseConnection("c9");
    
    
    function displayCategories() {
        global $conn;
        $sql = "SELECT DISTINCT category FROM p1_quotes ORDER BY category";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($records as $record) {
            echo "<option value = '" .$record['category']  . "'" . ((isset($_POST["category"]) && !empty($_POST["category"]) && $_POST["category"] == $record["category"]) ? "selected" : "") . "> " . $record['category'] . "</option>";
        }
    }

?>

<html>
    <header>
        <title> Quote Finder</title>

        <style>
            body {
                text-align:center;
            }
            
            .error {
                color:red;
            }
            
            .inputTitle {
                font-size: 30px;
            }
            
        </style>
    </header>
    
    
    <body>
        <div id = "pageTitle"><h1> Famous Quote Finder</h1></div>
        <hr>
        <br />
        
        <form method = "post">
            <span class = "inputTitle">Enter Quote Keyword: </span>
            <input type = "text" name = "keyword" value = "<?php echo (isset($_POST["keyword"]) && !empty($_POST["keyword"]) ? $_POST["keyword"] : ""); ?>"/>
            
            <br />
            <br />
            
            <span class = "inputTitle">Category: </span>
            <select name = 'category'>
            <option value = "">Select One</option>
            <?= displayCategories() ?>
            </select>
            
            <br />
            <br />
            
            <span class = "inputTitle">Order</span> <br />
            <input type = "radio" name = "order" value = "asc" <?php echo (isset($_POST["order"]) && !empty($_POST["order"]) && $_POST["order"] == "asc" ? "checked" : ""); ?>> A-Z </input> <br />
            <input type = "radio" name = "order" value = "des" <?php echo (isset($_POST["order"]) && !empty($_POST["order"]) && $_POST["order"] == "des" ? "checked" : ""); ?>> Z-A </input> <br />
            
            <br />
            
            <input type = "submit" value = "Display Quotes!">
            
        </form>
        
        <hr>
        
        <?php
            
            if (isset($_POST) && !empty($_POST)) {
                $keyword = null;
                $category = null;
                $order = null;
                
                if (isset($_POST["keyword"]) && !empty($_POST["keyword"])) {
                    $keyword = $_POST["keyword"];
                } else {
                    echo "<h2 class = 'error'> You must enter a keyword! </h2>";
                }
                
                if (isset($_POST["category"]) && !empty($_POST["category"])) {
                    $category = $_POST["category"];
                } else {
                    echo "<h2 class = 'error'> You must select a category! </h2>";
                }
                
                if (isset($_POST["order"]) && !empty($_POST["order"])) {
                    $order = $_POST["order"];
                } else {
                    echo "<h2 class = 'error'> You must specify an order! </h2>";
                }
                
                if ($keyword && $category && $order) {
                    global $conn;
                    
                    $namedParameters = array();
                    $sql = "SELECT * FROM p1_quotes WHERE quote LIKE :keyword OR category = :category ORDER BY quote ";
                    
                    $namedParameters[":keyword"] = "%$keyword%";
                    $namedParameters[":category"] = "%$category%";
                    
                    $sql .= ($order == "asc" ? "ASC" : "DESC");
                    
                    $stmt = $conn->prepare($sql);
                    $stmt->execute($namedParameters);
                    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    
                    if (empty($results)) {
                        echo "<h2 class = 'error'> Sorry! No results for keyword: " . $keyword . " and category: " . $category . "</h2>";
                    } else {
                        foreach ($results as $result) {
                            echo $result["quote"] . " ";
                            echo "<i>(" . $result["author"] . ")</i> <br /><br />";
                        }    
                    }
                    
                    
                    
                }
            }
        
        
        ?>
        
        
    
    </body>
    
    
    
    
</html>