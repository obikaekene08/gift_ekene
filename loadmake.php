<?php


require("Vendor.php");

$obj = new Vendor;


$v_cat_name = $_POST['valcat'];

$cat_table = $obj->getseveralwhere('category_table','category_name',$v_cat_name);

$v_cat_id = $cat_table[0]['category_id'];

$r = $obj->getseveralwhere('vendor_item','v_cat_id',$v_cat_id,'GROUP BY v_item_name ');

print_r(json_encode($r));

  

?>