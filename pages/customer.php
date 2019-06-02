<?php
$maxprijs = isset($_GET['maxprijs']) ? $_GET['maxprijs'] : 1000;
$minmem = isset($_GET['minmem']) ? $_GET['minmem'] : 4;
?>

<h1>Filter laptops</h1>
<hr>

<form action="" method="get">
   
   <input type="hidden" name="page" value="<?=$_GET['page'];?>" />

   Maximal price: <input onchange='getdata()' id="maxprijs" name='maxprijs' type="number" min = "0" max="1000" step="100" value='<?=$maxprijs;?>'><br><br>
   Minimal memory: <input onchange='getdata()' id="minmem" name='minmem' type="number" min = "4" max = "32" step = "4" value='<?=$minmem;?>'><br><br>

   <input type="submit" class="submit" id="filterResults" value="Filter" />

</form>

<a href="?page=homepage">Home</a>

<div id='resultset'>

   <?=filterRecords($maxprijs, $minmem);?>

</div>