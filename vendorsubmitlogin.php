<?php


if($_POST){

require("Vendor.php");

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

$username = trim(htmlentities(addslashes($_POST['email'])));
$pwd = htmlentities(addslashes($_POST['pwd']));

$obj = new Vendor;

$obj->login($username,$pwd);

}else{

	header("location:signup.php");

}




?>
