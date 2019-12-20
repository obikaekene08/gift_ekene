<?php

if($_FILES){

require("Receiver.php");

$obj = new Receiver;

$obj->doupload($_FILES,'receiver_images');


}




?>