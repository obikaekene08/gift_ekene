<?php

if($_FILES){

require("Gifter.php");

$obj = new Gifter;

$obj->doupload($_FILES,'gifter_images');


}




?>