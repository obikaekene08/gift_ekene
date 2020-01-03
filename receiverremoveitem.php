<?php



require("Receiver.php");

 $obj = new Receiver;

$item_id = $_POST['itemid'];

$obj->removeitem('receiver_item','receiver_item_id',$item_id);

?>

<?php
  	
?>