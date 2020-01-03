<div class = "col-md-3 col-6">
<div class="card text-center alert-secondary">
  <div class="card-body">
  	<img src="images/noimage3.jpg" class="card-img-top" alt="...">
    <p class="card-text mb-0 pb-0">Category Name: ??</p>
    <h5 class="card-title mt-2">Item Name: ????</h5>
    <p class="card-text"><b>Unit Price:</b> &#8358;????</p>
    <p class="card-text" style="float:left"><b>Colour: </b> ??</p>
    <p class="card-text mr-1" style="float:right"><b>Stock: </b> ??</p><p style="clear: both"></p>
    <button data-target="#staticBackdropAddItem" class="btn btn-danger" type = "button" data-toggle="modal" id = "firstAddItemBtn">Add Item</button>
  </div>
</div>


</div>
<?php

require("Vendor.php");

$obj = new Vendor;

$itemadder = $obj->getseveralwhereNoGroup('vendor_item','category_table','vendor_item.v_cat_id','category_table.category_id','vendor_id', $_SESSION['user'],'','');

if(!empty($itemadder)){

foreach ($itemadder as $key => $v) {
  
?>

<div class = "col-md-3 col-6 mt-2">
<div class="card text-center alert-success">
  <div class="card-body">
    <img src="<?php if($v['item_pic'] != ""){ echo $v['item_pic']; }else{echo 'images/noimage3.jpg';} ?>" class="card-img-top responsive img-fluid" alt="...">
    <p class="card-text mb-0 pb-0"><?php echo $v['category_name'];?></p>
    <h5 class="card-title mt-0 pt-0"><?php if($v['v_item_name'] != '') {echo $v['v_item_name'];}else{ echo "No Item Name";}?></h5>
    <p class="card-text"><b>Unit Price: </b> <?php echo "&#8358;".number_format($v['v_item_price'],2) ;?></p>
    <p class="card-text" style="float:left"><b>Colour: </b> <?php echo $v['item_color'];?></p>
    <p class="card-text mr-1" style="float:right"><b>Stock: </b> <?php echo $v['item_qty'];?></p><p style="clear: both"></p>
    <span id = "itemid" style="display: none"><?php echo $v['v_item_id']; ?></span>
    <div class = "row" id = "grandfather">
    <div class = "col">
    <button type="button" data-target="#staticBackdropEditItem" class="btn btn-primary" data-toggle="modal" id = "EditItemBtn" onclick = "editItemCard(this)"><span style="font-size: 15px">Edit Item</span></button>
    </div>
    <div class = "col">
    <button type="button" data-target="#staticBackdropRemoveItem" class="btn btn-primary" data-toggle="modal" id = "RemoveItemBtn" onclick = "removeItemCard(this);"><span style="font-size: 15px">Remove</span></button>
    
    </div>
    </div>
  </div>
</div>


</div>


<?php
} } else{

}

?>