<?php

if($_POST){

require("Receiver.php");

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
$obj = new Receiver;

$receiver_id  = $_SESSION['user'];
$r_event_type = $_POST['r_event_type'];
$r_event_title = $_POST['r_event_title'];
$r_message = $_POST['r_message'];

$add_event = $obj->addcollection($receiver_id, $r_event_type, $r_event_title,$r_message);

}else{

	header("location:receiverprofile.php");
}

?>