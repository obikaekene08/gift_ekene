<?php

if($_POST){

require("Vendor.php");

$obj = new Vendor;
$user = $_SESSION['user'];

$post = [];

foreach($_POST as $k => $v){

	$post[$k] = trim(htmlentities(addslashes($_POST[$k])));
}

$obj->insert('vendor_bank_info',$user);
$obj->update($post,'vendor_id',$user,'vendor_bank_info');

}else{

	header("location:signup.php");
}


?>