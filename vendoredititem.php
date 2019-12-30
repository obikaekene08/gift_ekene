<?php



require("Vendor.php");

 $obj = new Vendor;

$itemName = $_POST['itemName'];
$catName = $_POST['catName'];
$itemPrice = $_POST['itemPrice'];
$itemColor = $_POST['itemColor'];
$itemQty = $_POST['itemQty'];
$itemId = $_POST['itemId'];
$vendor_id  = $_SESSION['user'];




?>
<form method = "POST" action = "additem.php" enctype="multipart/form-data" id = "additemform">
      <div class="modal-body" id = "divsib">
      	<div class = "row">
      		<div class = "col-5">
        		<img src="images/noimage3.jpg" class="card-img-top" alt="...">      					
      					<div class="form-group row mt-2">
						    <label for="exampleFormControlFile1" class="col-sm-12 col-form-label">Select Image<span style = "color:red">*</span></label>
						    <div class="col-sm-12">
						    <input type="file" class="form-control-file" id = "selectimage">
							</div>
						 </div>						 
						</div>
						<div class = "col-7">
							<div class="form-group row">
						    <label for="staticEmail" class="col-sm-3 col-form-label">Category<span style = "color:red">*</span></label>
						    <div class="col-sm-9">
						      <input type="text" class="form-control" id = "catname" value="<?php echo $catName;?>">
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="staticEmail" class="col-sm-3 col-form-label mr-0 pr-0">Item Name<span style = "color:red">*</span></label>
						    <div class="col-sm-9">
						      <input type="text" class="form-control" id = "itemname" value="<?php echo $itemName;?>">
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="staticEmail" class="col-sm-3 col-form-label">Unit Price<span style = "color:red">*</span></label>
						    <div class="col-sm-9">
						      <input type="text" class="form-control" id = "itemprice" value="<?php echo $itemPrice;?>">
						    </div>
						  </div>

						  <div class="form-group row">
						    <label for="staticEmail" class="col-sm-3 col-form-label">Colour<span style = "color:red">*</span></label>
						    <div class="col-sm-9">
						      <input type="text" class="form-control" id = "itemcolor" value="<?php echo $itemColor;?>">
						    </div>
						  </div>
						  <div style = "display: none" id = "itemid"><?php echo $itemId;?></div>
						  <div class="form-group row">
						    <label for="inputPassword" class="col-sm-3 col-form-label">Quantity<span style = "color:red">*</span></label>
						    <div class="col-sm-9">						      
							<input type="number" class="form-control" id = "itemqty" value="<?php echo $itemQty;?>">
						    </div>
						  </div>
						</div>
						</div>
	      			</div>
	      <div class="modal-footer" id = "editbtndiv">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
	        <button type="button" class="btn btn-primary" id = "edititembtn" onclick = "updateitem(this); $('#tableofitems').load('vendor_dashboard.php #tableofitems2'); $('#bodyofitem').load('itemsadded.php');" data-dismiss="modal">Save Changes</button>
	      </div>
	      </form>

<?php
  	
?>