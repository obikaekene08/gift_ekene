<?php



require("Gifter.php");

 $obj = new Gifter;


$gifter_id  = $_SESSION['user'];
$itqty = $_POST['itqty'];
$receiver_itid = $_POST['receiver_itid'];

$item_array = $obj->includeitem('gift_selection',$_SESSION['$r_event_id'],$gifter_id, $itqty,$receiver_itid);


$total = 0;
foreach ($item_array as $key => $v) {

$total = $total + ($v['g_item_qty']);

}

$_SESSION['colqty'] = $total;

echo $total;


  	
?>