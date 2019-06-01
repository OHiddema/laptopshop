<?php
   include_once('connect.php');

   header("Content-Type: application/json; charset=UTF-8");
   $obj = json_decode($_POST["x"], false);

   $query = $conn->prepare('SELECT * FROM laptops WHERE price<=:price AND memory>=:memory');
   $query->execute(['price' => $obj->maxprijs, 'memory' => $obj->minmem]);

   echo 'There are ' . $query->rowCount() . ' laptops matching your criteria:<br><br>';
   
   echo '<table border ="2">';
   echo '<tr>';

   // This is realy cool! Column names are fetched from the database.
   $cols = $query->columnCount();
   for ($i = 0; $i<$cols; $i++) {
      $header = $query->getcolumnMeta($i)['name'];
      echo '<th>' . $header . '</th>';
   }
   
   echo '</tr>';

   while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

      echo '<tr>';
      foreach($row as $field) {
         echo "<td>" . $field . "</td>";
      }
      
      echo '</tr>';
      
}
   
echo '</table>';

?>