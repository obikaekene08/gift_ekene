<?php

if($_POST){

require("Receiver.php");

echo "<pre>";
print_r($_POST);
echo "</pre>";
$obj = new Receiver;

$receiver_id  = $_SESSION['user'];
$r_event_type = $_POST['r_event_type'];
$r_event_title = $_POST['r_event_title'];
$r_message = $_POST['r_message'];
$r_event_date = $_POST['r_event_date'];
$r_event_duedate = $_POST['r_event_duedate'];


$add_event = $obj->addcollection($receiver_id, $r_event_type, $r_event_title,$r_message,$r_event_date,$r_event_duedate);

if($_FILES){

$obj->doupload($_FILES,'receiver_event_image','receiver_events','r_event_pic','r_event_id',$add_event);

}

header("location: createcollection.php");

}else{

	header("location:receiverprofile.php");
}

?>