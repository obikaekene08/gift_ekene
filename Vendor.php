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
			header("location: vendor_dashboard.php");
		}else{
			$_SESSION['error'] = "failedlogin";
			header("location: signup.php");
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

		echo $sql2;

		 $this->conn->query($sql2);

		 echo $this->conn->error;


		if($this->conn->affected_rows > 0){

			$this->getdetails($v1, $table);

		}


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

		// $sid = $this->conn->insert_id;

		// return $sid;
			
			

	}




}



?>