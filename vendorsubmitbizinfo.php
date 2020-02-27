<?php

if($_POST){

require("Vendor.php");

$obj = new Vendor;
$user = $_SESSION['user'];

$post = [];

foreach($_POST as $k => $v){

	$post[$k] = trim(htmlentities(addslashes($_POST[$k])));
}


$obj->insert('vendor_business_info',$user);

$obj->update($post,'vendor_id',$user,'vendor_business_info');

}else{

	header("location:signup.php");
}



?>