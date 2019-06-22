<script>
   function getdata(basket_id, amount) {
      var http = new XMLHttpRequest();
      var url = 'getbasketdata.php';
      var params = "basket_id=" + basket_id + "&amount=" + amount; 

      http.open('POST',url , true);

      //Send the proper header information along with the request
      http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

      http.onreadystatechange = function() {//Call a function when the state changes.
         if(http.readyState == 4 && http.status == 200) {
            document.getElementById("resultset").innerHTML = this.responseText;
         }
      }

      http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");   
      http.send(params);
   }
</script>

<script>getdata();</script>

<p id='resultset'></p>


<?php
//    session_start();
//    require_once('connect.php');

//    $user_id = $_SESSION['logged_in_user_id'];

//    $query = $conn->prepare('SELECT laptops.name, basket.amount, laptops.price, 
//    (basket.amount * laptops.price) AS totaal 
//    FROM basket LEFT JOIN laptops ON basket.product_id = laptops.id 
//    WHERE basket.customer_id=:user_id');
//    $query->execute(['user_id' => $user_id]);

//    $querysum = $conn->prepare('SELECT  SUM(basket.amount) AS total FROM basket 
//    LEFT JOIN laptops ON basket.product_id = laptops.id WHERE basket.customer_id=:user_id');
//    $querysum->execute(['user_id' => $user_id]);
//    $sum = $querysum->fetch(PDO::FETCH_ASSOC);

//    $querytot = $conn->prepare('SELECT SUM(basket.amount * laptops.price) as totgen 
//    FROM basket LEFT JOIN laptops ON basket.product_id = laptops.id 
//    WHERE basket.customer_id=:user_id');
//    $querytot->execute(['user_id' => $user_id]);
//    $tot = $querytot->fetch(PDO::FETCH_ASSOC);

//    echo "Logged in user: ".$_SESSION['logged_in_user_name']."<br>";
//    echo "Total number of items in basket: ".$sum['total']."<br><br>";

//    echo '<table border ="2">';
//    echo '<tr>';

//    echo '<th>name</th>';
//    echo '<th>amount</th>';
//    echo '<th>price</th>';
//    echo '<th>total</th>';

//    echo '</tr>';

//    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

//       echo '<tr>';
//       foreach($row as $key=>$field) {
//          echo "<td>" . $field . "</td>";
//       }      
//       echo '</tr>';
      
// }
   
// echo '</table>';

// echo "<br><br>";
// echo "Total amount: ".$tot['totgen']."<br><br>";

?>