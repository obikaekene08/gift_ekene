<?php



require("Receiver.php");

 $obj = new Receiver;

$itemId = $_POST['itemid'];

?>

<div class="modal-body pt-0 mt-0">
	<h5 class = "card-text">Are you sure about removing this item?</h5>
	<p class = "card-text" style="font-size: 15px; color:red">This will be deleted permanently.</p>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
	<button type="button" class="btn btn-primary" data-dismiss="modal" onclick = "finalDeleteItem(this); ">Yes, Remove</button>
	<span id = "itemid" style="display: none"><?php echo $itemId; ?></span>
	<span id = "loaddiv"></span>
</div>
