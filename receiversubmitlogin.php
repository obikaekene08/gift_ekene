<?php


if($_POST){

require("Receiver.php");

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

$username = $_POST['email'];
$pwd = $_POST['pwd'];


$obj = new Receiver;

$obj->login($username,$pwd);

}else{

	header("location:receivegifts.php");

}




?>
