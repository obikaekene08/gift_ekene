<?php



require("Receiver.php");

 $obj = new Receiver;


$item_qty = trim(htmlentities(addslashes($_POST['itemqty'])));
$item_id = trim(htmlentities(addslashes($_POST['itemid'])));

 $update_item = $obj->updateitem($item_id, $item_qty);


?>

<?php
  	
?>