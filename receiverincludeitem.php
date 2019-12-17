<?php



require("Vendor.php");



$obj = new Vendor;
$eventtitle = $_POST['eventtitle'];
$receiver_id  = $_SESSION['user'];
$itprice = $_POST['itprice'];
$itstk = $_POST['itstk'];
$itname = $_POST['itname'];
$itqty = $_POST['itqty'];

$add_item = $obj->additem($eventtitle,$receiver_id, $itprice, $itstk,$itname,$itqty);

 if($add_item > 0){

echo "success";

}else{

echo "failed";

}

// echo $all;

//echo json_encode(['name'=>'Ekene','gender'=>'male']);


// $table = 'vendor_item'
// $v_id = $_SESSION['user'];
// $v_cat_id = $_SESSION['cat_id'];
// $v_item_name = $all[0];
// $v_item_price = $all[1];
// $item_color = $all[2];
// $item_qty = $all[3];
// $item_pic = '';
// $item_id = $_SESSION['item_id'];
// $newitem_id = ($item_id + 1);
// $inpval = $_SESSION['itid_id'];
// $make_table = $_SESSION['make_table'];

// if(!(in_array($inpval, $make_table))){

//   	$itId = $_SESSION['item_id'];


//   		$items_id	= $newitem_id;

//   }


// $select_item = $obj->selectitem('vendor_select_category',$items_id);
// $add_item = $obj->additem($table,$v_id,$v_cat_id,$v_item_name,$v_item_price,$item_color,$item_qty,$item_pic);

// if($add_item > 0){

// return "success";

// }else{

// return "failed";

// }

  	

?>