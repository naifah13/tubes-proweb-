<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pilih Jadwal</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="data/movies.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
</head>

<body>

<header class="navbar">
    <a href="home.php" class="logo">🎬 ShowTix id</a>
</header>

<main class="page-wrapper" id="scheduleContainer"></main>

<script>
const params = new URLSearchParams(location.search);
const id = parseInt(params.get("id"));
const movie = movies.find(m => m.id === id);

const wrap = document.getElementById("scheduleContainer");

// TITLE
let html = `
    <h2>Pilih Jadwal – ${movie.title}</h2>

    <input type="text" id="cinemaSearch" placeholder="Search cinema..." class="input search-input">
`;

// CINEMA LOOP
movie.showtimes.forEach(cin => {
    html += `
        <div class="cinema-block">
            <h3 class="cinema-title">${cin.cinema}</h3>
    `;

    cin.studios.forEach(studio => {
        html += `
            <div class="studio-row">
                <div class="studio-left">
                    <p class="studio-type">${studio.type}</p>
                    <p class="studio-price">Rp${studio.price}</p>
                </div>

                <div class="studio-times">
        `;

        studio.times.forEach(t => {
            html += `
                <a href="seat.php?id=${movie.id}&time=${t}" class="time-btn">${t}</a>
            `;
        });

        html += `
                </div>
            </div>
        `;
    });

    html += `</div>`;
});

wrap.innerHTML = html;


// SEARCH FILTER
document.getElementById("cinemaSearch").addEventListener("input", function(){
    const term = this.value.toLowerCase();
    document.querySelectorAll(".cinema-block").forEach(block => {
        block.style.display = block.innerText.toLowerCase().includes(term) ? "block" : "none";
    });
});
</script>

</body>
</html>

