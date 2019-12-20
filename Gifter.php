<?php

require("User.php");

class Gifter extends User{

	function signup($fname,$lname,$phone,$email,$pwd){

		$encrypted_pass = md5($pwd);

		$sql = " INSERT INTO gifters SET g_fname = '$fname', g_lname = '$lname', g_phone = '$phone', g_email = '$email', g_password = '$encrypted_pass' ";

		$this->conn->query($sql);

		$id = $this->conn->insert_id;

		if($id > 0){
			
			$reg_id = "GIFTER/".date("Y.m.d")."/".$id;

			$this->conn->query(" UPDATE gifters SET  g_user_id = '$reg_id' WHERE gifter_id = '$id' ");

			$_SESSION['user'] = $id;

			header("location: gifterprofile.php");
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

			

			if(isset($_SESSION['modallogin']) && $_SESSION['modallogin'] == 'modallogin'){
				$_SESSION['loginstatus'] = "success";
				

		}else{
			$_SESSION['loginstatus'] = "success";

		header("location: gifterprofile.php");

			}


		}else{

			if(isset($_SESSION['modallogin']) && $_SESSION['modallogin'] == 'modallogin'){
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

	function getdetails2($id, $table){

		$sql = " SELECT * FROM $table WHERE receiver_id = '$id' ";

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

		$sql = " SELECT * FROM receivers JOIN receiver_item ON receivers.receiver_id = receiver_item.receiver_id JOIN receiver_events ON receivers.receiver_id = receiver_events.receiver_id WHERE r_fname LIKE '%$searchval%'OR r_event_title LIKE '%$searchval%' OR r_phone  LIKE '%$searchval%' ";		

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


	function cartitem($itqty,$itid){

		// $r = $this->getseveralwhere('receiver_events','r_event_title',$eventtitle);


		// echo $this->conn->error;

		// $r_event_id = $r[0]['r_event_id']; //remember to collect back itemid and use it for includeitem

			$gifter = $_SESSION['user'];

		$sql = " INSERT INTO purchase_item SET gifter_id = '$gifter', v_item_id = '$itid', g_item_qty = '$itqty' ";

		$r = $this->conn->query($sql);

		echo $this->conn->error;

		$y = $this->getseveralwhere('purchase_item','gifter_id',$gifter);

		
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

			$_SESSION['item_id'] = $result->num_rows;

			return $list;
		}



	}

	

}


?>