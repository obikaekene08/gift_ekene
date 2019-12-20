<?php

require("Receiver.php");

 $obj = new Receiver;

 $r_event_id = $_GET['colqty'];

$receiver_item_table = $obj->getseveralwhere('receiver_item','r_event_id',$r_event_id);

if(!empty($receiver_item_table)){
$total = 0;

foreach ($receiver_item_table as $key => $v) {

$total = $total + ($v['r_item_qty']);

}

echo $total;

}





?>