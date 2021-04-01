<?php
$hostName	= "localhost";
$userName	= "root";
$passWord	= "root";
$database	= "survey";

//$masuk = mysql_connect($hostName,$userName,$passWord) or die('Connection Failed');
//$hore = mysql_select_db($database) or die('Database Failed');

$conni = mysqli_connect($hostName,$userName,$passWord, $database) or die("Koneksi gagal");
mysqli_select_db($conni, $database) or die("Database tidak bisa dibuka");

?>