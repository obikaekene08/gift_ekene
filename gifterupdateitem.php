<?php



require("Gifter.php");

 $obj = new Gifter;


$item_qty = trim(htmlentities(addslashes($_POST['itemqty'])));
$item_id = trim(htmlentities(addslashes($_POST['itemid'])));

$update_item = $obj->updateitem($item_id, $item_qty);

if(!empty($update_item)){
$total = 0;
foreach ($update_item as $key => $v) {

$total = $total + ($v['g_item_qty']);

}

$_SESSION['colqty'] = $total;

echo $total;

}

?>
