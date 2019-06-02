<?php

include('application/functions.php');
include('application/Db.php');

Db::connect('secret.php');

if(isset($_REQUEST['page'])) {

    $page = $_REQUEST['page'];

} else $page = 'homepage';

$title = 'Laptopshop';

$titles = [
    'addpage' => 'Add laptop',
    'addrecord' => 'Add laptop results',
    'customer' => 'Find your laptop',
    'delete' => 'Laptop deletion',
    'editpage' => 'Update laptop',
    'updaterecord' => 'Laptop update results',
    'viewall' => 'All laptops'
];

if(array_key_exists($page, $titles)) {

    $title .= ' | '.$titles[$page];

}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <base href="/laptopshop-1/">
        <link rel="stylesheet" type="text/css" href="css/styles.css" />
        <script type="text/javascript" src="js/script.js"></script>
        <title><?=$title;?></title>
    </head>
    <body>
        <?php include('pages/'.$page.'.php');?>
    </body>
</html>