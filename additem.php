<?php



require("Vendor.php");

$obj = new Vendor;
$v_id  = $_SESSION['user'];
$v_cat_name = $_POST['valcat'];
$v_item_name = $_POST['itemname'];
$v_item_price = $_POST['itemprice'];
$item_color = $_POST['itemcolor'];
$item_qty = $_POST['itemqty'];

// print_r($_FILES);

$add_item = $obj->additem($v_id, $v_cat_name, $v_item_name,$v_item_price,$item_color,$item_qty);

 if($add_item > 0){

echo "success";

}else{

echo "failed";

}

if($_FILES){

$obj->doupload($_FILES,'vendor_item_image','vendor_item','item_pic','v_item_id',$add_item);


}


  	

?>