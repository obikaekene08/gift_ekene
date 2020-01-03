<?php


require("Gifter.php");
$r = new Gifter;

if(!isset($_SESSION['user']))
{
  header("location: index.php");
}


$gifter_id = $_SESSION['user'];


$_SESSION['transref'] = mt_rand(); //generate the transaction ref and keep in session

$details = $r->insert_pay($_SESSION['checkout_items'],$gifter_id);

print_r($details);

header("location:paystack.php");


?>