<?php
   include_once('connect.php');

   $maxprice = $_POST['maxprice'];
   $minmem = $_POST['minmem'];

   $query = $conn->prepare('SELECT * FROM laptops WHERE price<=:price AND memory>=:memory');
   $query->execute(['price' => $maxprice, 'memory' => $minmem]);

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
      foreach($row as $field) {
         echo "<td>" . $field . "</td>";
      }
      
      echo '</tr>';
      
}
   
echo '</table>';

?>