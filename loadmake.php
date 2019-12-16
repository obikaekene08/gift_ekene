<?php


require("Vendor.php");

$obj = new Vendor;


$id = $_GET['mcat'];

$itemid = $_GET['selected'];

$_SESSION['cat_id'] = $id;

$make_table = $obj->getseveralwhere('vendor_item','vat_cat_id',$id);

  	foreach($make_table AS $k => $v){

  	echo "<option value='".$v['v_item_name']. " '/>";

  }

  $_SESSION['itid_id'] = $itemid;
  $_SESSION['make_table'] = $make_table;

  

?>		