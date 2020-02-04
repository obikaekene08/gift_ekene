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
	
?>
				

						<div class = "col-md-3 col-6 mt-2">
						<div class="card text-center alert-success">
						  <div class="card-body text-center">
						  	<form action = "" class = "text-center">
						  	<img src="images/noimage3.jpg" class="card-img-top" height = "180px" alt="...">
						    <h5 class="card-title mt-2" id = "itname"><?php if($v['v_item_name'] != '') {echo $v['v_item_name'];}else{ echo "No Item Name";}?></h5>
						    <p class="card-text"><b>Unit Price: </b><span id = "itprice"> <?php echo "&#8358;".number_format($v['v_item_price'],2);?></span></p>
						    <p class="card-text"><b>Stock: </b><span class="card-text" id = "itstk"> <?php echo $v['item_qty'];?></span></p>
						    <b>Qty: </b><span class = "text-center" style = "width:20%;" id = "itqty"><?php echo $v['r_item_qty'];?></span>
						    <span style = "display: none" class="card-text" id = "receiver_itid"> <?php echo $v['receiver_item_id'];?></span><br>	    
						    <button type = "button" class="btn btn-primary col-8 mt-2" id = "itbtn" onclick = "iteminclude(this);" style = "">Shop Item</button>						    
						    <button type = "button" class="btn btn-danger col-8 mt-2" id = "itremove" style = "display: none">Remove Item</button>
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




