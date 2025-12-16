<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pembayaran</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="data/movies.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
</head>

<body>

<div class="pay-wrapper">

<form id="paymentForm" method="POST" action="process_payment.php">
    <input type="hidden" name="movie_id" id="fMovieId">
    <input type="hidden" name="movie_title" id="fMovie">
    <input type="hidden" name="cinema" id="fCinema">
    <input type="hidden" name="showtime" id="fTime">
    <input type="hidden" name="seat" id="fSeat">
    <input type="hidden" name="total_price" id="fTotal">
    <input type="hidden" name="payment_method" id="fMethod">
</form>


    <h2>Pilih Metode Pembayaran</h2>

    <!-- Film Info -->
    <div class="pay-film">
        <img id="payPoster" class="pay-poster">
        <div>
            <h3 id="payTitle"></h3>
            <p id="payCinema"></p>
            <p id="payTime"></p>
            <p id="paySeat"></p>
            <p id="payTotal"></p>
        </div>
    </div>

    <!-- Payment Options -->
    <div class="pay-method-list">

        <div class="pay-card" onclick="pay('qris')">
            <img src="images/qris.jpg" class="pay-icon">
            <span>QRIS</span>
        </div>

        <div class="pay-card" onclick="pay('gopay')">
            <img src="images/gopay.jpg" class="pay-icon">
            <span>GoPay</span>
        </div>

        <div class="pay-card" onclick="pay('ovo')">
            <img src="images/ovo.jpg" class="pay-icon">
            <span>OVO</span>
        </div>

        <div class="pay-card" onclick="pay('dana')">
            <img src="images/dana.jpg" class="pay-icon">
            <span>DANA</span>
        </div>

        <div class="pay-card" onclick="pay('bca')">
            <img src="images/bca.jpg" class="pay-icon">
            <span>Transfer BCA</span>
        </div>

        <div class="pay-card" onclick="pay('mandiri')">
            <img src="images/bank.jpg" class="pay-icon">
            <span>Transfer Mandiri</span>
        </div>

    </div>

</div>

<script>
// =======================
// GET URL PARAMS
// =======================
const url = new URLSearchParams(location.search);
const id = parseInt(url.get("id"));
const time = url.get("time");
const seats = url.get("seats") ? url.get("seats").split(",") : [];

const movie = movies.find(m => m.id === id);

// =======================
// AMBIL HARGA TIKET
// =======================
const hargaTiket = Number(localStorage.getItem("hargaTiket")) || 50000;
const totalHarga = seats.length * hargaTiket;

// =======================
// TAMPILKAN DATA
// =======================
document.getElementById("payPoster").src = movie.poster;
document.getElementById("payTitle").innerText = movie.title;
document.getElementById("payCinema").innerText = movie.showtimes[0].cinema;
document.getElementById("payTime").innerText = "Jam: " + time;
document.getElementById("paySeat").innerText = "Kursi: " + seats.join(", ");
document.getElementById("payTotal").innerText =
    "Rp " + totalHarga.toLocaleString("id-ID");

// =======================
// CLICK HANDLER
// =======================
function pay(method) {
    document.getElementById("fMovieId").value = id; // ⬅️ INI PENTING
    document.getElementById("fMovie").value   = movie.title;
    document.getElementById("fCinema").value  = movie.showtimes[0].cinema;
    document.getElementById("fTime").value    = time;
    document.getElementById("fSeat").value    = seats.join(",");
    document.getElementById("fTotal").value   = seats.length * 50000;
    document.getElementById("fMethod").value  = method.toUpperCase();

    document.getElementById("paymentForm").submit();
}
</script>

</body>
</html>

