<!DOCTYPE html>

<style>
.nav>li>a:hover,
.nav>li>a:focus {
    text-decoration: none;
    background-color: #560000;
}
</style>



<html>

    <head>

        <!-- http://getbootstrap.com/ -->
        <link href="/css/bootstrap.min.css" rel="stylesheet"/>

        <link href="/css/styles.css" rel="stylesheet"/>

        <?php if (isset($title)): ?>
            <title>Metrix: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>Metrix</title>
        <?php endif ?>

        <!-- https://jquery.com/ -->
        <script src="/js/jquery-1.11.3.min.js"></script>

        <!-- http://getbootstrap.com/ -->
        <script src="/js/bootstrap.min.js"></script>

        <script src="/js/scripts.js"></script>

    </head>

    <body>

        <div class="layer">
            <div class="container">
                <div id="top">
                    <a class="logo" href="/"> 
                    <img alt="Metrix" height="55" src="/img/Metrix Logo.png" width="200"> 
                    </a>
                </div>
                
                <div id="nav">
                    
                    <?php if (empty($_SESSION["id"])): ?>
                        <ul class="nav nav-pills">
                            <li><a href="about.php">About</a></li>
                            <li><a href="howto.php">How To</a></li>
                            <li><a href="login.php">Login</a></li>
                        </ul>
                    <?php endif ?>
                    
                    <?php if (!empty($_SESSION["id"])): ?>
                        <ul class="nav nav-pills">
                            <li><a href="about.php">About</a></li>
                            <li><a href="howto.php">How To</a></li>
                            <li><a href="track.php">Track</a></li>
                            <li><a href="remove.php">Remove</a></li>
                            <li><a href="logout.php">Log Out</a></li>
                        </ul>
                    <?php endif ?>
                </div>
            </div>
        </div>    
        
    </body>
 
 </html>