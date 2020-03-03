<?php

if(isset($_POST['route']) && ($_POST['route'] == 'receivegifts')){

require("Receiver.php");

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

$email = trim(htmlentities(addslashes($_POST['email'])));

$obj = new Receiver;

$obj->signupwithoutlogin($email);

}else if(isset($_POST['route']) &&( $_POST['route'] == 'giveagift')){

require("Gifter.php");

$email = trim(htmlentities(addslashes($_POST['email'])));

$obj = new Gifter;

$obj->signupwithoutlogin($email);

}else{

	header("location:signup.php");
}

?>