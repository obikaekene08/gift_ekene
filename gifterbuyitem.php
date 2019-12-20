
<?php



require("Gifter.php");

 $obj = new Gifter;


$itqty = $_POST['itqty'];
$itid = $_POST['itid'];

$item_array = $obj->cartitem($itqty,$itid);



if(!empty($item_array)){
$total = 0;
foreach ($item_array as $key => $v) {

$total = $total + ($v['g_item_qty']);

}

$_SESSION['colqty'] = $total;

echo $total;

}


  	
?>