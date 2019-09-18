<?php

    require_once("../Classes/DatabaseHelper");

    // If already logged in
    session_start();
    if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true) {
        echo "You are already logged in";
        exit;
    }

    // Upon submission
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    
        // Check if username is empty
        if(empty(trim($_POST["username"]))){
            echo "Please enter a username.";
        } else{
            $username = trim($_POST["username"]);
        }
        
        // Check if password is empty
        else if(empty(trim($_POST["password"]))){
            echo "Please enter a password.";
        } else{
            $password = trim($_POST["password"]);
        }
        
        // Contains data
        else {
        
        }
    }


?>