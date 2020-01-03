<?php

require("Gifter.php");

 $obj = new Gifter;

$item_id = $_POST['itemid'];

$obj->removeitem('gift_selection','g_selection_id',$item_id);

?>

<?php
  	
?>