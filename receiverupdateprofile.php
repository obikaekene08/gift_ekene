<?php


if($_POST){

require("Receiver.php");


$obj = new Receiver;
$user = $_SESSION['user'];

$obj->update($_POST,'receiver_id',$user,'receivers');


// header("location:complete_registration.php");


}else{

	header("location:signup.php");
}



?>