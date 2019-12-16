<?php


if($_POST){

require("Vendor.php");

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

$username = $_POST['email'];
$pwd = $_POST['pwd'];


$obj = new Vendor;

$obj->login($username,$pwd);

}else{

	header("location:signup.php");

}




?>
