<?php

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://passwordwolf.com/api/");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$odg = curl_exec($ch);

$output = json_decode($odg);

curl_close($ch);

//var_dump($output) ;
echo $output[0]->password;
?>
