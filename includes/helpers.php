<?php

    /**
     * helpers.php
     *
     * Computer Science 50
     * Problem Set 7
     *
     * Helper functions.
     */

    require_once("config.php");

    /**
     * Apologizes to user with message.
     */
    function apologize($message)
    {
        render("apology.php", ["message" => $message]);
    }

    /**
     * Facilitates debugging by dumping contents of argument(s)
     * to browser.
     */
    function dump()
    {
        $arguments = func_get_args();
        require("../views/dump.php");
        exit;
    }

    /**
     * Logs out current user, if any.  Based on Example #1 at
     * http://us.php.net/manual/en/function.session-destroy.php.
     */
    function logout()
    {
        // unset any session variables
        $_SESSION = [];

        // expire cookie
        if (!empty($_COOKIE[session_name()]))
        {
            setcookie(session_name(), "", time() - 42000);
        }

        // destroy session
        session_destroy();
    }

   

    /**
     * Redirects user to location, which can be a URL or
     * a relative path on the local host.
     *
     * http://stackoverflow.com/a/25643550/5156190
     *
     * Because this function outputs an HTTP header, it
     * must be called before caller outputs any HTML.
     */
    function redirect($location)
    {
        if (headers_sent($file, $line))
        {
            trigger_error("HTTP headers already sent at {$file}:{$line}", E_USER_ERROR);
        }
        header("Location: {$location}");
        exit;
    }

    /**
     * Renders view, passing in values.
     */
    function render($view, $values = [])
    {
        // if view exists, render it
        if (file_exists("../views/{$view}"))
        {
            // extract variables into local scope
            extract($values);

            // render view (between header and footer)
            require("../views/header.php");
            require("../views/{$view}");
            require("../views/footer.php");
            exit;
        }

        // else err
        else
        {
            trigger_error("Invalid view: {$view}", E_USER_ERROR);
        }
    }
    
    // functional FB like function that stopped working because of network problems(?)
    function getfbdata($url)
    {   
        $fql  = "SELECT share_count, like_count, comment_count FROM link_stat WHERE url = '$url'";

        $fqlURL = "https://api.facebook.com/method/fql.query?format=json&query=" . urlencode($fql);
        
        $response = file_get_contents($fqlURL);
        
        return json_decode($response);
        
        return true;
    }
    
    
    // former Crunchbase function used before I was blocked from Crunchbase access
    function crunchdata($org)
    {
        $API_key = "b7c39ed660638cefe0f9b8fca64eae97";
        
        //$url = "http://api.crunchbase.com/v/3/organization/?name=".$org."&user_key=".$API_key;
        
        $url = "https://api.crunchbase.com/v/3/odm/odm.json.tar.gz?user_key=[$API_key]";
        
        /*
        $ch = curl_init($url); // add your url which contains json file
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $content = curl_exec($ch);
        curl_close($ch);
        $json = json_decode($content);
        */
    
        /*
        $url = "https://api.crunchbase.com/v/3/organization/".$org."?user_key=".$APIkey."";
        $contents = file_get_contents($url);
        $data = json_decode($contents, true);
        return $data;
        */
    }

?>
