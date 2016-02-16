<?php

    // configuration
    require("../includes/config.php"); 


    // access SQL table
    $rows = CS50::query("SELECT * FROM portfolio WHERE user_id = ?", $_SESSION["id"]);

    $trackers = [];
    foreach ($rows as $row)
    {
        $trackers[] = [
        "name" => $row["name"],
        "funding" => $row["funding"],
        "facebook" => $row["facebook"]
        ];
    }
    
    // render portfolio
    render("portfolio.php", ["trackers" => $trackers, "title" => "portfolio"]);
?>