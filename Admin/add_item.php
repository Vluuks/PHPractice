<?php

    require("../Classes/DatabaseHelper.php");
    require("../Classes/Item.php");

    echo("test");

    echo isset($_POST["on_sale"]);

    $testdb = DatabaseHelper::getInstance();

    $item = new Item(
        null,
        $_POST["name"],
        $_POST["inventory"],
        $_POST["price"],
        $_POST["description"],
        array($_POST["tags"]),
        isset($_POST["on_sale"]),
        $_POST["category"],
        $_POST["image"]
    );

    var_dump($item);

    $testdb->insert($item);
    $testdb->selectAll();

?>