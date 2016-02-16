<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("register_form.php", ["title" => "Register"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // error checking for bad entries
        if (empty($_POST["username"]))
        {
            apologize("You must enter a username!");
        }
        
        else if (empty($_POST["password"]))
        {
            apologize("You must enter a password!");
        }
        
        else if ($_POST["password"] != $_POST["confirmation"])
        {
            apologize("The password and confirmation don't match!");
        }
        
        else if (CS50::query("SELECT * FROM users WHERE username = ?", $_POST["username"]))
        {
            apologize("This username is taken.");
        }
        
        // add entered login info to SQL table with starting cash amount
        $user = CS50::query("INSERT IGNORE INTO users (username, hash) VALUES(?, ?)", $_POST["username"], password_hash($_POST["password"], PASSWORD_DEFAULT));
            
        // store the entered info and log the user in    
        $rows = CS50::query("SELECT LAST_INSERT_ID() AS id");
        $id = $rows[0]["id"];
        $_SESSION["id"] = $id;
        redirect("/index.php");
    }
?>