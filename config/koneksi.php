<?php
$host     = 'localhost';
$user     = 'root'; // diisi dengan user database kalian biasanya
                    // defaultnya bernama root jika kita belum 
                    // merubahnya
$password = '';  //diisi dengan password database kalian biasanya
                 // defaultnya kosong
$db       = 'dbpegadaian'; //diisi dengan nama database kalian
  
$conn = mysqli_connect($host, $user, $password, $db) or die(mysqli_error());
?>