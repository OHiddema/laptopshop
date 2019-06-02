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

function deleteRecord($id) {

    try {
        $conn = Db::instance();
        $stmt = $conn->prepare('DELETE FROM laptops WHERE id=:id');
        $stmt->execute(['id' => $id]);
        return "Record deleted successfully";
    }
    catch(PDOException $e)
    {
        return 'DELETE FROM query' . "<br>" . $e->getMessage();
    }

}

function getRecord($id, &$error) {
   
    try {
        $conn = Db::instance();
        $stmt = $conn->prepare('SELECT * FROM laptops WHERE id=:id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }
    catch(PDOException $e)
    {
        $error = $sql . "<br>" . $e->getMessage();
    }

}

function updateRecord($id) {
    
    try {
        $stmt = $conn->prepare("UPDATE laptops SET brand=:brand, name=:name, price=:price, memory=:memory WHERE id=:id");
        $stmt->execute(['brand' => $brand, 'name' => $name, 'price' => $price, 'memory' => $memory, 'id' => $id]);
  
        return "Record updated successfully<br>";
        }
     catch(PDOException $e)
        {
        return $sql . "<br>" . $e->getMessage();
        }

}