<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>E-Ticket</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="data/movies.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    
</head>

<body>

<div class="eticket-wrapper">

    <!-- BADGE -->
    <p class="eticket-badge">E-TICKET</p>

    <!-- POSTER -->
    <div class="poster-box">
    <img id="etPoster" class="eticket-poster">
    </div>

    <!-- QR CODE -->
    <div class="qr-box">
        <img id="qrCode" class="qr-code">
    </div>

    <!-- INFO -->
    <div class="et-info">
        <h2 id="etTitle"></h2>
        <p id="etCinema"></p>
        <p id="etTime"></p>
        <p id="etSeat"></p>
        <p id="etTotal"></p>
        <p class="etMethod" id="etMethod"></p>
    </div>

    <!-- BUTTON -->
    <button class="btn-primary et-btn" onclick="window.print()">Print</button>
    <button class="btn-secondary et-back-btn" onclick="location.href='home.php'">
    ← Kembali ke Home
    </button>

</div>

<script>
// =======================
// GET URL PARAMS
// =======================
const url = new URLSearchParams(location.search);
const id = parseInt(url.get("id"));
const time = url.get("time");
const seats = url.get("seats") ? url.get("seats").split(",") : [];
const method = url.get("method");

// =======================
// AMBIL DATA FILM
// =======================
const movie = movies.find(m => m.id === id);

// =======================
// AMBIL HARGA & TOTAL
// =======================
const hargaTiket = Number(localStorage.getItem("hargaTiket")) || 50000;
const totalHarga = seats.length * hargaTiket;

// =======================
// TAMPILKAN DATA
// =======================
document.getElementById("etPoster").src = movie.poster;
document.getElementById("etTitle").innerText = movie.title;
document.getElementById("etCinema").innerText = movie.showtimes[0].cinema;
document.getElementById("etTime").innerText = "Jam: " + time;
document.getElementById("etSeat").innerText = "Kursi: " + seats.join(", ");
document.getElementById("etMethod").innerText = "Metode: " + method;
document.getElementById("etTotal").innerText =
    "Total: Rp " + totalHarga.toLocaleString("id-ID");

// =======================
// GENERATE QR CODE
// =======================
const qrText = `
Film: ${movie.title}
Jam: ${time}
Kursi: ${seats.join(", ")}
Total: Rp ${totalHarga}
`;

document.getElementById("qrCode").src =
    "https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=" +
    encodeURIComponent(qrText);
</script>

</body>
</html>

