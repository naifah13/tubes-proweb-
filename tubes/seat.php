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

// AMBIL DATA BOOKED (LOCAL)
const storageKey = `bookedSeats_movie_${id}_${time}`;
let bookedSeats = JSON.parse(localStorage.getItem(storageKey)) || [];

// GENERATE KURSI (SEMUA AVAILABLE)
let rows = ["A","B","C","D","E"];
let selectedSeats = [];

rows.forEach(r => {
    for (let i = 1; i <= 10; i++) {
        const code = r + i;
        const isBooked = bookedSeats.includes(code);

        seatMap.innerHTML += `
            <div class="seat ${isBooked ? "booked" : "available"}"
                 data-code="${code}">
                ${code}
            </div>
        `;
    }
});

// KLIK KURSI
document.querySelectorAll(".seat").forEach(seat => {
    seat.addEventListener("click", () => {
        if (seat.classList.contains("booked")) return;

        seat.classList.toggle("selected");
        const code = seat.dataset.code;

        if (selectedSeats.includes(code)) {
            selectedSeats = selectedSeats.filter(s => s !== code);
        } else {
            selectedSeats.push(code);
        }
    });
});

// CHECKOUT
document.getElementById("checkoutBtn").onclick = () => {
    if (selectedSeats.length === 0) {
        alert("Pilih kursi dulu yaa 🤍");
        return;
    }

    // simpan kursi ke booked
    bookedSeats = [...new Set([...bookedSeats, ...selectedSeats])];
    localStorage.setItem(storageKey, JSON.stringify(bookedSeats));

    location.href = `checkout.php?id=${id}&time=${time}&seats=${selectedSeats.join(",")}`;
};
</script>


</body>
</html>

