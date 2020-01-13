<?php
include 'konekcija.php';

	$array['cols'][] = array('label' => 'Proizvod','type' => 'string');
    $array['cols'][] = array('label' => 'Kolicina', 'type' => 'number');

		$sql="select sum(s.kolicina) as broj,p.nazivProizvoda from proizvod p join stanjezaliha s on p.proizvodID=s.proizvodID group by p.proizvodID";

		$n = $db->rawQuery($sql);

		foreach($n as $vrednost){
		 $array['rows'][] = array('c' => array( array('v'=>$vrednost['nazivProizvoda']),array('v'=>(int)$vrednost['broj']))) ;

		}

		$niz_json = json_encode ($array);
		print ($niz_json);




?>
