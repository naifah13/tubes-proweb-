<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pilih Kursi</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="data/movies.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
</head>

<body>

<header class="seat-header">
    <div class="seat-film">
        <img id="seatPoster" class="seat-poster">
        <div>
            <h2 id="seatTitle"></h2>
            <p id="seatCinema"></p>
            <p id="seatTime"></p>
        </div>
    </div>
</header>

<main class="seat-wrapper">

    <h3>Pilih Kursi</h3>

    <div id="seatMap" class="seat-map"></div>

    <div class="seat-legend">
        <div><span class="seat available"></span> Available</div>
        <div><span class="seat selected"></span> Selected</div>
        <div><span class="seat booked"></span> Booked</div>
    </div>

    <button id="checkoutBtn" class="btn-primary seat-btn">Lanjut ke Pembayaran</button>

</main>

<script>
const url = new URLSearchParams(location.search);
const id = parseInt(url.get("id"));
const time = url.get("time");

const movie = movies.find(m => m.id === id);

document.getElementById("seatPoster").src = movie.poster;
document.getElementById("seatTitle").innerText = movie.title;
document.getElementById("seatTime").innerText = "Jam: " + time;
document.getElementById("seatCinema").innerText = movie.showtimes[0].cinema;

const seatMap = document.getElementById("seatMap");

// generate kursi
let seats = [];
let rows = ["A","B","C","D","E"];

rows.forEach(r => {
    for (let i = 1; i <= 10; i++) {
        seats.push({code: r + i, booked: Math.random() < 0.2});
    }
});

// render kursi
seats.forEach(s => {
    seatMap.innerHTML += `
        <div class="seat ${s.booked ? "booked" : "available"}" 
             data-code="${s.code}" 
             onclick="toggleSeat(this)">
            ${s.code}
        </div>
    `;
});

let selectedSeats = [];

function toggleSeat(el) {
    if (el.classList.contains("booked")) return;

    el.classList.toggle("selected");

    let code = el.dataset.code;
    if (selectedSeats.includes(code)) {
        selectedSeats = selectedSeats.filter(x => x !== code);
    } else {
        selectedSeats.push(code);
    }
}

document.getElementById("checkoutBtn").onclick = () => {
    if (selectedSeats.length === 0) {
        alert("Pilih kursi dulu yaa 🤍");
        return;
    }
    location.href = `checkout.html?id=${id}&time=${time}&seats=${selectedSeats.join(",")}`;
};
</script>

</body>
</html>
