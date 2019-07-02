   <?php
      require_once('connect.php');
      require_once('mod_functions.php');
   ?>
   
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

   <div class='myGrid'>
      
      <div>
         <?php
            $maxprijs = (isset($_SESSION['maxprijs']) ? $_SESSION['maxprijs'] : 1000);
            $minmem = (isset($_SESSION['minmem']) ? $_SESSION['minmem'] : 4);
            $category = (isset($_SESSION['category']) ? $_SESSION['category'] : 'All');

            $catAll = ($category == 'All') ? "selected" : "";
            $catB = ($category == 'B') ? "selected" : "";
            $catA = ($category == 'A') ? "selected" : "";
            $catP = ($category == 'P') ? "selected" : "";
         ?>

         <div class='container'>
            <form>
               <div class="form-group">
                  <label for="maxprice">Maximal price:</label>
                  <input class="form-control" onchange='getdata()' id='maxprijs' type="number" min = "0" max="1000" step="100" value='<?= $maxprijs ?>'>
               </div>

               <div class="form-group">
                  <label for="minmem">Minimal memory:</label>
                  <input class="form-control" onchange='getdata()' id='minmem' type="number" min = "4" max="32" step="4" value='<?= $minmem ?>'>
               </div>

               <div class="form-group">
                  <label for="category">Category:</label>
                  <select class="form-control" onchange='getdata()' id='category'>
                     <option value="All" <?= $catAll ?>>All categories</option>
                     <option value="B" <?= $catB ?>>Budget</option>
                     <option value="A" <?= $catA ?>>Allround</option>
                     <option value="P" <?= $catP ?>>Professional</option>
                  </select>
               </div>
            </form>
         </div>
      </div>

      <!-- Select all data when page loads -->
      <script>getdata();</script>

      <p id='resultset'></p>

   </div>