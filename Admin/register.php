<?php

    require_once("../Classes/DatabaseHelper.php");

    if($_SERVER["REQUEST_METHOD"] == "POST") {

        // Obtain and validate input

        if(empty(trim($_POST["username"])) || empty(trim($_POST["password"]))) {
            echo "Please enter a username and a password.";
            exit;
        }


        // Cleanup
        $username = trim($_POST["username"]);
        $password = password_hash(trim($_POST["password"]), PASSWORD_DEFAULT);


        // Check for username availability
        // TODO

        // Actual insert
        $db_helper = DatabaseHelper::getInstance();
        $db_helper->addUser($username, $password);

    }
?>

<html>
    <body>
        <div>
            <h2>Sign Up</h2>
            <p>Please fill this form to create an account.</p>
            
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                    <label>Username</label>
                    <input type="text" name="username" class="form-control" value="">

                    <label>Password</label>
                    <input type="password" name="password" class="form-control" value="">

                    <input type="submit" class="btn btn-primary" value="Submit">
            </form>
        </div>    
    </body>
</html>