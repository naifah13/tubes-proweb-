<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>E-Ticket</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="data/movies.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <style>
        @media print {

    @page {
        size: 90mm 140mm; 
        margin: 0;
    }

    body {
        margin: 0;
        padding: 0;
        background: none;
        -webkit-print-color-adjust: exact !important;
        print-color-adjust: exact !important;
    }

    .et-btn,
    .et-back-btn {
        display: none !important;
    }

    .eticket-wrapper {
        width: 90mm;
        height: 140mm;
        background: linear-gradient(135deg, #0b0f2a, #1a103d);
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        border-radius: 20px;
    }
}

    </style>
</head>

<body>

<div class="eticket-wrapper">

    <!-- BADGE -->
    <p class="eticket-badge">E-TICKET</p>

    <!-- POSTER -->
    <img id="etPoster" class="et-poster">

    <!-- QR CODE -->
    <div class="qr-box">
        <img src="images/qr.png">
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
    <button class="btn-primary et-btn" onclick="window.print()">Download / Print</button>
    <button class="btn-secondary et-back-btn" onclick="location.href='home.php'">
    ← Kembali ke Home
    </button>

</div>

<script>

// GET URL PARAMS
const url = new URLSearchParams(location.search);
const id = parseInt(url.get("id"));
const time = url.get("time");
const seats = url.get("seats").split(",");
const method = url.get("method");

const movie = movies.find(m => m.id === id);

// SET POSTER
document.getElementById("etPoster").src = movie.poster;

document.getElementById("etTitle").innerText = movie.title;
document.getElementById("etCinema").innerText = movie.showtimes[0].cinema;
document.getElementById("etTime").innerText = "Jam: " + time;
document.getElementById("etSeat").innerText = "Kursi: " + seats.join(", ");
document.getElementById("etTotal").innerText =
    "Total: Rp " + (seats.length * 50000).toLocaleString("id-ID");
document.getElementById("etMethod").innerText = 
    "Metode Pembayaran: " + method.toUpperCase()

</script>

</body>
</html>

