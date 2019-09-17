<?php

    require("../Classes/DatabaseHelper.php");
    require("../Classes/Item.php");

    $testdb = DatabaseHelper::getInstance();

    // echo explo/de($_POST("tags"));

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
    $testdb->selectAll();

?>