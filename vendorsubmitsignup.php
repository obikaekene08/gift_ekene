<?php

if($_POST){

require("Vendor.php");

echo "<pre>";
print_r($_POST);
echo "</pre>";


$fname = $_POST['fname'];
$lname = $_POST['lname'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$pwd = $_POST['pwd'];

$obj = new Vendor;

$obj->signup($fname,$lname,$phone,$email,$pwd);


}else{

	header("location:signup.php");
}



?>