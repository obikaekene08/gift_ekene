<?php

if($_FILES){

require("Receiver.php");

$obj = new Receiver;

$imageuserid = $_SESSION['user'];


$obj->doupload($_FILES,'receiver_images','receivers','r_pic_name','receiver_id',$imageuserid);


header("location: receiverprofile.php");
}




?>