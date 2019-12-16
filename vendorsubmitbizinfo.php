<?php

if($_POST){

require("Vendor.php");




$obj = new Vendor;
$user = $_SESSION['user'];


$obj->insert('vendor_business_info',$user);

$obj->update($_POST,'vendor_id',$user,'vendor_business_info');






}else{

	header("location:signup.php");
}



?>