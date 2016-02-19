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
        
        // add entered login info to SQL table 
        $insert = "INSERT INTO logininfo (username, pass) VALUES('$_POST[username]', '$_POST[password]')";
        $result = mysqli_query($con, $insert);
         
        // store the entered info and log the user in    
        $rows = "SELECT LAST_INSERT_ID() AS id";
        $id = $rows[0]["id"];
        $_SESSION["id"] = $id;
        redirect("/index.php");
    }
?>