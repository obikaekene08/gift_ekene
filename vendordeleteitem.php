<?php



require("Vendor.php");

 $obj = new Vendor;

$itemId = $_POST['itemId'];
$vendor_id  = $_SESSION['user'];




?>

<div class="modal-body">
	<h5 class = "card-text">Are you sure about removing this item?</h5>
	<p class = "card-text">This will be deleted permanently.</p>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
	<button type="button" class="btn btn-primary" data-dismiss="modal" onclick = "finalRemoveItem(this); $('#tableofitems').load('vendor_dashboard.php #tableofitems2'); $('#bodyofitem').load('itemsadded.php');">Yes, Remove</button>
	<span id = "itemid" style="display: none"><?php echo $itemId; ?></span>
	<span id = "loaddiv"></span>
</div>
