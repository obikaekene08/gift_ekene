<?php

require_once("User.php");

class Receiver extends User{

	function signup($fname,$lname,$phone,$email,$pwd){

		//the first if is for automatic signup when using function signupwithemail below
		if(isset($_SESSION['user'])){
			$encrypted_pass = $pwd;
		}else{
			$encrypted_pass = md5($pwd);
		}
		//end

		//this is to check if email already exists
		$checkifemailexists = $this->getdetailswithemail($email,'receivers');

		if(!empty($checkifemailexists)){

			$_SESSION['emailalreadyexists'] = "emailalreadyexists";
			$_SESSION['fname'] = $fname;
			$_SESSION['lname'] = $lname;
			$_SESSION['phone'] = $phone;
			$_SESSION['email'] = $email;

			header("location: receivegifts.php");

			return;
		}
		//end

		$sql = " INSERT INTO receivers SET r_fname = '$fname', r_lname = '$lname', r_phone = '$phone', r_email = '$email', r_password = '$encrypted_pass' ";

		$this->conn->query($sql);

		$id = $this->conn->insert_id;

		if($id > 0){
			
			$reg_id = "RECE/".date("Y.m.d")."/".$id;

			$this->conn->query(" UPDATE receivers SET  r_user_id = '$reg_id' WHERE receiver_id = '$id' ");


			if(isset($_SESSION['user'])){ //this is for other sign up to access other functions like gifting or vendoring

			$_SESSION['user'] = $id;

			$_SESSION['route'] = 'receive';

			}else{ //this is for original sign up

			$_SESSION['user'] = $id;

			$_SESSION['route'] = 'receive';

			//this is to fetch email and assign to session
			$emailfetch = $this->getdetails($_SESSION['user'],'receivers');

			$_SESSION['useremail'] = $emailfetch['r_email'];
			//end


			header("location: receiverprofile.php");

			}

		}else{

			$_SESSION['error'] = "failedsignup";

			header("location: receivegifts.php");
		}


	}


	function signupwithoutlogin($email){


		$sql = " INSERT INTO receivers SET r_email = '$email' ";

		$this->conn->query($sql);

		$id = $this->conn->insert_id;

		if($id > 0){
			
			$reg_id = "RECE/".date("Y.m.d")."/".$id;

			$this->conn->query(" UPDATE receivers SET  r_user_id = '$reg_id' WHERE receiver_id = '$id' ");

		
			if(isset($_SESSION['user'])){

			$_SESSION['user'] = $id;

			$_SESSION['route'] = 'receive';

			}else{

			$_SESSION['user'] = $id;

			$_SESSION['route'] = 'receive';

			//this is to fetch email and assign to session
			$emailfetch = $this->getdetails($_SESSION['user'],'receivers');

			$_SESSION['useremail'] = $emailfetch['r_email'];
			//end


			header("location: receiverprofile.php");

			}

		}else{

			$_SESSION['error'] = "failedsignup";

			header("location: receivegifts.php");
		}


	}


	function login($username,$pwd){

					$encrypted_pass = md5($pwd);

		$sql = " SELECT * FROM receivers WHERE r_email = '$username' AND r_password = '$encrypted_pass' LIMIT 1";

		$result = $this->conn->query($sql);

		$row = [];

		if($result->num_rows > 0){

			$row = $result->fetch_assoc();

			$_SESSION['user'] = $row['receiver_id'];

			$_SESSION['route'] = 'receive';

			//this is to fetch email and assign to session
			$emailfetch = $this->getdetails($_SESSION['user'],'receivers');

			$_SESSION['useremail'] = $emailfetch['r_email'];
			//end

			$_SESSION['loginstatus'] = "success";

			header("location: receiverprofile.php");

		
		}else{

		if(isset($_SESSION['centrallogin']) && ($_SESSION['centrallogin'] == 'centrallogin')){

				$_SESSION['loginstatus'] = "failed";
				$_SESSION['loginemail'] = $username;

			}else{

			$_SESSION['loginstatus'] = "failed";
			$_SESSION['loginemail'] = $username;

			header("location:receivegifts.php");

			}
			
		}

	}

	function changepassword($passwordname, $table, $col,$id,$newpass, $oldpass){

		$sql = " SELECT $passwordname FROM $table WHERE $col = '$id' ";

		$result = $this->conn->query($sql);

		$row = $result->fetch_assoc();

		$encrypted_pass = md5($oldpass);

		if($encrypted_pass == $row[$passwordname]){

		$encrypted_newpass = md5($newpass);

		$sql2 = " UPDATE $table SET $passwordname = '$encrypted_newpass' WHERE $col = '$id' ";

		$result2 = $this->conn->query($sql2);

		$result3 = $this->conn->affected_rows;

		if($result3 > 0){

			return "Password was Successfully Changed";
		}else{

			return "Oops... Something went wrong, ensure new and old password are not the same";
		}


		}else{

			return "Old Password is not correct";
		}


	}

	function getdetails($id, $table){

		$sql = " SELECT * FROM $table WHERE receiver_id = '$id' ";

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

		}else if($table == 'gifters'){

		$fname = $emaildetails['g_fname'];
		$lname = $emaildetails['g_lname'];
		$phone = $emaildetails['g_phone'];
		$email = $emaildetails['g_email'];
		$pwd = $emaildetails['g_password'];
		$pic = $emaildetails['g_pic_name'];
		$address = $emaildetails['g_location'];

		}

		$this->signup($fname,$lname,$phone,$email,$pwd);

		$this->updateupload('receivers', 'r_pic_name',$pic,'receiver_id',$_SESSION['user']);
		$this->updateupload('receivers', 'r_delivery_address',$address,'receiver_id',$_SESSION['user']);
		
		
	}

	function getdetailswhere($id, $table,$colname){

		$sql = " SELECT * FROM $table WHERE $colname = '$id' ";

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

			$_SESSION['item_id'] = $result->num_rows;

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


function doupload($filearray,$imagefolder,$imagetable,$imagecol,$imagecoluserid,$imageuserid){	

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
		$this->updateupload($imagetable,$imagecol,$dst,$imagecoluserid,$imageuserid);
		
	}else{
		$_SESSION['errors'] = $error;
		 
	}
	
}


	function updateupload($table, $col1,$v1,$id,$v2){

		$sql2 = " UPDATE $table SET $col1 = '$v1' WHERE $id = '$v2' ";

		 $this->conn->query($sql2);
		 
		 echo $this->conn->error;

		 $result = $this->conn->affected_rows;

		 return $result;
	}



	function addcollection($receiver_id, $r_event_type, $r_event_title,$r_message,$r_event_date,$r_event_duedate){

		$sql = " INSERT INTO receiver_events SET receiver_id = '$receiver_id', r_event_type = '$r_event_type', r_event_title = '$r_event_title', r_message = '$r_message', r_event_date = '$r_event_date' , r_event_duedate = '$r_event_duedate' ";

		$r = $this->conn->query($sql);

		echo $this->conn->error;

		$id = $this->conn->insert_id;

		if($id > 0){

			$details = $this->getdetailswhere($id,'receiver_events','r_event_id');
			
			$_SESSION['r_event_id'] = $details['r_event_id'];
			$_SESSION['r_event_title'] = $details['r_event_title'];

			return $id;
		
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

		function searchMain($searchval){

		$sql = " SELECT * FROM vendor_item JOIN vendors ON vendor_item.vendor_id = vendors.vendor_id JOIN category_table ON category_table.category_id = vendor_item.v_cat_id WHERE v_item_name LIKE '%$searchval%' OR v_companyname LIKE '%$searchval%' OR category_id  LIKE '%$searchval%'  ";		

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


	function includeitem($r_event_id,$receiver_id, $itqty,$itid){

		// $r = $this->getseveralwhere('receiver_events','r_event_title',$eventtitle);


		// echo $this->conn->error;

		// $r_event_id = $r[0]['r_event_id']; //remember to collect back itemid and use it for includeitem		

		$sql = " INSERT INTO receiver_item SET receiver_id = '$receiver_id', v_item_id = '$itid', r_event_id = '$r_event_id', r_item_qty = '$itqty' ";

		$r = $this->conn->query($sql);

		echo $this->conn->error;

		$y = $this->getseveralwhere('receiver_item','r_event_id',$r_event_id);

		
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

			$_SESSION['item_id'] = $result->num_rows;

			return $list;
		}


}


function getseveralwheregroup($table,$table2,$col1,$col2,$colname2,$id = 0,$col3,$colname){

		$sql = " SELECT *, SUM($col3) AS counter FROM $table LEFT JOIN $table2 ON $col1 = $col2 WHERE $colname2 = '$id' GROUP BY $colname ";
		
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

			$_SESSION['item_id'] = $result->num_rows;

			return $list;
		}



	}

	function updateitem($item_id, $item_qty){

		
		$sql = " UPDATE receiver_item SET r_item_qty = '$item_qty' WHERE receiver_item_id = '$item_id' AND approved = 1";

		$r = $this->conn->query($sql);

		echo $this->conn->error;

		$sid = $this->conn->affected_rows;

		return $sid;

	
	}


	function removeitem($table,$colname,$id = 0){

		$sql = " DELETE FROM $table WHERE $colname = '$id' ";
		
		$result = $this->conn->query($sql);
		echo $this->conn->error;

		$sid = $this->conn->affected_rows;

		echo $sid;

		
	}

	

}


?>