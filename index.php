<?php

    if(isset($_REQUEST['page'])) {

        $page = $_REQUEST['page'].'.php';

    } else $page = 'homepage.php';

?>


<?php include($page);?>
