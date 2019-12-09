<?php

if($_POST){

require("Vendor.php");

echo "<pre>";
print_r($_POST);
echo "</pre>";


// $fname = $_POST['fname'];
// $lname = $_POST['lname'];
// $lname = $_POST['bname'];
// $phone = $_POST['phone'];
// $email = $_POST['email'];
// $address = $_POST['address'];

$obj = new Vendor;
$user = $_SESSION['user'];

$obj->update($_POST,'vendor_id',$user,'vendors');

header("location:complete_registration.php");


}else{

	header("location:signup.php");
}



?>