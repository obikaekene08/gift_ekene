<?php

require("Receiver.php");

$obj = new Receiver;

$receiver_id = $_SESSION['user'];

$viewcollections = $obj->getseveralwheregroup('receiver_item','receiver_events','receiver_item.r_event_id','receiver_item.receiver_id',$receiver_id,'receiver_item.r_event_id','receiver_events.r_event_id');



// print_r($viewcollections);

?>



<?php

foreach($viewcollections as $key => $v) { $revent_id = $v['r_event_id']; $r_event_title = $v['r_event_title'];$r_message = $v['r_message'];
	
?>

				

						<div class = "col-md-3 col-6">
							<div class="card text-center">
							  <div class="card-body">
							  	<img src="images/couple2.jpg" class="card-img-top" alt="...">
							    <h5 class="card-title mt-2"><?php echo $v['r_event_title'];?></h5>
							    <p class="card-text"><b>Event Creation Date: </b> <?php echo $v['r_item_selection_time'];?></p>
							    <p class="card-text"><b>Items Selected: </b><?php echo $v['counter'];?> </p>
							    <a href=' <?php echo "collectiondetails.php?eventid=".$revent_id."&eventtitle=".$r_event_title."&r_message=".$r_message." " ?> ' class="btn btn-primary">See Details</a>
							  </div>
							</div>
						</div>

<?php

}

?>
<script>

</script>

<?php

if(empty($viewcollections)){
	echo "<h3 class = 'card-body alert-danger'>No Collections Added</h3>";

}


?>