<?php

include('application/functions.php');
include('application/Db.php');

Db::connect('secret.php');

if(isset($_REQUEST['page'])) {

    $page = $_REQUEST['page'].'.php';

} else $page = 'homepage.php';

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <base href="/laptopshop-1/">
        <script type="text/javascript" src="js/script.js"></script>
    </head>
    <body>
        <?php include('pages/'.$page);?>
    </body>
</html>