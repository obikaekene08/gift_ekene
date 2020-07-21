<?php


require("Receiver.php");

 $obj = new Receiver;

$item_id = trim(htmlentities(addslashes($_POST['itemid'])));

$obj->removeitem('receiver_item','receiver_item_id',$item_id);

?>
