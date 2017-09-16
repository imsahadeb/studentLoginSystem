 <?php
if (isset($_GET['error'])){
    echo "<div id='all_error'>
        ".$_GET['error']."
    </div>";
   }
   elseif (isset ($_GET['success'])) {
       echo "<div id='all_success'>".$_GET['success']."</div>";
   }

?>
