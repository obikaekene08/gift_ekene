<?php


if($_POST){

require("Vendor.php");


$obj = new Vendor;
$user = $_SESSION['user'];

$post = [];

foreach($_POST as $k => $v){

	$post[$k] = trim(htmlentities(addslashes($_POST[$k])));
}

$obj->update($post,'vendor_id',$user,'vendors');

// header("location:complete_registration.php");

}else{

	header("location:signup.php");
}



?>