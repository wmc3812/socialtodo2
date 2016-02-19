<?php

    // configuration
    require("../includes/config.php"); 

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("login_form.php", ["title" => "Log In"]);
    }
    
    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["username"]))
        {
            apologize("You must provide your username.");
        }
        else if (empty($_POST["password"]))
        {
            apologize("You must provide your password.");
        }

        $sql = "SELECT * FROM logininfo WHERE username = '$_POST[username]' AND pass = '$_POST[password]'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        if(!empty($row['username']) AND !empty($row['pass'])) 
        { 
            $_SESSION['username'] = $row['pass']; 
            redirect("tasks.php");
        }
        
        else 
        {
            // else apologize
            echo 'Unnsuccessful login';
            apologize("Invalid username and/or password.");
        }
    }
?>