<?php

require_once("User.php");

class Vendor extends User{

	function signup($fname,$lname,$phone,$email,$pwd){

		//the first if is for automatic signup when using function signupwithemail below
		if(isset($_SESSION['user'])){
			$encrypted_pass = $pwd;
		}else{
			$encrypted_pass = md5($pwd);
		}
		//end

		//this is to check if email already exists
		$checkifemailexists = $this->getdetailswithemail($email,'vendors');

		if(!empty($checkifemailexists)){

			$_SESSION['emailalreadyexists'] = "emailalreadyexists";
			$_SESSION['fname'] = $fname;
			$_SESSION['lname'] = $lname;
			$_SESSION['phone'] = $phone;
			$_SESSION['email'] = $email;

			header("location: becomeavendor.php");

			return;
		}
		//end

		$sql = " INSERT INTO vendors SET v_fname = '$fname', v_lname = '$lname', v_phone = '$phone', v_email = '$email', v_password = '$encrypted_pass' ";

		$this->conn->query($sql);

		$id = $this->conn->insert_id;

		if($id > 0){
			
			$reg_id = "VEN/".date("Y.m.d")."/".$id;

			$this->conn->query(" UPDATE vendors SET  v_user_id = '$reg_id' WHERE vendor_id = '$id' ");

			
			if(isset($_SESSION['user'])){

			$_SESSION['user'] = $id;

			$_SESSION['route'] = 'vendor';

			}else{

			$_SESSION['user'] = $id;

			$_SESSION['route'] = 'vendor';

			//this is to fetch email and assign to session
			$emailfetch = $this->getdetails($_SESSION['user'],'vendors');

			$_SESSION['useremail'] = $emailfetch['v_email'];
			//end

			header("location: complete_registration.php");

			}


		}else{

			$_SESSION['error'] = "failedsignup";

			header("location: signup.php");
		}


	}

	function login($username,$pwd){

					$encrypted_pass = md5($pwd);

		$sql = " SELECT * FROM vendors WHERE v_email = '$username' AND v_password = '$encrypted_pass' LIMIT 1";

		$result = $this->conn->query($sql);

		$row = [];

		if($result->num_rows > 0){

			$row = $result->fetch_assoc();

			$_SESSION['user'] = $row['vendor_id'];

			$_SESSION['route'] = 'vendor';

			//this is to fetch email and assign to session
			$emailfetch = $this->getdetails($_SESSION['user'],'vendors');

			$_SESSION['useremail'] = $emailfetch['v_email'];
			// end

			$_SESSION['loginstatus'] = "success";

			header("location: vendor_dashboard.php");


		}else{


			if(isset($_SESSION['centrallogin']) && ($_SESSION['centrallogin'] == 'centrallogin')){

				$_SESSION['loginstatus'] = "failed";

			}else{

			$_SESSION['loginstatus'] = "failed";

			header("location:signup.php");

			}
			
		}

	}

	function getdetails($id, $table){

		$sql = " SELECT * FROM $table WHERE vendor_id = '$id' ";

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

		print_r($emaildetails);

		if($table == 'receivers'){

		$fname = $emaildetails['r_fname'];
		$lname = $emaildetails['r_lname'];
		$phone = $emaildetails['r_phone'];
		$email = $emaildetails['r_email'];
		$pwd = $emaildetails['r_password'];
		$pic = $emaildetails['r_pic_name'];
		$address = $emaildetails['r_delivery_address'];

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

		$this->updateupload('vendors', 'v_pic_name',$pic,'vendor_id',$_SESSION['user']);
		$this->updateupload('vendors', 'v_address',$address,'vendor_id',$_SESSION['user']);
		
		
	}



function update($collect, $K1,$v1,$table){

	$all = "";

		foreach ($collect as $key => $value) {

			$all = $all. ",". $key. " = ". " '$value' ";
			
		}

		$sql2 = " UPDATE $table SET $K1 = '$v1' $all WHERE vendor_id = $v1 ";



		 $this->conn->query($sql2);
		 
		 // echo $this->conn->error;

		 $result = $this->conn->affected_rows;


		// if($result > 0){

			$re = $this->getdetails($v1, $table);
			echo json_encode($re);

		// }


}

	function insert($table,$id){


		$sql = " SELECT * FROM $table WHERE vendor_id = '$id' ";

		$result = $this->conn->query($sql);

		if($result->num_rows>0){

			// $row = $result->fetch_assoc();

			// return $row;
		}else{

		$sql = " INSERT INTO $table SET vendor_id = '$id' ";

		$this->conn->query($sql);}
		echo $this->conn->error;

		// $sid = $this->conn->insert_id;

		// return $sid;
			
			

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


	function getseveralwhere($table,$colname,$id = 0, $extra = ''){

		$sql = " SELECT * FROM $table WHERE $colname = '$id' AND approved = 1 "." $extra ";

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

	function additem($v_id, $v_cat_name, $v_item_name,$v_item_price,$item_color,$item_qty){

		$r = $this->getseveralwhere('category_table','category_name',$v_cat_name);

		$v_cat_id = $r[0]['category_id'];

		$v_id = $_SESSION['user'];

		$sql = " INSERT INTO vendor_item SET vendor_id = '$v_id', v_cat_id = '$v_cat_id', v_item_name = '$v_item_name', v_item_price = '$v_item_price', item_color = '$item_color', item_qty = '$item_qty' ";

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
		 // header("location: vendor_dashboard.php");//if any, the errors can be retrieved from $_SESSION['errors'] on picture.php		
	}
	
}

	function updateupload($table, $col1,$v1,$id,$v2){

		$sql2 = " UPDATE $table SET $col1 = '$v1' WHERE $id = '$v2' ";

		 $this->conn->query($sql2);
		 
		 echo $this->conn->error;

		 $result = $this->conn->affected_rows;

		 return $result;
	}


	function getseveralwhereNoGroup($table,$table2,$colname,$colname2,$col,$id = 0,$extra,$extra2){

		$sql = " SELECT * FROM $table JOIN $table2 ON $colname = $colname2 WHERE $col = '$id' AND $table.approved = 1 "." $extra ". " $extra2 ";
		

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

	function updateitem($item_id, $v_cat_name, $v_item_name,$v_item_price,$item_color,$item_qty){

		$r = $this->getseveralwhere('category_table','category_name',$v_cat_name);

		$v_cat_id = $r[0]['category_id'];

		$sql = " UPDATE vendor_item SET v_cat_id = '$v_cat_id', v_item_name = '$v_item_name', v_item_price = '$v_item_price', item_color = '$item_color', item_qty = '$item_qty' WHERE v_item_id = '$item_id' AND approved = 1";

		$r = $this->conn->query($sql);

		echo $this->conn->error;

		$sid = $this->conn->affected_rows;

		return $sid;

	
	}

	function removeitem($table,$colname,$id = 0){

		$sql = " UPDATE $table SET approved = 0 WHERE $colname = '$id' ";

		$result = $this->conn->query($sql);
		echo $this->conn->error;

		$sid = $this->conn->affected_rows;

		return $sid;

		
	}

	

}



?>