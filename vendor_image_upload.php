<?php

if($_FILES){

require("vendor.php");

$obj = new Vendor;

$obj->doupload($_FILES,'vendor_images');






}




?>