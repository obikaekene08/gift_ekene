<?php



require("Receiver.php");

 $obj = new Receiver;


$item_qty = $_POST['itemqty'];
$item_id = $_POST['itemid'];

 $update_item = $obj->updateitem($item_id, $item_qty);


?>

<?php
  	
?>