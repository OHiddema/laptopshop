<h1>Add laptop</h1>
<hr>
<form action = "addrecord.php" method = "POST">
   <div class="form-group row">
      <label for="brand" class="col-sm-2 col-form-label">Brand:</label>
      <div class="col-sm-6">
         <input type="text" class="form-control form-control-sm" id="brand" name="brand">
      </div>
   </div>

   <div class="form-group row">
      <label for="name" class="col-sm-2 col-form-label">Name:</label>
      <div class="col-sm-6">
         <input type="text" class="form-control form-control-sm" id="name" name="name">
      </div>
   </div>

   <div class="form-group row">
      <label for="price" class="col-sm-2 col-form-label">Price:</label>
      <div class="col-sm-6">
         <input type="number" class="form-control form-control-sm" id="price" name="price">
      </div>
   </div>

   <div class="form-group row">
      <label for="memory" class="col-sm-2 col-form-label">Memory (GB):</label>
      <div class="col-sm-6">
         <input type="number" class="form-control form-control-sm" id="memory" name="memory" min = "4" max = "32" step = "4" value="4">
      </div>
   </div>

   <!-- Add select element for laptop category, Budget is default -->
   <div class="form-group row">
      <label for="sel1" class="col-sm-2 col-form-label">Category:</label>
      <div class="col-sm-6">
         <select class="form-control form-control-sm" id="category" name="category">
               <option value="B" selected>Budget</option>
               <option value="A">Allround</option>
               <option value="P">Professional</option>
            </select>
         </div>
   </div> 

   <!-- Active is true by default -->
   <div class="form-group row">
      <label for="blnactive" class="col-sm-2 col-form-label">Active:</label>
      <div class="col-sm-1">
         <input type="checkbox" class="form-control form-control-sm" id="blnactive" name="blnactive" value="1" checked>
      </div>
   </div>

   <input type="submit" class="btn btn-primary" value ="add">
</form>
<br>
<a href="?page=viewall.php">Back</a>