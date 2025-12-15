<?php
session_start();
require_once "koneksi.php";

// AMBIL DATA DARI FORM
$movie   = $_POST['movie'];
$cinema  = $_POST['cinema'];
$showtime = $_POST['fTime'];
$seats   = $_POST['seats'];
$total   = $_POST['total'];
$method  = $_POST['method'];

$user = $_SESSION['username'] ?? 'guest';

// INSERT KE DB
mysqli_query($koneksi, "
    INSERT INTO data_pembelian
    (user_name, movie_title, cinema_name, showtime, seat, total_price, payment_method)
    VALUES
    ('$user', '$movie', '$cinema', '$showtime', '$seats', '$total', '$method')
");

// REDIRECT KE ETICKET
header("Location: eticket.php?movie=$movie&cinema=$cinema&time=$time&seats=$seats&method=$method&total=$total");
exit;
