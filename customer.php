   <script>
      function getdata() {
         var http = new XMLHttpRequest();
         var url = 'getcustfiltdata.php';

         var maxprijs = document.getElementById('maxprijs').value;
         var minmem = document.getElementById('minmem').value;
         var category = document.getElementById('category').value;
         obj = { "maxprijs":maxprijs, "minmem":minmem, "category":category};
         dbParam = JSON.stringify(obj);

         http.open('POST',url , true);

         //Send the proper header information along with the request
         http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

         http.onreadystatechange = function() {//Call a function when the state changes.
            if(http.readyState == 4 && http.status == 200) {
               document.getElementById("resultset").innerHTML = this.responseText;
            }
         }

         http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");   
         http.send("x=" + dbParam);
      }
   </script>

   <h1>Filter laptops</h1>
   <hr>
   <!-- display logged in user -->
   <?php
      session_start();
      if (isset($_SESSION['logged_in_user_name'])) {
         echo "Logged in user: ".$_SESSION['logged_in_user_name'];
         echo " <a href='?page=basket.php'>Check my basket</a>";
      } else {
         echo "No user is logged in.";
      }
      echo "<br><br>";   
   ?>
   <!-- display logged in user -->

   Maximal price: <input onchange='getdata()' id='maxprijs' type="number" min = "0" max="1000" step="100" value='1000'><br><br>
   Minimal memory: <input onchange='getdata()' id='minmem' type="number" min = "4" max = "32" step = "4" value='4'><br><br>

   <!-- Select category -->
   Category:
   <select onchange='getdata()' id='category'>
      <option value="All" selected>All categories</option>
      <option value="B">Budget</option>
      <option value="A">Allround</option>
      <option value="P">Professional</option>
   </select>
   <br><br>

   <!-- Select category -->

   <a href="?page=homepage.php">Home</a>

   <!-- Select all data when page loads -->
   <script>getdata();</script>

   <p id='resultset'></p>