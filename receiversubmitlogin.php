<?php


if($_POST){

require("Receiver.php");

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

$username = trim(htmlentities(addslashes($_POST['email'])));
$pwd = htmlentities(addslashes($_POST['pwd']));


$obj = new Receiver;

$obj->login($username,$pwd);

}else{

	header("location:receivegifts.php");

}




?>
