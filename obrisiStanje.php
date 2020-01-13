<?php
include('konekcija.php');
$id = $_GET['id'];
$db-> where("stanjeID",$id);
$db -> delete('stanjezaliha');
header("Location: trenutnoStanje.php");
 ?>
