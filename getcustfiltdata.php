<?php
   include_once('connect.php');

   $x1 = $_POST['maxprice'];
   $x2 = $_POST['minmem'];

   $sql = "SELECT * FROM laptops WHERE price" . $x1 . " AND memory" . $x2;
   $query = $conn->query($sql);

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