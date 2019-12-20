<?php

require("Gifter.php");

$obj = new Gifter;

$searchval = $_POST['searchval'];

$search_item = $obj->searchRName($searchval);
?>

<?php if(!empty($search_item)) {?>

<table class="table table-dark">
                    <thead>
                      <tr>
                        <th scope="col">Event</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Phone</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach($search_item as $v){ $revent_id = $v['r_event_id']; $receiver_id = $v['receiver_id'];$r_event_title = $v['r_event_title']; $r_message = $v['r_message'];?>
                      <tr>
                        <th scope="row"><a href='<?php echo "gifterviewreceiver.php?eventid=".$revent_id."&receiver_id=".$receiver_id."&eventtitle=".$r_event_title."&r_message=".$r_message." " ?>'><?php echo $v['r_event_title'];?></a></th>                        
                        <td><a href='<?php echo "gifterviewreceiver.php?eventid=".$revent_id."&receiver_id=".$receiver_id."&eventtitle=".$r_event_title."&r_message=".$r_message." " ?>'><?php echo $v['r_fname'];?></a></td>
                        <td><a href='<?php echo "gifterviewreceiver.php?eventid=".$revent_id."&receiver_id=".$receiver_id."&eventtitle=".$r_event_title."&r_message=".$r_message." " ?>'><?php echo $v['r_lname'];?></a></td>
                        <td><a href='<?php echo "gifterviewreceiver.php?eventid=".$revent_id."&receiver_id=".$receiver_id."&eventtitle=".$r_event_title."&r_message=".$r_message." " ?>'><?php echo $v['r_phone'];?></a></td>
                      </tr>
                    <?php };?>
                    </tbody>
                  </table>

<?php

}else{
	echo "<h3 class = 'card-body alert-danger'>No Item Found</h3>";
}

?>


