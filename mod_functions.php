<?php

function getBasketSize($conn) {
   $user_id = $_SESSION['logged_in_user_id'];
   $querysum = $conn->prepare('SELECT  SUM(basket.amount) AS total FROM basket 
   LEFT JOIN laptops ON basket.product_id = laptops.id WHERE basket.customer_id=:user_id');
   $querysum->execute(['user_id' => $user_id]);
   $sum = $querysum->fetch(PDO::FETCH_ASSOC);
   return $sum['total'];
}
