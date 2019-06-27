<?php
    session_start();
    if(isset($_REQUEST['page'])) {
        $page = $_REQUEST['page'];
    } else $page = 'homepage.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
                <a href="?page=homepage.php" style='text-decoration:none'>Laptopshop</a></br><br>
                <?php
                    if(isset($_SESSION['logged_in_user_name'])) {
                        echo "Logged in user: ".$_SESSION['logged_in_user_name'];
                    } else echo "No customer logged in";
                ?>
            </div>
        </header>
        <?php include($page);?>
    </body>
</html>