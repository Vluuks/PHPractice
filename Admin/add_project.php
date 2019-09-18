<?php

    require_once("../Classes/DatabaseHelper.php");
    require_once("../Classes/Project.php");

    session_start();

    if(!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] === false) {
        echo "You are not logged in";
        exit;
    }


    if($_SERVER["REQUEST_METHOD"] == "POST") {

        $testdb = DatabaseHelper::getInstance();

        $project = new Project(
            null,
            $_POST["name"],
            $_POST["description"],
            explode(",", $_POST["tags"]),
            $_POST["category"],
            $_POST["image"]
        );

        $testdb->insertProject($project);
    
    }

?>

<html>
    <head>
        <title>Add new project</title>
    </head>

    <body>
        
         <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            Name: <input type="text" name="name"><br>
            Description: <input type="text" name="description"><br>
            Tags: <input type="text" name="tags"><br>
            Category: <input type="text" name="category"><br>
            Image: <input type="text" name="image"><br>
            <input type="submit">
        </form>
        
    </body>
</html> 