<?php

if($_FILES){

require("vendor.php");

$obj = new Vendor;


$obj->doupload($_FILES,'vendor_images','vendors','v_pic_name','vendor_id',$_SESSION['user']);

header("location: vendor_dashboard.php");


}




?>