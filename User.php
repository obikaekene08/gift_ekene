<?php

class User{

	protected $conn;

	function __construct(){

		session_start();

		$this->conn = new Mysqli("localhost","root","","giftdatabase");
	}

	function insert_msg($table,$sendmsgname,$sendmsgemail,$sendmsgmsg,$sendmsgcheck){

		$sql = " INSERT INTO $table SET name = '$sendmsgname', email = '$sendmsgemail', message = '$sendmsgmsg', subscribe = '$sendmsgcheck' ";

		$r = $this->conn->query($sql);

		echo $this->conn->error;

		$sid = $this->conn->insert_id;

		return $sid;

	}

} 


?>