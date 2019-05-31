<?php
   include_once('connect.php');

   $maxprice = $_POST['maxprice'];
   $minmem = $_POST['minmem'];

   $query = $conn->prepare('SELECT * FROM laptops WHERE price<=:price AND memory>=:memory');
   $query->execute(['price' => $maxprice, 'memory' => $minmem]);

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