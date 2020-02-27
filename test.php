<?php

// $list = [1,2,3];



function checkStatus($n,$L){

$x = 0;

foreach($L as $v){

	$x = $x + $v;

	if($x == $v){

		continue;
		
	}elseif($x == $n){

		return true;

	}
}

	return false;

}

$value = checkStatus(10,[1,2,3,1]);

echo $value;

?>