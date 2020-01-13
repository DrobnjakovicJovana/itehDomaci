<?php

class Brend {

	private $db;

	public function __construct($db) {
		$this->db = $db;
	}

	

	public function dodajBrend() {
		if(!isset($_POST['brend'])){
			return false;

		}
		if($_POST['brend']==''){
			return false;


		}
		$podaci = Array (
				"nazivBrenda" => trim($_POST['brend']),
				
		);
		
		
		$sacuvano = $this->db->insert('brend', $podaci);

			if($sacuvano) {
					return true;

			}
			else {
				    return false;
			}


	}



}

?>
