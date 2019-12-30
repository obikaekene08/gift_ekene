<?php



require("Vendor.php");

 $obj = new Vendor;

$v_item_name = $_POST['itemName'];
$v_cat_name = $_POST['catName'];
$v_item_price = $_POST['itemPrice'];
$item_color = $_POST['itemColor'];
$item_qty = $_POST['itemQty'];
$item_id = $_POST['itemId'];
$vendor_id  = $_SESSION['user'];

 $update_item = $obj->updateitem($item_id, $v_cat_name, $v_item_name,$v_item_price,$item_color,$item_qty);



?>

<?php
  	
?>