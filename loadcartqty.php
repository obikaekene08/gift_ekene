<?php

require("Gifter.php");

 $obj = new Gifter;

 $gifter = $_SESSION['user'];

$gifter_item_table = $obj->getseveralwhere('purchase_item','gifter_id',$gifter);

if(!empty($gifter_item_table)){
$total = 0;

foreach ($gifter_item_table as $key => $v) {

$total = $total + ($v['g_item_qty']);

}

echo $total;

}





?>