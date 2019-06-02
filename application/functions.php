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

function addRecord($brand, $name, $price, $memory) {
  
    try {
       $conn = Db::instance();
       $stmt = $conn->prepare('INSERT INTO laptops (brand, name, price, memory) VALUES (:brand, :name, :price, :memory)');
       $stmt->execute(['brand' => $brand, 'name' => $name, 'price' => $price, 'memory' => $memory]);
       return "New record created successfully<br>";
       }
    catch(PDOException $e)
       {
       return 'INSERT INTO' . "<br>" . $e->getMessage();
       }

}

 