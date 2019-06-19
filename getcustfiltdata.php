<?php
   include_once('connect.php');

   header("Content-Type: application/json; charset=UTF-8");
   $obj = json_decode($_POST["x"], false);

   $query = $conn->prepare('SELECT * FROM laptops WHERE price<=:price AND memory>=:memory AND blnactive="1"');
   $query->execute(['price' => $obj->maxprijs, 'memory' => $obj->minmem]);

   echo 'There are ' . $query->rowCount() . ' laptops matching your criteria:<br><br>';
   
   echo '<table border ="2">';
   echo '<tr>';

   echo '<th>id</th>';
   echo '<th>brand</th>';
   echo '<th>name</th>';
   echo '<th>price</th>';
   echo '<th>memory</th>';   

   echo '</tr>';

   while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

      echo '<tr>';
      foreach($row as $key=>$field) {
         if ($key != 'blnactive') {
            echo "<td>" . $field . "</td>";
         }
      }      
      echo '</tr>';
      
}
   
echo '</table>';

?>