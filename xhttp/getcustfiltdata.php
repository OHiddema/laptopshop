<?php

include('../application/Db.php');

Db::connect('../secret.php');

header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false);

?>