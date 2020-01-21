<?php

if($_POST['reason'] == "joinasvendor"){

require("Vendor.php");


$fname = $_POST['fname'];
$lname = $_POST['lname'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$pwd = $_POST['pwd'];

$obj = new Vendor;

$obj->signup($fname,$lname,$phone,$email,$pwd);


}

else if($_POST['reason'] == "receivegifts"){

require("Receiver.php");

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";


$fname = $_POST['fname'];
$lname = $_POST['lname'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$pwd = $_POST['pwd'];

$obj = new Receiver;

$obj->signup($fname,$lname,$phone,$email,$pwd);


}else if($_POST['reason'] == "givegift"){

require("Gifter.php");

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";


$fname = $_POST['fname'];
$lname = $_POST['lname'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$pwd = $_POST['pwd'];

$obj = new Gifter;

$obj->signup($fname,$lname,$phone,$email,$pwd);


}

else{

	header("location:signup.php");
}



?>