<?php
require 'flight/Flight.php';
require 'jsonindent.php';


Flight::route('/', function(){

	die("Boho Zalihe");
});


Flight::register('db', 'Database', array('bohozalihe'));


Flight::route('GET /brend', function()
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$db->brend();

	$niz =  array();
	$iterator = 0;
	while ($red = $db->getResult()->fetch_object())
	{
		$niz[$iterator] = $red;
		$iterator += 1;
	}

	echo indent(json_encode($niz));
});


Flight::route('GET /stanja', function()
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$db->stanja();

	$niz =  array();
	$iterator = 0;
	while ($red = $db->getResult()->fetch_object())
	{
		$niz[$iterator] = $red;
		$iterator += 1;
	}

	echo indent(json_encode($niz));
});

Flight::route('GET /proizvod', function()
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$db->proizvod();

	$niz =  array();
	$iterator = 0;
	while ($red = $db->getResult()->fetch_object())
	{
		$niz[$iterator] = $red;
		$iterator += 1;
	}

	echo indent(json_encode($niz));
});

Flight::route('GET /korisnici', function()
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$db->korisnici();

	$niz =  array();
	$iterator = 0;
	while ($red = $db->getResult()->fetch_object())
	{
		$niz[$iterator] = $red;
		$iterator += 1;
	}

	echo indent(json_encode($niz));
});

Flight::route('POST /registracija', function()
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$post_data = file_get_contents('php://input');
	$json_data = json_decode($post_data,true);
	$db->ubaciKorisnika($json_data);
	if($db->getResult())
	{
		$response = "OK";
	}
	else
	{
		$response = "Neuspesno";

	}

	echo indent(json_encode($response));

});


Flight::start();
?>
