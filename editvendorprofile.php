<?php


if($_POST['v_fname']){

require("Vendor.php");


$obj = new Vendor;
$user = $_SESSION['user'];

$post = [];

foreach($_POST as $k => $v){

	$post[$k] = trim(htmlentities(addslashes($_POST[$k])));
}

$obj->update($post,'vendor_id',$user,'vendors');

}elseif($_POST['director_name']){

require("Vendor.php");


$obj = new Vendor;
$user = $_SESSION['user'];

$post = [];

foreach($_POST as $k => $v){

	$post[$k] = trim(htmlentities(addslashes($_POST[$k])));
}

$obj->update($post,'vendor_id',$user,'vendor_business_info');

}elseif($_POST['account_number']){

require("Vendor.php");


$obj = new Vendor;
$user = $_SESSION['user'];

$post = [];

foreach($_POST as $k => $v){

	$post[$k] = trim(htmlentities(addslashes($_POST[$k])));
}

$obj->update($post,'vendor_id',$user,'vendor_bank_info');
	
}else{

	header("location:signup.php");
}



?>