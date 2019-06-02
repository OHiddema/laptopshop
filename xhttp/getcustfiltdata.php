<?php

include('../application/Db.php');
include('../application/functions.php');

Db::connect('../secret.php');

$obj = json_decode($_POST["x"], false);

echo filterRecords($obj->maxprijs, $obj->minmem);

?>