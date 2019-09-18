<?php

    require_once("../Classes/DatabaseHelper.php");
    require_once("../Classes/User.php");

    // If already logged in
    session_start();

    echo "salsfafaf";
    echo isset($_SESSION["logged_in"]);

    if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true) {
        echo "You are already logged in";
        exit;
    }

    // Upon submission
    if($_SERVER["REQUEST_METHOD"] == "POST") {
    
        // Check if username is empty
        if(empty(trim($_POST["username"])) || empty(trim($_POST["password"]))) {
            echo "Please enter a username and a password.";
        } 
        else {
            $username = trim($_POST["username"]);
            $password = trim($_POST["password"]);

            $db_helper = DatabaseHelper::getInstance();
            $user = $db_helper->verifyUser($username, $password);

            if($user != null) {
                session_start();
                $_SESSION["logged_in"] = true;
                $_SESSION["id"] = $user->id;
                $_SESSION["username"] = $user->username;  
            }
        
        }
    }


?>


<html>
    <body>
        <div>
            <h2>Log in</h2>
            <p>blabnlalablbllasa.</p>
            
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