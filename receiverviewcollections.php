<?php

require("Receiver.php");

$obj = new Receiver;

$receiver_id = $_SESSION['user'];

$viewcollections = $obj->getseveralwheregroup('receiver_events','receiver_item','receiver_events.r_event_id','receiver_item.r_event_id','receiver_events.receiver_id',$receiver_id, 'receiver_item.r_item_qty','receiver_events.r_event_id');

 

// print_r($viewcollections);

?>



<?php
if(!empty($viewcollections)){
foreach($viewcollections as $key => $v) { 

	$revent_id = $v['r_event_id']; 
	$r_event_title = $v['r_event_title'];
	$r_message = $v['r_message']; 
	$r_event_date = $v['r_event_date']; 
	$r_event_duedate = $v['r_event_duedate']; 
	$r_event_pic = $v['r_event_pic'];

	
?>
				

						<div class = "col-md-4 col-lg-3 col-sm-6 offset-sm-0 col-9 offset-1 mt-2 mediaQueryVendorCard">
							<div class="card text-center">
							  <div class="card-body">
							  	<img src="<?php if($v['r_event_pic'] != ''){ echo $v['r_event_pic'];}else{echo 'images/avatar.png';}?>" class="card-img-top" height = "180px" alt="...">
							    <h5 class="card-title mt-2"><?php echo $v['r_event_title'];?></h5>
							    <p class="card-text"><b>Event Creation Date: </b><br><?php $d = strtotime($v['r_event_creation_time']); echo date("F j, Y",$d); ?></p>
							    <p class="card-text"><b>Items Selected: </b><?php if($v['counter'] != ''){echo $v['counter']; }else{echo 0;};?> </p>
							    <a href=' <?php echo "collectiondetails.php?eventid=".$revent_id."&eventtitle=".$r_event_title." " ?> ' class="btn btn-primary">See Details</a>
							  </div>
							</div>
						</div>

<?php

}

}

?>
<script>

</script>

<?php

if(empty($viewcollections)){
	echo "<h3 class = 'card-body alert-danger'>No Collections Added</h3>";

}


?>