<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Pilih Jadwal</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="data/movies.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <style>
        .navbar {
            display: flex;
            align-items: center;
            padding: 16px 24px;
            justify-content: flex-start;
        }

        .logo-wrap {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 26px;
            text-decoration: none;
            letter-spacing: 2px;

            background: linear-gradient(90deg, #ff2d55, #ff5c8a);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;

            text-shadow: 0 0 18px rgba(255, 45, 85, 0.6);
        }

        .logo-emoji {
            font-size: 26px;
        }
    </style>
</head>

<body>

    <header class="navbar">
        <div class="logo-wrap">
            <span class="logo-emoji">🎬</span>
            <a href="home.php" class="logo">SHOWTIX ID</a>
        </div>
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
        document.getElementById("cinemaSearch").addEventListener("input", function() {
            const term = this.value.toLowerCase();
            document.querySelectorAll(".cinema-block").forEach(block => {
                block.style.display = block.innerText.toLowerCase().includes(term) ? "block" : "none";
            });
        });
    </script>

</body>

</html>