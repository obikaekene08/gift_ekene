<?php

if($_POST){

require("Gifter.php");

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";


$fname = trim(htmlentities(addslashes($_POST['fname'])));
$lname = trim(htmlentities(addslashes($_POST['lname'])));
$phone = trim(htmlentities(addslashes($_POST['phone'])));
$email = trim(htmlentities(addslashes($_POST['email'])));
$pwd = htmlentities(addslashes($_POST['pwd']));

$obj = new Gifter;

$obj->signup($fname,$lname,$phone,$email,$pwd);


}else{

	header("location:giveagift.php");
}



?>