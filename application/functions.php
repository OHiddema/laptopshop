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
        return 'DELETE FROM query' . "<br>" . $stmt->errorInfo()[2];
    }

}

function getRecord($id, &$error) {
   
    $conn = Db::instance();
    $stmt = $conn->prepare('SELECT * FROM laptops WHERE id=:id');
    if($stmt->execute(['id' => $id])) {
        return $stmt->fetch();
    } else {
        $error = $sql . "<br>" . $stmt->errorInfo()[2];
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

function filterRecords($maxprijs, $minmem) {

    $conn = Db::instance();
    $query = $conn->prepare('SELECT * FROM laptops WHERE price<=:price AND memory>=:memory');
    $query->execute(['price' => $maxprijs, 'memory' => $minmem]);
 
    $count = $query->rowCount();
    
    $table = '<table border ="2">';
    $table .= '<tr>';
 
    // This is realy cool! Column names are fetched from the database.
    $cols = $query->columnCount();
    for ($i = 0; $i<$cols; $i++) {
       $header = $query->getcolumnMeta($i)['name'];
       $table .= '<th>' . $header . '</th>';
    }
    
    $table .= '</tr>';
 
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
 
        $table .= '<tr>';
        foreach($row as $field) {
            $table .= "<td>" . $field . "</td>";
        }
       
        $table .= '</tr>';
       
}
    
$table .= '</table>';    

return 'There are '.$count.' laptops matching your criteria:<br><br>'.$table;

}