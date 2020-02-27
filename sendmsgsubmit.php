<?php

require('User.php');

$obj = new User;

$sendmsgname = trim(htmlentities(addslashes($_POST['sendmsgname'])));
$sendmsgemail = trim(htmlentities(addslashes($_POST['sendmsgemail'])));
$sendmsgmsg = trim(htmlentities(addslashes($_POST['sendmsgmsg'])));
$sendmsgcheck = $_POST['sendmsgcheck'];
$table = 'send_us_message';

$insert_msg = $obj->insert_msg($table,$sendmsgname,$sendmsgemail,$sendmsgmsg,$sendmsgcheck);

if($insert_msg > 0){

	echo "Message Sent Successfully";
}


?>