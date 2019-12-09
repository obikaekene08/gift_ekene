<?php

if($_POST){

require("Vendor.php");

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";



$obj = new Vendor;
$user = $_SESSION['user'];
// $directorname = $_POST['directorname'];
// $bizemail = $_POST['bizemail'];
// $biztype = $_POST['biztype'];
// $rcnumber = $_POST['rcnumber'];

$obj->insert('vendor_business_info',$user);

$obj->update($_POST,'vendor_id',$user,'vendor_business_info');

header("location:complete_registration.php");



}else{

	header("location:signup.php");
}



?>