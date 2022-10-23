<?php

$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'kosambi';

$connection = new mysqli($hostname,$username,$password,$database);

if ($connection->connect_error) {
   die('Maaf koneksi gagal: '. $connection->connect_error);
}
?>
