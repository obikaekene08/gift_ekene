<?php

require('User.php');

$obj = new User;

$sendmsgname = $_POST['sendmsgname'];
$sendmsgemail = $_POST['sendmsgemail'];
$sendmsgmsg = $_POST['sendmsgmsg'];
$sendmsgcheck = $_POST['sendmsgcheck'];
$table = 'send_us_message';

$insert_msg = $obj->insert_msg($table,$sendmsgname,$sendmsgemail,$sendmsgmsg,$sendmsgcheck);

if($insert_msg > 0){

	echo "Message Sent Successfully";
}


?>