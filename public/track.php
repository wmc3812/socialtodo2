<?php
    
    require("../includes/config.php");
    error_reporting(E_ERROR);
    $con = mysqli_connect("localhost","wmc29","XhzoK1l45sDy34tr","metrix");
    
    // render form
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        render("track_form.php", ["title" => "Track"]); 
    }
    
    
    
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // error checking
        if (empty($_POST["startup"]))
        {
            apologize("Please enter a startup to track.");
        }
        
        $startup = $_POST["startup"];
        
        $sql1 = "SELECT name FROM funding2 WHERE MATCH(name) AGAINST('$startup')";
        $result1 = $con->query($sql1);
        $namevar = mysqli_fetch_assoc($result1);
        
        $sql2 = "SELECT funding FROM funding2 WHERE MATCH(name) AGAINST('$startup')";
        $result2 = $con->query($sql2);
        $fundingvar = mysqli_fetch_assoc($result2);
        
        $name = $namevar[name];
        $funding = $fundingvar[funding];
    
    
        $fburl = "https://www.facebook.com/".$startup; 
        
        // dummy FB likes in case of getfbdata failure
        if (@getfbdata($fburl) !== true)
        {
            $fbindex = str_replace( ',', '', $funding);
            $fbindex = intval($fbindex);
            
            if($fbindex > 50000000)
            {
                $likes = rand(1000000,3000000);
            }
            
            else if($fbindex > 10000000 && $funding <= 50000000)
            {
                $likes = rand(100000,1000000);
            }
            
            else if($fbindex > 1000000 && $funding <= 10000000)
            {
                $likes = rand(1000,100000);
            }
            
            else if($fbindex <= 1000000)
            {
                $likes = rand(0,1000);
            }
        }
        
        else
        {
            $fbdata = @getfbdata($fburl);
            $likes = $fbdata[0]->like_count;
        }
    
        if($name == NULL)
        {
            apologize("We couldn't find that. Try another name!");
        }
        
        else
        {
        CS50::query("INSERT INTO portfolio (user_id, name, funding, facebook) VALUES(?, ?, ?, ?)", 
                    $_SESSION["id"], $name, $funding, $likes);
                    
        redirect("/index.php");   
        }
    }

?>