<?php

require("Receiver.php");

$obj = new Receiver;

$receiver_id = $_SESSION['user'];
$r_event_id = $_SESSION['$r_event_id'];


$seecollectiondetails = $obj->getseveralwhereNoGroup('receiver_item','vendor_item','receiver_item.v_item_id','vendor_item.v_item_id','receiver_item.r_event_id',$r_event_id);


// print_r($seecollectiondetails);
?>



<?php
if(!empty($seecollectiondetails)) {

foreach($seecollectiondetails as $key => $v) {

$_SESSION['v_cat_id'] = $v['v_cat_id'];
$_SESSION['vendor_id'] = $v['vendor_id'];

$getCatName = $obj->getseveralwhere('category_table','category_id',$_SESSION['v_cat_id']);
$getVendorName = $obj->getseveralwhere('vendors','vendor_id',$_SESSION['vendor_id']);
	
?>
						<div class = "col-md-3 col-6 mt-2">
						<div class="card alert-danger">
						  <div class="card-body mt-1 pt-1">
						  	<form action = "" class = "mt-0 pt-0">
						    <h5 class="text-center pt-0 mt-0" id = "itname">Selected</h5>
						  	<img src="images/noimage3.jpg" class="card-img-top" height = "180px" alt="...">
						    <h5 class="text-center mt-2 mb-0 pb-0" id = "itname"><?php if($v['v_item_name'] != '') {echo $v['v_item_name'];}else{ echo "No Item Name";}?></h5>
						    <span style="display:inline-block;width:45%;box-sizing: border-box;float:left;font-size: 12px"><?php echo $getCatName[0]['category_name'];?></span><span style="width:50%;float:right;display:inline-block;box-sizing: border-box; font-size: 12px; text-align: center">By <?php echo $getVendorName[0]['v_companyname'];?></span><p style = "clear: both;" class = "pb-0 mb-0"></p>
						    <p class="card-text text-center"><span id = "itprice"><b> <?php echo "&#8358;".number_format($v['v_item_price'],2);?></b></span></p>
						    <p class="card-text" style="float:left"><b style="font-size: 13px">Stock: </b><span class="card-text" id = "itstk"> <?php echo $v['item_qty'];?></span></p>
						    <input type="number" class = " text-center" style = "width:29%;float:right" id = "itqty" readonly value = '<?php echo $v['r_item_qty'];?>'><b style = "float:right; margin:4px;font-size: 13px">Qty: </b><p style = "clear: both;" class = "pb-0 mb-0"></p>
						    <span style = "display: none" class="card-text" id = "itid"><?php echo $v['receiver_item_id'];?></span>
						    <button type = "button" class="btn btn-primary col-8 offset-2 mt-2" id = "itbtn" onclick = "iteminclude(this);" style = "display: none">Include Item</button>
						    <div class = "row" id = "grandparent">
						      <div class = "col">
						      <button type = "button" class="btn btn-primary px-2" id = "<?php echo "editrecord".$v['receiver_item_id'];?>" style = "" onclick = "editItemCard(this)"><span style="font-size: 15px">Edit Item</span></button>
						      <button type = "button" class="btn btn-primary px-2" id = "<?php echo 'updaterecord'.$v['receiver_item_id'];?>" style = "display:none" onclick = "updateItemCard(this)"><span style="">Save</span></button>
						      </div>
						      <div class = "col">
						      <button type = "button" class="btn btn-primary " id = "<?php echo 'deleterecord'.$v['receiver_item_id'];?>" style = "" onclick = "deleteItemCard(this)" data-target = "#staticBackdropDeleteItem" data-toggle="modal"><span style="font-size: 15px" >Remove</span></button>
						      </div>
						  	</div>
							</form>
						  </div>
						</div>
						</div>

						

<?php

}

}
?>


<?php

if(empty($seecollectiondetails)){
	echo "<h3 class = 'card-body alert-danger'>No Items Added in This Collection</h3>";

}


?>