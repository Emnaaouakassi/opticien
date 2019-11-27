<?php
class Admin 
{
	private $id;
	private $full_name;
	private $email;
	private $phone;
	private $password;
	private $status;
	
	 function __construct($id,$full_name,$email,$passwrod,$phone,$status)
	{
		$this->id=$id;
		$this->full_name=$full_name;
		$this->email=$email;
		$this->phone=$phone;
		$this->password=$passwrod;
		$this->status=$status;
	}



	function getid(){
		return $this->id;
	}
	function getfullname(){
		return $this->full_name;
	}
	function getemail(){
		return $this->email;
	}
	function getphone(){
		return $this->phone;
	}
	function getpassword(){
		return $this->password;
	}

	function getstatus(){
		return $this->status;
	}

/****************************/

	function setid($id){
		$this->id=$id;
	}
	function setfullname($full_name){
		$this->full_name=$full_name;
	}
	function setemail($email){
		$this->email=$email;
	}
	function setphone($phone){
		$this->phone=$phone;
	}
	function setpassword($password){
		$this->password=$password;
	}
	function setstatus($status){
		$this->status=$status;
	}

}

  ?>