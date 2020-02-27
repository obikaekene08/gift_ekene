<?php

if($_POST['reason'] == "joinasvendor"){

require("Vendor.php");


$fname = trim(htmlentities(addslashes($_POST['fname'])));
$lname = trim(htmlentities(addslashes($_POST['lname'])));
$phone = trim(htmlentities(addslashes($_POST['phone'])));
$email = trim(htmlentities(addslashes($_POST['email'])));
$pwd = htmlentities(addslashes($_POST['pwd']));

$obj = new Vendor;

$obj->signup($fname,$lname,$phone,$email,$pwd);


}

else if($_POST['reason'] == "receivegifts"){

require("Receiver.php");

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";


$fname = trim(htmlentities(addslashes($_POST['fname'])));
$lname = trim(htmlentities(addslashes($_POST['lname'])));
$phone = trim(htmlentities(addslashes($_POST['phone'])));
$email = trim(htmlentities(addslashes($_POST['email'])));
$pwd = htmlentities(addslashes($_POST['pwd']));

$obj = new Receiver;

$obj->signup($fname,$lname,$phone,$email,$pwd);


}else if($_POST['reason'] == "givegift"){

require("Gifter.php");


$fname = trim(htmlentities(addslashes($_POST['fname'])));
$lname = trim(htmlentities(addslashes($_POST['lname'])));
$phone = trim(htmlentities(addslashes( $_POST['phone'])));
$email = trim(htmlentities(addslashes($_POST['email'])));
$pwd = htmlentities(addslashes($_POST['pwd']));

$obj = new Gifter;

$obj->signup($fname,$lname,$phone,$email,$pwd);


}

else{

	header("location:signup.php");
}



?>