<?php
// Display greeting message

    require("DatabaseHelper.php");
    require("Item.php");

    echo "Hello, world!";

    $testdb = DatabaseHelper::getInstance();

    $testdb->insert(new Item("Kakuro", 300, "een grote knoep"));
    $testdb->insert(new Item("Vluuks", 300, "de kleinste knoep"));

    $testdb->selectAll();

?>