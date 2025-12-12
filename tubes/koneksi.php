<?php

if(!isset($_SESSION)){
    session_start();
}
$host = 'localhost';
$user = 'root';
$pass = "";
$database = 'tubes_proweb';

$koneksi  = mysqli_connect($host, $user, $pass, $database);

if($koneksi->connect_error){
die("koneksi gagal: ".mysqli_connect_error());
} else echo "Koneksi Berhasil";
?>
