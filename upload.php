<?php

		include("konekcija.php");


    $name     = $_FILES['file']['name'];
    $tmpName  = $_FILES['file']['tmp_name'];
    $targetPath =  dirname( __FILE__ ) . DIRECTORY_SEPARATOR. 'fajlovi' . DIRECTORY_SEPARATOR. $name;
    move_uploaded_file($tmpName,$targetPath);
    header( 'Location: fajlovi.php' ) ;
    exit;
  ?>
