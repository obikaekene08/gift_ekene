<?php

if($_POST){

require("Receiver.php");

$obj = new Receiver;

// echo "<pre>";
// print_r ($_POST);
// echo "</pre>";

$id  = $_SESSION['user'];
$oldpass = trim(htmlentities(addslashes($_POST['oldpass'])));
$newpass1 = trim(htmlentities(addslashes($_POST['newpass1'])));
$newpass2 = trim(htmlentities(addslashes($_POST['newpass2'])));
$passwordname = 'r_password';
$table = 'receivers';
$col = 'receiver_id';

$change_password = $obj->changepassword($passwordname, $table, $col, $id, $newpass1, $oldpass);

echo $change_password;

// $add_event = $obj->addcollection($receiver_id, $r_event_type, $r_event_title,$r_message,$r_event_date,$r_event_duedate);

// if($_FILES){

// $obj->doupload($_FILES,'receiver_event_image','receiver_events','r_event_pic','r_event_id',$add_event);

// }

// header("location: createcollection.php");

// }else{

// 	header("location:receiverprofile.php");
}

?>