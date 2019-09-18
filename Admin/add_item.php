<?php

    require("../Classes/DatabaseHelper.php");
    require("../Classes/Item.php");

    session_start();

    if(!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] === false) {
        echo "You are not logged in";
        exit;
    }


    if($_SERVER["REQUEST_METHOD"] == "POST") {

        $testdb = DatabaseHelper::getInstance();

        $item = new Item(
            null,
            $_POST["name"],
            $_POST["inventory"],
            $_POST["price"],
            $_POST["description"],
            explode(",", $_POST["tags"]),
            isset($_POST["on_sale"]),
            $_POST["category"],
            $_POST["image"]
        );

        $testdb->insert($item);
        // $testdb->selectAll();
    
    }

?>

<html>
    <head>
        <title>Add new item</title>
    </head>

    <body>
        
         <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            Name: <input type="text" name="name"><br>
            Description: <input type="text" name="description"><br>
            Price: <input type="number" name="price"><br>
            Inventory: <input type="number" name="inventory"><br>
            <div><input type="checkbox" id="onsale" name="on_sale"> <label for="onsale">On Sale</label></div><br>
            Tags: <input type="text" name="tags"><br>
            Category: <input type="text" name="category"><br>
            Image: <input type="text" name="image"><br>
            <input type="submit">
        </form>
        
    </body>
</html> 