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
  
    $conn = Db::instance();
    $stmt = $conn->prepare('INSERT INTO laptops (brand, name, price, memory) VALUES (:brand, :name, :price, :memory)');

    if($stmt->execute(['brand' => $brand, 'name' => $name, 'price' => $price, 'memory' => $memory])) {
        return "New record created successfully<br>";
    } else {
        return 'INSERT INTO' . "<br>" . $stmt->errorInfo()[2];
    }
    
}

function deleteRecord($id) {
    
    $conn = Db::instance();
    $stmt = $conn->prepare('DELETE FROM laptops WHERE id=:id');
   
    if($stmt->execute(['id' => $id])) {
        return "Record deleted successfully";
    } else {
        return 'DELETE FROM query' . "<br>" . $e->getMessage();
    }

}

function getRecord($id, &$error) {
   
    $conn = Db::instance();
    $stmt = $conn->prepare('SELECT * FROM laptops WHERE id=:id');
    if($stmt->execute(['id' => $id])) {
        return $stmt->fetch();
    } else {
        $error = $sql . "<br>" . $e->getMessage();
    }

}

function updateRecord($id, $brand, $name, $price, $memory) {
    
    $conn = Db::instance();
    $stmt = $conn->prepare("UPDATE laptops SET brand=:brand, name=:name, price=:price, memory=:memory WHERE id=:id");
    if($stmt->execute(['brand' => $brand, 'name' => $name, 'price' => $price, 'memory' => $memory, 'id' => $id])) {
        return "Record updated successfully<br>";
    } else {
        return $sql . "<br>" . $stmt->errorInfo()[2];
    }

}