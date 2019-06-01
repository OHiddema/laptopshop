
   <h1>Filter laptops</h1>
   <hr>

   Maximal price: <input onchange='getdata()' id='maxprijs' type="number" min = "0" max="1000" step="100" value='1000'><br><br>
   Minimal memory: <input onchange='getdata()' id='minmem' type="number" min = "4" max = "32" step = "4" value='4'><br><br>

   <a href="?page=homepage">Home</a>

   <!-- Select all data when page loads -->
   <script>getdata();</script>

   <p id='resultset'></p>
