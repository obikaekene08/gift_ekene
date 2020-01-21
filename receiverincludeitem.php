<?php



require("Receiver.php");

 $obj = new Receiver;


$r_event_id = $_POST['r_event_id'];
$receiver_id  = $_SESSION['user'];
$itqty = $_POST['itqty'];
$itid = $_POST['itid'];

$item_array = $obj->includeitem($r_event_id,$receiver_id, $itqty,$itid);

if(!empty($item_array)){
$total = 0;
foreach ($item_array as $key => $v) {

$total = $total + ($v['r_item_qty']);

}

$_SESSION['colqty'] = $total;

echo $total;
}


  	
?>