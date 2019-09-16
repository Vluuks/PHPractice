<?php
// Display greeting message

    require("DatabaseHelper.php");
    require("Item.php");

    // echo "Hello, world!";

    $testdb = DatabaseHelper::getInstance();

    // $testdb->insert(new Item(null, "Bloemp", 300, 450, "nu met bolletjes", null, true, "Pokemon"));
    $tags = array("test tag", "ref?");
    $testdb->insert(new Item(null, "Dot", 200, 640, "een baby dobbel", $tags, null, null));

    $testdb->selectAll();

?>