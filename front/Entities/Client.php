<?php
class Client 
{
	private $id_client;
	private $username;
	private $password;
	private $nom;
	private $prenom;
	private $tel;
	private $email;
	
	 function __construct($id_client,$username,$password,$nom,$prenom,$tel,$email)
	{
		$this->id_client=$id_client;
		$this->username=$username;
		$this->password=$password;
		$this->nom=$nom;
		$this->prenom=$prenom;
		$this->tel=$tel;
		$this->email=$email;
	}



	function getid_client(){
		return $this->id_client;
	}
	function getUsername(){
		return $this->username;
	}
	function getPassword(){
		return $this->password;
	}
	function getNom(){
		return $this->nom;
	}
	function getPrenom(){
		return $this->prenom;
	}

	function getTel(){
		return $this->tel;
	}
	function getEmail(){
		return $this->email;
	}

/****************************/

	function setid_client($id_client){
		$this->id_client=$id_client;
	}
	function setUsername($username){
		$this->username=$username;
	}
	function setNom($nom){
		$this->nom=$nom;
	}
	function setPrenom($prenom){
		$this->prenom;
	}
	function setPassword($password){
		$this->password=$password;
	}
	function setTel($tel){
		$this->tel=$tel;
	}
	function setEmail($email){
		$this->email=$email;
	}






















}

  ?>