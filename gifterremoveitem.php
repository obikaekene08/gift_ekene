<?php

require("Gifter.php");

 $obj = new Gifter;

$item_id = trim(htmlentities(addslashes($_POST['itemid'])));

$obj->removeitem('gift_selection','g_selection_id',$item_id);

?>
