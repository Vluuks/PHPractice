<?php
// Display greeting message

    require("DatabaseHelper.php");
    require("Item.php");

    echo "Hello, world!";

    $testdb = DatabaseHelper::getInstance();

    $testdb->insert(new Item(null, "Bloemp", 300, "nu met bolletjes"));
    $testdb->insert(new Item(null, "Ranja", 300, "mooi oranje!!"));

    $testdb->selectAll();

?>