<?php

if($_POST){

require("Vendor.php");


$obj = new Vendor;
$user = $_SESSION['user'];

$obj->insert('vendor_bank_info',$user);
$obj->update($_POST,'vendor_id',$user,'vendor_bank_info');



}else{

	header("location:signup.php");
}



?>