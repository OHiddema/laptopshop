<?php
   include_once('connect.php');
   session_start();

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

   $querysum = $conn->prepare('SELECT  SUM(basket.amount) AS total FROM basket 
   LEFT JOIN laptops ON basket.product_id = laptops.id WHERE basket.customer_id=:user_id');
   $querysum->execute(['user_id' => $customer_id]);
   $sum = $querysum->fetch(PDO::FETCH_ASSOC);

   $querytot = $conn->prepare('SELECT SUM(basket.amount * laptops.price) as totgen 
   FROM basket LEFT JOIN laptops ON basket.product_id = laptops.id 
   WHERE basket.customer_id=:user_id');
   $querytot->execute(['user_id' => $customer_id]);
   $tot = $querytot->fetch(PDO::FETCH_ASSOC);

   echo "Logged in user: ".$_SESSION['logged_in_user_name']."<br>";
   echo "Total number of items in basket: ".$sum['total']."<br><br>";

   echo '<table border ="2">';
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
            echo "<td><input type='number' id='amount' value='".$field.
            "' onchange='getdata(".$row['id'].",this.value".")'></td>";
            
         } else {
            echo "<td>" . $field . "</td>";
         }
      }      
      echo '</tr>';
      
}
   
echo '</table>';

echo "<br>";
echo "Total amount: ".$tot['totgen']."<br><br>";

