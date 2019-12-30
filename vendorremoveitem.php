<?php



require("Vendor.php");

 $obj = new Vendor;

$item_id = $_POST['itemId'];

$obj->removeitem('vendor_item','v_item_id',$item_id);

?>

<?php
  	
?>