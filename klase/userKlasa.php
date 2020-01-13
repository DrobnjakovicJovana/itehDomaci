<?php

class User {

	private $db;

	public function __construct($db) {
		$this->db = $db;
	}

	

	public function registracija() {
		if(!isset($_POST['username']) || !isset($_POST['password']) || !isset($_POST['ime'])){
			return false;

		}
		if($_POST['username']=='' || $_POST['password']=='' || $_POST['ime']==''){
			return false;

		}
		$podaci = Array (
				"imePrezime" => trim($_POST['ime']),
				"username" => trim($_POST['username']),
                "password" => trim($_POST['password'])
		);
		
		$sacuvano = $this->db->insert('user', $podaci);

			if($sacuvano) {
					return true;

			}
			else {
				    return false;
			}


	}

	public function login() {
		if(!isset($_POST['username']) || !isset($_POST['password'])){
			return false;

		}
		if($_POST['username']=='' || $_POST['password']==''){
			return false;

		}


		$data = array($_POST['username'],$_POST['password']);
		
		$postoji = $this->db->rawQuery("select * from user where username=? and password=?",$data);

		if(count($postoji)>0){
				$_SESSION['user'] = $postoji[0];
				return true;
		}

		return false;

	}



}

?>
