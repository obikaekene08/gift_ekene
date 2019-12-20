<div class = "col-md-3 col-6">
<div class="card text-center alert-secondary">
  <div class="card-body">
  	<img src="images/jumia.png" class="card-img-top" alt="...">
    <h5 class="card-title mt-2">Item Name: ????</h5>
    <p class="card-text"><b>Unit Price:</b> &#8358;????</p>
    <p class="card-text"><b>Quantity:</b> ??</p>
    <button data-target="#staticBackdropAddItem" class="btn btn-danger" data-toggle="modal" id = "firstAddItemBtn">Add Item</button>
  </div>
</div>


</div>
<?php

require("Vendor.php");

$obj = new Vendor;

$itemadder = $obj->getseveralwhere('vendor_item','vendor_id',$_SESSION['user']);

if(!empty($itemadder)){

foreach ($itemadder as $key => $v) {
  
?>

<div class = "col-md-3 col-6 mt-2">
<div class="card text-center alert-success">
  <div class="card-body">
    <img src="images/jumia.png" class="card-img-top" alt="...">
    <h5 class="card-title mt-2"><?php if($v['v_item_name'] != '') {echo $v['v_item_name'];}else{ echo "No Item Name";}?></h5>
    <p class="card-text"><b>Unit Price: </b> <?php echo "&#8358;".number_format($v['v_item_price'],2) ;?></p>
    <p class="card-text"><b>Quantity: </b> <?php echo $v['item_qty'];?></p>
    <button data-target="#staticBackdropEditItem" class="btn btn-primary" data-toggle="modal" id = "firstEditItemBtn">Edit Item</button>
  </div>
</div>


</div>


<?php
} } else{

}

?>