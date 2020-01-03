<?php

require("Receiver.php");

$obj = new Receiver;

$receiver_id = $_SESSION['user'];
$r_event_id = $_SESSION['$r_event_id'];


$seecollectiondetails = $obj->getseveralwhereNoGroup('receiver_item','vendor_item','receiver_item.v_item_id','vendor_item.v_item_id','receiver_item.r_event_id',$r_event_id);

?>

							<div class = "col-12 my-1 card-body mbline" id = "tableofitems2" style="min-height:50rem">							
							<table class="table table-striped">
								  <thead>
								    <tr>
								      <th scope="col">S/N</th>
								      <th scope="col">Item Name</th>
								      <th scope="col">Category</th>
								       <th scope="col">Vendor Name</th>
								      <th scope="col">Unit Price</th>
								      <th scope="col">Colour</th>
								      <th scope="col">Stock</th>
								      <th scope="col">Quantity</th>
								      <th scope="col">Actions</th>
								    </tr>
								  </thead>
								  <tbody>
								  	<?php
									if(!empty($seecollectiondetails)) {

										$i = 1;

									foreach($seecollectiondetails as $key => $v) {

									$_SESSION['v_cat_id'] = $v['v_cat_id'];
									$_SESSION['vendor_id'] = $v['vendor_id'];

									$getCatName = $obj->getseveralwhere('category_table','category_id',$_SESSION['v_cat_id']);
									$getVendorName = $obj->getseveralwhere('vendors','vendor_id',$_SESSION['vendor_id']);

									
										
									?>
								    <tr>
								      <th scope="row"><?php echo $i;?></th>
								      <td id = "itemName"><?php echo $v['v_item_name'];?></td>
								      <td id = "catName"><?php echo $getCatName[0]['category_name'];?></td>
								      <td id = "vendorName"><?php echo $getVendorName[0]['v_companyname'];?></td>
								      <td id = "itemPrice"><?php echo "&#8358;".number_format($v['v_item_price'],2);?></td>
								      <td style = "display: none" id = "itemRawPrice"><?php echo $v['v_item_price'];?></td>
								      <td id = "itemColor"><?php echo $v['item_color'];?></td>
								      <td id = "itstk" style = "text-align: center;"><?php echo $v['item_qty'];?></td>						      
								      <td id = "itqty" style="width: 2%; text-align: center;"><input type="number" class="pt-0 form-control-plaintext text-center" style = "width:80%;" id = "itqtyinput" value = "<?php echo $v['r_item_qty'];?>" readonly></td>
								      <td style = "display: none" id = "itemId"><?php echo $v['receiver_item_id'];?></td>      
								      <td id = "btnparent" style="width: 16%"><button id ="<?php echo "editrecord".$v['receiver_item_id'];?>" type="button"   class = "btn-link" style="border:none; background-color: inherit;" onclick = "editItem(this);">Edit</button><button id ="<?php echo "updaterecord".$v['receiver_item_id'];?>" type="button" class = "btn-link" style="border:none; background-color: inherit; display: none" onclick = "updateItem(this);">Update</button> | <button id ="<?php echo "removerecord".$v['receiver_item_id'];?>" data-target = "#staticBackdropDeleteItem" class = "btn-link" data-toggle="modal" style="border:none; background-color: inherit;" onclick = "deleteItem(this);">Delete</button></td>
								    </tr>
								   <?php  $i++;}}?>
								  </tbody>
								</table>								
							</div>
						


<?php

if(empty($seecollectiondetails)){
	echo "<h3 class = 'card-body alert-danger'>No Items Added in This Collection</h3>";

}


?>