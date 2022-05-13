<?php
	define('HOST','localhost');
	define('USER','root');
	define('DB','dbpegadaian');
	define('PASS','');
	$conn = new mysqli(HOST,USER,PASS,DB) or die('Connetion error to the database');

	date_default_timezone_set("ASIA/JAKARTA");

	$koneksi = mysqli_connect(HOST,USER,PASS,DB);
 
	if($koneksi->connect_error){
	die("Koneksi gagal");
	}
?>