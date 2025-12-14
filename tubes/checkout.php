<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="data/movies.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
</head>

<body>

<div class="checkout-wrapper">

    <h2>Ringkasan Pembelian</h2>

    <div class="checkout-card">
        <img id="coPoster" class="checkout-poster">

        <div class="checkout-info">
            <h3 id="coTitle"></h3>
            <p id="coCinema"></p>
            <p id="coTime"></p>
            <p id="coSeat"></p>
            <p id="coPrice"></p>
        </div>
    </div>

    <button class="btn-primary pay-btn" id="payNow">Bayar Sekarang</button>

</div>

<script>
// ---------------------
// GET DATA DARI URL
// ---------------------
const url = new URLSearchParams(location.search);
const id = parseInt(url.get("id"));
const time = url.get("time");
const seats = url.get("seats") ? url.get("seats").split(",") : [];

// ---------------------
// AMBIL DATA FILM
// ---------------------
const movie = movies.find(m => m.id === id);

document.getElementById("coPoster").src = movie.poster;
document.getElementById("coTitle").innerText = movie.title;
document.getElementById("coCinema").innerText = movie.showtimes[0].cinema;
document.getElementById("coTime").innerText = "Jam: " + time;
document.getElementById("coSeat").innerText = "Kursi: " + seats.join(", ");
document.getElementById("coPrice").innerText =
    "Total: Rp " + (seats.length * 50000).toLocaleString("id-ID");

// ---------------------
// TOMBOL BAYAR
// ---------------------
document.getElementById("payNow").onclick = () => {
    if (seats.length === 0) {
        alert("Pilih kursi dulu ya sayang ❤️");
        return;
    }

    location.href = `payment.php?id=${id}&time=${time}&seats=${seats.join(",")}`;
};
</script>

</body>
</html>