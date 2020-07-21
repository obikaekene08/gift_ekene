<?php

require("Gifter.php");

 $obj = new Gifter;

$item_id = trim(htmlentities(addslashes($_POST['itemid'])));

$item_removed = $obj->removeitem('purchase_item','g_item_id',$item_id);

if(!empty($item_removed)){

		$total = 0;
		foreach ($item_removed as $key => $v) {

		$total = $total + ($v['g_item_qty']);

		}

		$_SESSION['colqty'] = $total;

		echo $total;

		}

?>