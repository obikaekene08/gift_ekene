<?php

require_once("User.php");

require_once("Vendor.php");

require_once("Receiver.php");

class Gifter extends User{

	function signup($fname,$lname,$phone,$email,$pwd){

		//the first if is for automatic signup when using function signupwithemail below
		if(isset($_SESSION['user'])){
			$encrypted_pass = $pwd;
		}else{
			$encrypted_pass = md5($pwd);
		}
		//end


		//this is to check if email already exists
		$checkifemailexists = $this->getdetailswithemail($email,'gifters');

		if(!empty($checkifemailexists)){

			$_SESSION['emailalreadyexists'] = "emailalreadyexists";
			$_SESSION['fname'] = $fname;
			$_SESSION['lname'] = $lname;
			$_SESSION['phone'] = $phone;
			$_SESSION['email'] = $email;

			header("location: giveagift.php");

			return;
		}
		//end
		
		$sql = " INSERT INTO gifters SET g_fname = '$fname', g_lname = '$lname', g_phone = '$phone', g_email = '$email', g_password = '$encrypted_pass' ";

		$this->conn->query($sql);

		$id = $this->conn->insert_id;

		if($id > 0){
			
			$reg_id = "GIFTER/".date("Y.m.d")."/".$id;

			$this->conn->query(" UPDATE gifters SET  g_user_id = '$reg_id' WHERE gifter_id = '$id' ");

			if(isset($_SESSION['user'])){

				$_SESSION['user'] = $id;

				$_SESSION['route'] = 'gift';

			}else{

			$_SESSION['user'] = $id;

			//this is to fetch email and assign to session
			$emailfetch = $this->getdetails($_SESSION['user'],'gifters');

			$_SESSION['useremail'] = $emailfetch['g_email'];
			//end

			header("location: gifterprofile.php");

			}
			
		}else{

			$_SESSION['error'] = "failedsignup";

			header("location: giveagift.php");
		}


	}


	function signupwithoutlogin($email){
	
	$sql = " INSERT INTO gifters SET g_email = '$email' ";

	$this->conn->query($sql);

	$id = $this->conn->insert_id;

	if($id > 0){
		
		$reg_id = "GIFTER/".date("Y.m.d")."/".$id;

		$this->conn->query(" UPDATE gifters SET  g_user_id = '$reg_id' WHERE gifter_id = '$id' ");


		if(isset($_SESSION['user'])){

			$_SESSION['user'] = $id;

			$_SESSION['route'] = 'gift';

		}else{

		$_SESSION['user'] = $id;

		$_SESSION['route'] = 'gift';

		//this is to fetch email and assign to session
		$emailfetch = $this->getdetails($_SESSION['user'],'gifters');

		$_SESSION['useremail'] = $emailfetch['g_email'];
		//end

		header("location: gifterprofile.php");

		}
		
	}else{

		$_SESSION['error'] = "failedsignup";

		header("location: giveagift.php");
	}


	}



	function login($username,$pwd){

					$encrypted_pass = md5($pwd);

		$sql = " SELECT * FROM gifters WHERE g_email = '$username' AND g_password = '$encrypted_pass' LIMIT 1";

		$result = $this->conn->query($sql);
		echo $this->conn->error;

		$row = [];

		if($result->num_rows > 0){

			$row = $result->fetch_assoc();

			$_SESSION['user'] = $row['gifter_id'];

			$_SESSION['route'] = 'gift';

			//this is to fetch email and assign to session
			$emailfetch = $this->getdetails($_SESSION['user'],'gifters');

			$_SESSION['useremail'] = $emailfetch['g_email'];
			//end
					
			$_SESSION['loginstatus'] = "success";

			header("location: gifterprofile.php");


		}else{

			if(isset($_SESSION['centrallogin']) && ($_SESSION['centrallogin'] == 'centrallogin')){

				$_SESSION['loginstatus'] = "failed";

			}else{

			$_SESSION['loginstatus'] = "failed";

			header("location:giveagift.php");

			}

			
		}

	}

	function getdetails($id, $table){

		$sql = " SELECT * FROM $table WHERE gifter_id = '$id' ";

		$result = $this->conn->query($sql);

		if($result->num_rows>0){

			$row = $result->fetch_assoc();
			
			return $row;
			
		}
	}

	function getdetailswithemail($email, $table){

		if($table == 'vendors'){

			$emailcol = 'v_email';

		}else if($table == 'receivers'){

			$emailcol = 'r_email';

		}else if($table == 'gifters'){
			$emailcol = 'g_email';
		}

		$sql = " SELECT * FROM $table WHERE $emailcol = '$email' ";

		$result = $this->conn->query($sql);

		if($result->num_rows>0){

			$row = $result->fetch_assoc();
			
			return $row;
			
		}
	}

	function signupemail($email,$table){

		$emaildetails = $this->getdetailswithemail($email,$table);

		if($table == 'vendors'){

		$fname = $emaildetails['v_fname'];
		$lname = $emaildetails['v_lname'];
		$phone = $emaildetails['v_phone'];
		$email = $emaildetails['v_email'];
		$pwd = $emaildetails['v_password'];
		$pic = $emaildetails['v_pic_name'];
		$address = $emaildetails['v_address'];

		}else if($table == 'receivers'){

		$fname = $emaildetails['r_fname'];
		$lname = $emaildetails['r_lname'];
		$phone = $emaildetails['r_phone'];
		$email = $emaildetails['r_email'];
		$pwd = $emaildetails['r_password'];
		$pic = $emaildetails['r_pic_name'];
		$address = $emaildetails['r_delivery_address'];

		}

		$this->signup($fname,$lname,$phone,$email,$pwd);

		$this->updateupload('gifters', 'g_pic_name',$pic,'gifter_id',$_SESSION['user']);
		$this->updateupload('gifters', 'g_location',$address,'gifter_id',$_SESSION['user']);
		
	

		
	}

	function getdetails2($id, $table){

		$sql = " SELECT * FROM $table WHERE receiver_id = '$id' ";

		$result = $this->conn->query($sql);

		if($result->num_rows>0){

			$row = $result->fetch_assoc();
			
			return $row;
			
		}
	}

	function getdetails3($id,$id2,$table){

		$sql = " SELECT * FROM $table WHERE receiver_id = '$id' AND r_event_id = '$id2' ";

		$result = $this->conn->query($sql);

		if($result->num_rows>0){

			$row = $result->fetch_assoc();
			
			return $row;
			
		}
	}

function update($collect, $K1,$v1,$table){

	$all = "";

		foreach ($collect as $key => $value) {

			$all = $all. ",". $key. " = ". " '$value' ";
			
		}

		$sql2 = " UPDATE $table SET $K1 = '$v1' $all WHERE receiver_id = $v1 ";



		 $this->conn->query($sql2);
		 
		 echo $this->conn->error;

		 $result = $this->conn->affected_rows;


		// if($result > 0){

			$re = $this->getdetails($v1, $table);
			echo json_encode($re);

		// }


}

	function insert($table,$id){


		$sql = " SELECT * FROM $table WHERE receiver_id = '$id' ";

		$result = $this->conn->query($sql);

		if($result->num_rows>0){

			// $row = $result->fetch_assoc();

			// return $row;
		}else{

		$sql = " INSERT INTO $table SET receiver_id = '$id' ";

		$this->conn->query($sql);}
		echo $this->conn->error;

		// $sid = $this->conn->insert_id;

		// return $sid;
		
			
			

	}


	function imageupload(){


		move_uploaded_file($filename, $t);


}


	function getseveral($table){

		$sql = " SELECT * FROM $table";

		$result = $this->conn->query($sql);
		$list = [];
		if($result->num_rows>0){
			while($row = $result->fetch_assoc()){


				$list[] = $row;

			}

			echo $this->conn->error;

			return $list;
		}



	}


	function getseveralwhere($table,$colname,$id = 0){

		$sql = " SELECT * FROM $table WHERE $colname = '$id' ";

		$result = $this->conn->query($sql);
		echo $this->conn->error;
		$list = [];
		if($result->num_rows>0){
			while($row = $result->fetch_assoc()){


				$list[] = $row;

			}

			return $list;
		}



	}

	function additem($r_id, $r_cat_name, $r_item_name,$r_item_price,$item_color,$item_qty){

		$r = $this->getseveralwhere('category_table','category_name',$v_cat_name);

		$v_cat_id = $r[0]['category_id'];

		$v_id = $_SESSION['user'];

		$sql = " INSERT INTO receiver_item SET receiver_id = '$r_id', r_cat_id = '$r_cat_id', r_item_name = '$r_item_name', r_item_price = '$r_item_price', item_color = '$item_color', item_qty = '$item_qty' ";

		$r = $this->conn->query($sql);

		echo $this->conn->error;

		$sid = $this->conn->insert_id;

		return $sid;

	

	}

	function selectmake($table,$itemid){

		insert($table,$itemid);

	}


	function doupload($filearray,$imagefolder){	

	$filename = $filearray['profile']['tmp_name'];
	$original_name = $filearray['profile']['name'] ;			
	$filesize = $filearray['profile']['size'];
	$allowed_extensions = array('jpg','png','jpeg');
	$extension = @end(explode('.',$original_name)); //will pick the last pieces in the exploded array
	$error = array();//to hold all the error messages 
	if(!in_array($extension, $allowed_extensions)){
		$error[] = "This extension is not allowed";
	}
	if($filesize > 1000000){ 
		$error[] = "File is too large";
	}
	if(empty($error)){
		$newname = time().".".$extension; 
		$dst = $imagefolder. "/".$newname;
		$t = move_uploaded_file($filename, $dst);
		$_SESSION['picupload'] = $t;
		$this->updateupload('gifters','g_pic_name',$dst,'gifter_id',$_SESSION['user']);
		$imagedetails = $this->getdetails($_SESSION['user'],'gifters');
		$_SESSION['imagelocation'] = $imagedetails['r_pic_name'];
		header("location: gifterprofile.php");
	}else{
		$_SESSION['errors'] = $error;
		 header("location: gifterprofile.php");//if any, the errors can be retrieved from $_SESSION['errors'] on picture.php
	}
	
}

	function updateupload($table, $col1,$v1,$id,$v2){

		$sql2 = " UPDATE $table SET $col1 = '$v1' WHERE $id = '$v2' ";

		 $this->conn->query($sql2);
		 
		 echo $this->conn->error;

		 $result = $this->conn->affected_rows;

		 return $result;
	}



	function addcollection($receiver_id, $r_event_type, $r_event_title,$r_message){

		$sql = " INSERT INTO receiver_events SET receiver_id = '$receiver_id', r_event_type = '$r_event_type', r_event_title = '$r_event_title', r_message = '$r_message' ";

		$r = $this->conn->query($sql);

		echo $this->conn->error;

		$id = $this->conn->insert_id;

		if($id > 0){
			
			header("location: createcollection.php");
		}else{

			header("location: receiverprofile.php");
		}

	}

	function searchitem($price,$selectcategory,$merchant,$brand){

		$r = $this->getseveralwhere('price','price_id',$price);

		$price_low = $r[0]['low'];
		$price_high = $r[0]['high'];

		
		// $y = $this->getseveralwhere('vendors','v_companyname',$merchant);

		// $id = $y[0]['vendor_id'];

		$v_id = $_SESSION['user'];

		$first = " SELECT * FROM vendor_item WHERE v_item_price >= $price_low AND v_item_price <= $price_high AND v_item_name LIKE '%$brand%' AND v_cat_id ";
		if($selectcategory == 0){
		$second = "!= 0 AND vendor_id";}else{
		$second = "= $selectcategory AND vendor_id ";
		}

		if($merchant == 0){
			$third = " != 0" ;
		}else{
			$third = " = $merchant";
		}
		$sql = $first . $second. $third;
		

		$result = $this->conn->query($sql);

		echo $this->conn->error;

		$list = [];

		// if($result->num_rows>0){
			while($row = $result->fetch_assoc()){


				$list[] = $row;

			}

			return $list;
		// }

	

	}

		function searchRName($searchval){

		$sql = " SELECT * FROM receivers JOIN receiver_item ON receivers.receiver_id = receiver_item.receiver_id JOIN receiver_events ON receivers.receiver_id = receiver_events.receiver_id WHERE r_fname LIKE '%$searchval%'OR r_event_title LIKE '%$searchval%' OR r_phone  LIKE '%$searchval%' GROUP BY receiver_events.r_event_id ";		

		$result = $this->conn->query($sql);
		echo $this->conn->error;

		$list = [];

		// if($result->num_rows>0){
			while($row = $result->fetch_assoc()){


				$list[] = $row;

			}

			return $list;
		// }

	

	}

	function searchMerchant($searchval){

		$sql = " SELECT * FROM vendor_item JOIN vendors ON vendor_item.vendor_id = vendors.vendor_id JOIN category_table ON category_table.category_id = vendor_item.v_cat_id WHERE v_item_name LIKE '%$searchval%' OR v_companyname LIKE '%$searchval%' OR category_id  LIKE '%$searchval%' ";		

		$result = $this->conn->query($sql);
		echo $this->conn->error;

		$list = [];

		// if($result->num_rows>0){
			while($row = $result->fetch_assoc()){


				$list[] = $row;

			}

			return $list;
		// }

	

	}


	function includeitem($table,$r_event_id,$gifter_id,$itqty,$receiver_itid){

		$deet = $this->getseveralwhereNoGroup('receiver_item','vendor_item','receiver_item.v_item_id','vendor_item.v_item_id','receiver_item.receiver_item_id',$receiver_itid);

		$v_itid = $deet[0]['v_item_id'];
		$receiver_id = $deet[0]['receiver_id'];

		$sql = " INSERT INTO $table SET gifter_id = '$gifter_id', receiver_item_id = '$receiver_itid', g_item_qty = '$itqty', v_item_id = '$v_itid', receiver_id = '$receiver_id', r_event_id = '$r_event_id' ";

		$r = $this->conn->query($sql);

		echo $this->conn->error;

		$y = $this->getseveralwheretwocolumns($table,'gifter_id',$gifter_id,'r_event_id',$r_event_id);
		
		return $y;
	
	}

	function getseveralwheretwocolumns($table,$colname,$id = 0,$colname2,$id2 = 0){

		$sql = " SELECT * FROM $table WHERE $colname = '$id' AND $colname2 = '$id2'";

		$result = $this->conn->query($sql);
		echo $this->conn->error;
		$list = [];
		if($result->num_rows>0){
			while($row = $result->fetch_assoc()){


				$list[] = $row;

			}

			return $list;
		}


}

function getcheckoutitems($id = 0,$id2 = 0){

		$sql = " SELECT * FROM gift_selection JOIN receiver_item ON gift_selection.receiver_item_id = receiver_item.receiver_item_id JOIN vendor_item ON receiver_item.v_item_id = vendor_item.v_item_id WHERE gift_selection.gifter_id = '$id' AND gift_selection.r_event_id = '$id2'";

		$result = $this->conn->query($sql);
		echo $this->conn->error;
		$list = [];
		if($result->num_rows>0){
			while($row = $result->fetch_assoc()){


				$list[] = $row;

			}

			return $list;
		}


}


function insert_pay($itemsarray,$userid){

	$gifter = $_SESSION['user'];


$total = 0;
if(is_array($itemsarray)){

foreach($itemsarray as $value){

	$itemid = $value['receiver_item_id'];
	$itemdetails = $this->getseveralwhereNoGroup('receiver_item','vendor_item','receiver_item.v_item_id','vendor_item.v_item_id','receiver_item.receiver_item_id',$itemid);
	
	$item_amt = $itemdetails[0]['v_item_price'];
	$transid = $_SESSION['transref'];

	$sql = " INSERT INTO gifter_to_receiver_payment SET receiver_item_id = '$itemid', pay_amount = '$item_amt', pay_status = 'Pending', gifter_id = '$userid', pay_trxref = '$transid' ";

	$this->conn->query($sql);

	echo $this->conn->error;

	$total = $total + (($item_amt)*($itemdetails[0]['r_item_qty']));


}

$_SESSION['total'] = $total;

$getemail = $this->getdetails($userid,'gifters');

$_SESSION['user_email'] = $getemail['g_email'];

}

}


function getseveralwheregroup($table,$table2,$colname,$colname2,$id = 0, $col1,$col2){

		$sql = " SELECT *, COUNT($id) AS counter FROM $table JOIN $table2 ON $col1 = $col2 WHERE $colname2 = '$id' GROUP BY $colname ";
		

		$result = $this->conn->query($sql);
		echo $this->conn->error;
		$list = [];
		if($result->num_rows>0){
			while($row = $result->fetch_assoc()){


				$list[] = $row;

			}

			$_SESSION['item_id'] = $result->num_rows;

			return $list;
		}



	}

	function getseveralwhereNoGroup($table,$table2,$colname,$colname2,$col,$id = 0){

		$sql = " SELECT * FROM $table JOIN $table2 ON $colname = $colname2 WHERE $col = '$id' ";
		

		$result = $this->conn->query($sql);
		// echo $sql;
		echo $this->conn->error;
		$list = [];
		if($result->num_rows>0){
			while($row = $result->fetch_assoc()){


				$list[] = $row;

			}

			return $list;
		}



	}


	function removeitem($table,$colname,$id = 0){

		$sql = " DELETE FROM $table WHERE $colname = '$id' ";
		
		$result = $this->conn->query($sql);
		echo $this->conn->error;


		$sid = $this->conn->affected_rows;

		
	}

	

}


?>