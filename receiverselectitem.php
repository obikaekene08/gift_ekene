<?php

require("Receiver.php");

$obj = new Receiver;

$itemadder = $obj->getseveralwhere('vendor_item','vendor_id',$_SESSION['user']);

$price = $_POST['price'];
$selectcategory = $_POST['selectcategory'];
$merchant = $_POST['merchant'];
$brand = $_POST['brand'];


$search_item = $obj->searchitem($price, $selectcategory,$merchant,$brand);


foreach($search_item as $key => $v) {
	
?>
<div class = "col-md-3 col-6 mt-2">
<div class="card text-center alert-success">
  <div class="card-body">
  	<img src="images/jumia.png" class="card-img-top" alt="...">
    <h5 class="card-title mt-2" id = "itname"><?php if($v['v_item_name'] != '') {echo $v['v_item_name'];}else{ echo "No Item Name";}?></h5>
    <p class="card-text"><b>Unit Price: </b><span id = "itprice"> <?php echo "&#8358;".number_format($v['v_item_price'],2);?></span></p>
    <p class="card-text"><b>Stock: </b><span  id = "itstk"> <?php echo $v['item_qty'];?></span></p>
    <p class="card-text"><b>Qty: </b><span  id = "itqty"><input type="number" value = 1 style = "width:20%"></span></p>
    <button type = "button" class="btn btn-primary"  id = "itbtn">Include Item</button>
  </div>
</div>


</div>
<?php
}

if(count($search_item) == 0){
	echo "<h3 class = 'card-body alert-danger'>No Item Found</h3>";
}

?>