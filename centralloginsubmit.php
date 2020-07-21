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

unset($_SESSION['centrallogin']);

}

//attempt receiver login
if($_SESSION['loginstatus'] == "failed"){

require_once("Receiver.php");

$username = trim(htmlentities(addslashes($_POST['email'])));
$pwd = htmlentities(addslashes($_POST['pwd']));


$obj = new Receiver;

$_SESSION['centrallogin'] = 'centrallogin';

$obj->login($username,$pwd);

unset($_SESSION['centrallogin']);

}

//attempt gifter login
if($_SESSION['loginstatus'] == "failed"){

require_once("Gifter.php");

$username = trim(htmlentities(addslashes($_POST['email'])));
$pwd = htmlentities(addslashes($_POST['pwd']));

$obj = new Gifter;

$_SESSION['centrallogin'] = 'centrallogin';

$obj->login($username,$pwd);

unset($_SESSION['centrallogin']);
	
}

if($_SESSION['loginstatus'] == "failed"){

	header("location:signup.php");
}



}else{

	header("location:signup.php");

}




?>
