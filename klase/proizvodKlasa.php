<?php

class Proizvod {

	private $db;

	public function __construct($db) {
		$this->db = $db;
	}

	public function unesiProizvod() {
		if(!isset($_POST['naziv']) || !isset($_POST['cena']) || !isset($_POST['opis']) || !isset($_POST['brend'])){
			return false;

		}
		if($_POST['naziv']=='' || $_POST['cena']=='' || $_POST['opis']=='' || $_POST['brend']==''){
			return false;

		}


			$data = Array (
				
					"nazivProizvoda" => trim($_POST['naziv']),
					"opisProizvoda" => trim($_POST['opis']),
					"brendID" => trim($_POST['brend']),
					"cena" => trim($_POST['cena'])
			);


			$sacuvano = $this->db->insert('proizvod', $data);

			if($sacuvano) {
			return true;

			}
			else {
				return false;
			}



	}


}

?>
