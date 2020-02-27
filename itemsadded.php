
<div class = "col-md-4 col-lg-3 col-sm-6 offset-sm-0 col-9 offset-1 mt-2 mediaQueryVendorCard">
<div class="card text-center alert-secondary">
  <div class="card-body">
  	<img src="images/noimage3.jpg" class="card-img-top" alt="..." height = "180px">
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

<div class = "col-md-4 col-lg-3 col-sm-6 offset-sm-0 col-9 offset-1 mt-2 mediaQueryVendorCard">
<div class="card text-center alert-success">
  <div class="card-body mQVendorCardBody">
    <img src="<?php if($v['item_pic'] != ""){ echo $v['item_pic']; }else{echo 'images/noimage3.jpg';} ?>" class="card-img-top" height = "180px" alt="...">
    <p class="card-text mb-0 pb-0"><?php echo $v['category_name'];?></p>
    <h5 class="card-title mt-0 pt-0"><?php if($v['v_item_name'] != '') {echo $v['v_item_name'];}else{ echo "No Item Name";}?></h5>
    <p class="card-text "><b>Unit Price: </b> <?php echo "&#8358;".number_format($v['v_item_price'],2) ;?></p>
    <p class="card-text" style="box-sizing: border-box;float:left; width:50%"><b>Colour: </b> <?php echo $v['item_color'];?></p>
    <p class="card-text mr-1" style="float:right"><b>Stock: </b> <?php echo $v['item_qty'];?></p><p style="clear: both"></p>
    <span id = "itemid" style="display: none"><?php echo $v['v_item_id']; ?></span>
    <div class = "row" id = "grandfather">
    <div class = "col">
    <button type="button" data-target="#staticBackdropEditItem" class="btn btn-primary mQVendorCardBtn" data-toggle="modal" id = "EditItemBtn" onclick = "editItemCard(this)"><span class = "mQVendorCardSpan" style="font-size: 15px" >Edit Item</span></button>
    </div>
    <div class = "col">
    <button type="button" data-target="#staticBackdropRemoveItem" class="btn btn-primary mQVendorCardBtn" data-toggle="modal" id = "RemoveItemBtn" onclick = "removeItemCard(this);"><span style="font-size: 15px" class = "mQVendorCardSpan">Remove</span></button>
    
    </div>
    </div>
  </div>
</div>


</div>


<?php
} } else{

}

?>

<script>
//Empties the input fields of the Add Item Modal after each submission
$('#firstAddItemBtn').click(function(){
    var x = $('#selectcategory').val().trim().toLowerCase();

    var categoryItems = ['television','refrigerator','microwave','washing machine', 'water cooler', 'car','flowers', 'cakes'];

if(x == ''){
    alert("Please choose a Category and Make");
    $('#firstAddItemBtn').removeAttr('data-target');
}else if(!categoryItems.includes(x))
{
    alert("Please choose a Category from the listed Categories");
    $('#firstAddItemBtn').removeAttr('data-target');
}else{

$('#itemprice').val('');
$('#itemcolor').val('');
$('#itemqty').val('');

var y = $('#firstAddItemBtn').attr('data-target');
if(!y){
$('#firstAddItemBtn').attr('data-target','#staticBackdropAddItem');
}

}


})
</script>