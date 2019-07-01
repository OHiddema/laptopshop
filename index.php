<?php
    session_start();

    require_once('connect.php');
    require_once('mod_functions.php');

    if(isset($_REQUEST['page'])) {
        $page = $_REQUEST['page'];
    } else $page = 'homepage.php';

    //blocking all pages except $legalPages when not logged in
    $legalPages = array('homepage.php', 'register.php', 'login.php', 'checklogin.php', 'adduser.php');
    if (!in_array($page, $legalPages) && !isset($_SESSION['logged_in_user_name'])) {
        // redirect to homepage
        $page = '?page=homepage.php&login=false';
        $host  = $_SERVER['HTTP_HOST'];
        $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        echo "<script>window.location = 'http://$host$uri/$page' ;</script>";
        exit;        
    }

    function alert($string){
        return "<script>alert('".$string."');</script>";
    }

    if(isset($_REQUEST['login'])) {
        echo alert("U bent niet ingelogd!");
    }
    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="https://kit.fontawesome.com/4f88f2fc60.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <style>
            body {
                margin: 8px;
            }
        </style>
    </head>
    <body>
        <header>
            <div class='myflex'>
                <a href="?page=homepage.php" style='text-decoration:none'>Laptopshop</a>

                <?php
                if(isset($_SESSION['logged_in_user_name'])) {

                    $size = getBasketSize($conn);
                    if ($size==0) {
                       echo "<p>Your basket is empty!</p>";
                    } else {
                        echo "<a href='?page=basket.php'><i class='fas fa-shopping-cart fa-lg'>($size)</a></i>";
                    }
                    echo "<p>";
                    echo "Logged in user: ".$_SESSION['logged_in_user_name'];
                    echo "&nbsp;<a href='?page=logout.php'>Logout</a>";
                    echo "</p>";
                    } else echo "No customer logged in";
                ?>
            </div>
        </header>
        <?php include($page);?>
    </body>
</html>