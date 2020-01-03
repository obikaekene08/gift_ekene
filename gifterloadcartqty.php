<?php



require("Gifter.php");

 $obj = new Gifter;

if(isset($_SESSION['$r_event_id']) && isset($_SESSION['user'])){
$gifter_id  = $_SESSION['user'];

$item_array = $obj->getseveralwheretwocolumns('gift_selection','r_event_id',$_SESSION['$r_event_id'],'gifter_id',$gifter_id);

if(!empty($item_array)){
$total = 0;
foreach ($item_array as $key => $v) {

$total = $total + ($v['g_item_qty']);

}

$_SESSION['colqty'] = $total;

echo $total;

}
}

  	
?>