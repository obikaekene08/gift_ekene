<?php



require("Vendor.php");

 $obj = new Vendor;

$itemName = $_POST['itemName'];
$catName = $_POST['catName'];
$itemPrice = $_POST['itemPrice'];
$itemColor = $_POST['itemColor'];
$itemQty = $_POST['itemQty'];
$itemId = $_POST['itemId'];
$itemPic = $_POST['itemPic'];
$vendor_id  = $_SESSION['user'];


?>

<form method = "POST" action = "vendorupdateitem.php" enctype="multipart/form-data" id = "edititemform">
      <div class="modal-body" id = "divsib">
      	<div class = "row">
      		<div class = "col-5">
        		<img src="<?php if($itemPic != ""){ echo $itemPic; }else{echo 'images/noimage3.jpg';} ?>" class="card-img-top" height = "180px" alt="...">      					
      					<div class="form-group row mt-2">
						    <label for="exampleFormControlFile1" class="col-sm-12 col-form-label">Select Image<span style = "color:red">*</span></label>
						    <div class="col-sm-12">
						    <input type="file" class="form-control-file" id = "selectimage" accept = "image/*" name = "profile">
							</div>
						 </div>						 
						</div>
						<div class = "col-7">
							<div class="form-group row">
						    <label for="staticEmail" class="col-sm-3 col-form-label">Category<span style = "color:red">*</span></label>
						    <div class="col-sm-9">
						      <input type="text" class="form-control" id = "catname" name = "catName" value="<?php echo $catName;?>">
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="staticEmail" class="col-sm-3 col-form-label mr-0 pr-0">Item Name<span style = "color:red">*</span></label>
						    <div class="col-sm-9">
						      <input type="text" class="form-control" id = "itemname" name = "itemName" value="<?php echo $itemName;?>">
						    </div>
						  </div>
						  <div class="form-group row">
						    <label for="staticEmail" class="col-sm-3 col-form-label">Unit Price<span style = "color:red">*</span></label>
						    <div class="col-sm-9">
						      <input type="text" class="form-control" id = "itemprice" name = "itemPrice" value="<?php echo $itemPrice;?>">
						    </div>
						  </div>

						  <div class="form-group row">
						    <label for="staticEmail" class="col-sm-3 col-form-label">Colour<span style = "color:red">*</span></label>
						    <div class="col-sm-9">
						      <input type="text" class="form-control" id = "itemcolor" name = "itemColor" value="<?php echo $itemColor;?>">
						    </div>
						  </div>
						  <input type="text" style = "display: none" id = "itemId" name = "itemId" value = '<?php echo $itemId;?>'>
						  <div class="form-group row">
						    <label for="inputPassword" class="col-sm-3 col-form-label">Quantity<span style = "color:red">*</span></label>
						    <div class="col-sm-9">						      
							<input type="number" class="form-control" id = "itemqty" name = "itemQty" value="<?php echo $itemQty;?>">
						    </div>
						  </div>
						</div>
						</div>
	      			</div>
	      <div class="modal-footer" id = "editbtndiv">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal" id = "editItemClosebtnf">Cancel</button>
	        <button type="submit" class="btn btn-primary" id = "">Save Changes</button>
	      </div>
	      </form>

<?php
  	
?>

<script>

$("#edititemform").on('submit', (function(e) {

 	 e.preventDefault();
     
   $.ajax({
    url: "vendorupdateitem.php",
   type: "POST",
   data:  new FormData(this),
   contentType: false,
         cache: false,
   processData:false,
   success: function(data)
      {
      	$('#bodyofitem').load("itemsadded.php");
		$('#tableofitems').load("vendor_dashboard.php #tableofitems2");
      },
     error: function(e) 
      {
   alert(e);
      }

    });


$('#editItemClosebtnf').trigger("click");

 }));
 

</script>