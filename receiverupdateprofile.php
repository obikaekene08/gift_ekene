<?php


if($_POST){

require("Receiver.php");


$obj = new Receiver;
$user = $_SESSION['user'];

$post = [];

foreach($_POST as $k => $v){

	$post[$k] = trim(htmlentities(addslashes($_POST[$k])));
}

$obj->update($post,'receiver_id',$user,'receivers');


// header("location:complete_registration.php");


}else{

	header("location:signup.php");
}



?>