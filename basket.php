<script>
   function getdata(basket_id, amount, refresh) {
      var http = new XMLHttpRequest();
      var url = 'getbasketdata.php';
      var params = "basket_id=" + basket_id + "&amount=" + amount; 

      http.open('POST',url , true);

      //Send the proper header information along with the request
      http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

      http.onreadystatechange = function() {//Call a function when the state changes.
         if(http.readyState == 4 && http.status == 200) {
            document.getElementById("resultset").innerHTML = this.responseText;
            if (refresh) {
               location.reload();
            }
         }
      }

      http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");   
      http.send(params);
   }

   getdata();
</script>

<h1>Basket</h1>
<hr>

<p id='resultset'></p>

<a href="?page=customer.php">Back to shop</a>