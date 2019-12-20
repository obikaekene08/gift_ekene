<?php


if($_POST){

require("Gifter.php");

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

$username = $_POST['email'];
$pwd = $_POST['pwd'];


$obj = new Gifter;

$obj->login($username,$pwd);

}else{

	header("location:giveagift.php");

}




?>
