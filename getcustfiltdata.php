<?php
   include_once('connect.php');

   header("Content-Type: application/json; charset=UTF-8");
   $obj = json_decode($_POST["x"], false);

   if($obj->category=='All') {
      $query = $conn->prepare('SELECT * FROM laptops WHERE price<=:price AND memory>=:memory AND blnactive="1"');
      $query->execute(['price' => $obj->maxprijs, 'memory' => $obj->minmem]);
   } else {
      $query = $conn->prepare('SELECT * FROM laptops WHERE price<=:price AND memory>=:memory AND blnactive="1" AND category=:category');
      $query->execute(['price' => $obj->maxprijs, 'memory' => $obj->minmem, 'category' => $obj->category]);
   }

   echo 'There are ' . $query->rowCount() . ' laptops matching your criteria:<br>';
   
   echo '<table border ="2">';
   echo '<tr>';

   echo '<th>brand</th>';
   echo '<th>name</th>';
   echo '<th>price</th>';
   echo '<th>memory</th>';   
   echo '<th>category</th>';   

   echo '</tr>';

   while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

      echo '<tr>';
      foreach($row as $key=>$field) {
         if ($key == 'id') {
            // do nothing
         } else {
            if ($key != 'blnactive') {
               if ($key == 'price' || $key == 'memory') {
                  echo "<td class='number'>" . $field . "</td>";
               } else echo "<td>" . $field . "</td>";
            }
         }
      }      

      ?>
      <td> <button><a href="?page=showdetails.php&id=<?=$row['id']?>"><i class="fas fa-info-circle fa-lg"></i></a></button></td>
      <?php

      echo '</tr>';
      
}
   
echo '</table>';

?>