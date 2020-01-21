
<?php

require("Gifter.php");
$r = new Gifter;

if(!isset($_SESSION['user']))
{
  header("location: index.php");
}

$ref = $_SESSION['transref'];

$result = array();
//Set other parameters as keys in the $postdata array

$totalamt = ($_SESSION['total']*1);

$user_email = $_SESSION['user_email'];

$postdata =  array('email' => 'obika.ekene@gmail.com', 'amount' => $totalamt,"reference" => $ref);
$url = "https://api.paystack.co/transaction/initialize";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($postdata));  //Post Fields
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$headers = [
  'Authorization: Bearer sk_test_55395d2aab27b8a3b8bd403909f44dbed551d95b',
  'Content-Type: application/json',

];
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$request = curl_exec ($ch);



if ($request) {
	curl_close ($ch);
  $result = json_decode($request, true);
}else{
	echo curl_error($ch);
}
//Use the $result array to get redirect URL

// echo "<pre>";
// print_r($result);
// echo "</pre>";

if(isset($result['status']) && isset($result['message'])){
if($result['status']){
	$authurl = $result['data']['authorization_url'];

	//retrieve access code from the result and save in your table - do this by updating table

header("location: $authurl");
}else{

	echo $result['message'];
	
}

}


?>