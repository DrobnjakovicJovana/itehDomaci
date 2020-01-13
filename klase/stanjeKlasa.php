<?php

class Stanje {

	private $db;

	public function __construct($db) {
		$this->db = $db;
	}

	public function unesiStanje() {
		if(!isset($_POST['prodavnica']) || !isset($_POST['proizvod']) || !isset($_POST['kolicina'])){
			return false;

		}
		if($_POST['prodavnica']=='' || $_POST['proizvod']=='' || $_POST['kolicina']==''){
			return false;

		}

		$postoji = $this->db->rawQuery("select * from stanjezaliha where prodavnicaID=".$_POST['prodavnica']." and proizvodID=".$_POST['proizvod']);

		if(count($postoji)>0){


				$this->db->rawQuery("update stanjezaliha set kolicina= kolicina +".$_POST['kolicina']." where prodavnicaID=".$_POST['prodavnica']." and proizvodID=".$_POST['proizvod']);
				return true;
		}else{


			$data = Array (
					"prodavnicaID" => trim($_POST['prodavnica']),
					"proizvodID" => trim($_POST['proizvod']),
					"kolicina" => trim($_POST['kolicina'])
			);

			$sacuvano = $this->db->insert('stanjezaliha', $data);

			if($sacuvano) {
			return true;

			}
			else {
				return false;
			}

		}

	}


     public function izmeniStanje($id) {


		$data = Array (
				trim($_POST['kolicina']),
				 trim($id)

		);
		$sacuvano = $this->db->rawQuery("Update stanjezaliha set kolicina = ? where stanjeID=?",$data);

			return true;

	}

	


}

?>
