<?php


if($_POST){


//attempt vendor login
if($_POST){
require_once("Vendor.php");

$username = trim(htmlentities(addslashes($_POST['email'])));
$pwd = htmlentities(addslashes($_POST['pwd']));

$obj = new Vendor;

$_SESSION['centrallogin'] = 'centrallogin';

$obj->login($username,$pwd);

}

//attempt receiver login
if($_SESSION['loginstatus'] == "failed"){

require_once("Receiver.php");

$username = trim(htmlentities(addslashes($_POST['email'])));
$pwd = htmlentities(addslashes($_POST['pwd']));


$obj = new Receiver;

$obj->login($username,$pwd);

}

//attempt gifter login
if($_SESSION['loginstatus'] == "failed"){

require_once("Gifter.php");

$username = trim(htmlentities(addslashes($_POST['email'])));
$pwd = htmlentities(addslashes($_POST['pwd']));

$obj = new Gifter;

$obj->login($username,$pwd);
	
}

}else{

	header("location:signup.php");

}




?>
