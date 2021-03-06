<?php
   session_start();
   include_once('connect.php');
   require_once('mod_functions.php');

   $basket_id = $_POST["basket_id"];
   $amount = $_POST["amount"];
   $customer_id = $_SESSION['logged_in_user_id'];

   if ($amount==0) {
      $stmt = $conn->prepare("DELETE FROM basket WHERE id=:basket_id");
      $stmt->execute(['basket_id' => $basket_id]);
   } else {
      $stmt = $conn->prepare("UPDATE basket SET amount=:amount WHERE id=:basket_id");
      $stmt->execute(['amount' => $amount, 'basket_id' => $basket_id]);
   }

   $query = $conn->prepare('SELECT basket.id, laptops.name, basket.amount, laptops.price, 
   (basket.amount * laptops.price) AS totaal 
   FROM basket LEFT JOIN laptops ON basket.product_id = laptops.id 
   WHERE basket.customer_id=:user_id');
   $query->execute(['user_id' => $customer_id]);

   $querytot = $conn->prepare('SELECT SUM(basket.amount * laptops.price) as totgen 
   FROM basket LEFT JOIN laptops ON basket.product_id = laptops.id 
   WHERE basket.customer_id=:user_id');
   $querytot->execute(['user_id' => $customer_id]);
   $tot = $querytot->fetch(PDO::FETCH_ASSOC);

   $size = getBasketSize($conn);
   if ($size==0) {
      echo "<h2>Your basket is empty!<h2>";
   } else {
      echo '<table class="table table-sm table-striped table-nonfluid" border ="2">';
      echo '<tr>';

      echo '<th>name</th>';
      echo '<th>amount</th>';
      echo '<th>price</th>';
      echo '<th>total</th>';

      echo '</tr>';

      while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

         echo '<tr>';
         foreach($row as $key=>$field) {
            if ($key=='id') {
               // do nothing
            } elseif ($key=='amount') {
               echo "<td class='number'><input type='number' id='amount' value='".$field.
               "' onchange='getdata(".$row['id'].",this.value".",true)'></td>";
            } elseif ($key!='name') {
               echo "<td class='number'>" . $field . "</td>";
            } else {
               echo "<td>" . $field . "</td>";
            }
         }      
         echo '</tr>';         
      }
      echo '<tr>';
      echo '<td colspan="3" align="right"><b>Total amount:&nbsp;</b></td>';
      echo '<td><b>'.$tot['totgen'].'</b></td>';
      echo '</tr>';
      echo '</table>';
   }   