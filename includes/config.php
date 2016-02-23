<?php

    /**
     * config.php
     *
     * Configures app.
     */

    // display errors, warnings, and notices
    ini_set("display_errors", true);
    error_reporting(E_ALL);

    // requirements
    require("helpers.php");

    //Connect to the database
    $host = "127.0.0.1";
    $user = "wmc3812";                     
    $pass = "";                                  
    $db = "userinfo";                                  
    $port = 3306;                                
    
    $con = mysqli_connect($host, $user, $pass, $db, $port)or die(mysql_error());

    /*
    // require authentication for all pages except /login.php, /logout.php, /register.php, and /home.php
    if (!in_array($_SERVER["PHP_SELF"], ["/login.php", "/logout.php", "/register.php", "/home.php", "/about.php", "/howto.php"]))
    {
        if (empty($_SESSION["id"]))
        {
            redirect("home.php");
        }
    }
    */
?>
