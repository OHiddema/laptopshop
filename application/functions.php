<?php

function allRecords() {

    $records = [];

    $conn = Db::instance();
    $sql = "SELECT * FROM laptops";
    $query = $conn->query($sql);

    while ($row = $query->fetch(PDO::FETCH_ASSOC)) { 
        
        $records[] = $row;
        
    }

    return $records;

}

 