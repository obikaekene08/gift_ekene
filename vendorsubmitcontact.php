<?php


if($_POST){

require("Vendor.php");


$obj = new Vendor;
$user = $_SESSION['user'];

$obj->update($_POST,'vendor_id',$user,'vendors');


// header("location:complete_registration.php");


}else{

	header("location:signup.php");
}



?>