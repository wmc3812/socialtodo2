<?php
    
    require("../includes/config.php");
    
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        $rows = CS50::query("SELECT name FROM portfolio WHERE user_id = ?", $_SESSION["id"]);
        render("remove_form.php", ["title" => "Remove", "rows" => $rows]);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // error checking
        if (empty($_POST["name"]))
        {
            apologize("Please select a startup to remove.");
        }
        
        
        CS50::query("DELETE FROM portfolio WHERE user_id = ? AND name = ?", $_SESSION["id"], $_POST["name"]);
        
        redirect("/index.php");
    }

?>