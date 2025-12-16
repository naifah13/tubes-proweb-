<?php
require_once "koneksi.php";
$movie   = $_POST['movie'];
$movie_id = $_POST['movie_id'];
$movie    = $_POST['movie_title'];
$cinema   = $_POST['cinema'];
$time     = $_POST['showtime'];
$seat     = $_POST['seat'];
$total    = $_POST['total_price'];
$method   = $_POST['payment_method'];

// simpan ke DB
mysqli_query($koneksi, "
    INSERT INTO data_pembelian
    (user_name, movie_title, cinema_name, showtime, seat, total_price, payment_method)
    VALUES
    ('guest', '$movie', '$cinema', '$time', '$seat', '$total', '$method')
");

// redirect KE ETICKET (ID TIDAK BOLEH HILANG)
header("Location: eticket.php?id=$movie_id&time=$time&seats=$seat&method=$method");
exit;

