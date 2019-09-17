<?php

    require_once("../Classes/DatabaseHelperTEST.php");
    require_once("../Classes/UserHelper.php");


    $test1 = DatabaseHelperTEST::getInstance();

    var_dump($test1);

    $test = UserHelper::getInstance();

    var_dump($test);

    echo $test1 === $test;

    $test->testThing();


?>