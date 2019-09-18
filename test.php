<?php
// Display greeting message

    require_once("Classes/DatabaseHelper.php");
    require_once("Classes/Types.php");

    // echo "Hello, world!";

    $testdb = DatabaseHelper::getInstance();

    // $testdb->insert(new Item(null, "Bloemp", 300, 450, "nu met bolletjes", null, true, "Pokemon"));
    // $tags = array("test tag", "waarom is dit zo raar");
    // $testdb->insert(new Item(null, "Test", 200, 640, "een baby dobbel", $tags, null, "nature", null));

    $testdb->selectAll(Types::Item);

?>