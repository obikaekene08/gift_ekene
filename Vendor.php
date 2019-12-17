<?php

require("User.php");

class Vendor extends User{

	function signup($fname,$lname,$phone,$email,$pwd){

		$encrypted_pass = md5($pwd);

		$sql = " INSERT INTO vendors SET v_fname = '$fname', v_lname = '$lname', v_phone = '$phone', v_email = '$email', v_password = '$encrypted_pass' ";

		$this->conn->query($sql);

		$id = $this->conn->insert_id;

		if($id > 0){
			
			$reg_id = "VEN/".date("Y.m.d")."/".$id;

			$this->conn->query(" UPDATE vendors SET  v_user_id = '$reg_id' WHERE vendor_id = '$id' ");

			$_SESSION['user'] = $id;

			header("location: complete_registration.php");
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

			

			if(isset($_SESSION['modallogin']) && $_SESSION['modallogin'] == 'modallogin'){
				$_SESSION['loginstatus'] = "success";
				// header("location: vendor_dashboard.php");

		}else{
			$_SESSION['loginstatus'] = "success";

		header("location: vendor_dashboard.php");

			}


		}else{

			if(isset($_SESSION['modallogin']) && $_SESSION['modallogin'] == 'modallogin'){
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

function update($collect, $K1,$v1,$table){

	$all = "";

		foreach ($collect as $key => $value) {

			$all = $all. ",". $key. " = ". " '$value' ";
			
		}

		$sql2 = " UPDATE $table SET $K1 = '$v1' $all WHERE vendor_id = $v1 ";



		 $this->conn->query($sql2);
		 
		 echo $this->conn->error;

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
		$this->updateupload('vendors','v_pic_name',$dst,'vendor_id',$_SESSION['user']);
		$imagedetails = $this->getdetails($_SESSION['user'],'vendors');
		$_SESSION['imagelocation'] = $imagedetails['v_pic_name'];
		header("location: vendor_dashboard.php");
	}else{
		$_SESSION['errors'] = $error;
		 header("location: vendor_dashboard.php");//if any, the errors can be retrieved from $_SESSION['errors'] on picture.php
	}
	
}

	function updateupload($table, $col1,$v1,$id,$v2){

		$sql2 = " UPDATE $table SET $col1 = '$v1' WHERE $id = '$v2' ";

		 $this->conn->query($sql2);
		 
		 echo $this->conn->error;

		 $result = $this->conn->affected_rows;

		 return $result;
	}

}



?>