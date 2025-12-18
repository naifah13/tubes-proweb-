<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Detail Film</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="data/movies.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <style>
        .navbar {
            display: flex;
            align-items: center;
            padding: 16px 24px;
        }

        .navbar-left {
            display: flex;
            align-items: center;
            gap: 10px;
            /* jarak icon & teks */
        }

        .nav-icon {
            font-size: 22px;
        }

        .logo {
            font-size: 22px;
            font-family: 'Bebas Neue', sans-serif;
            text-decoration: none;
            color: white;
        }

        .logo {
            background: linear-gradient(90deg, #ff2d55, #ff5c8a);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 0 0 18px rgba(255, 45, 85, 0.6);
        }
    </style>
</head>

<body>
    <header class="navbar">
        <div class="navbar-left">
            <span class="nav-icon">🎬</span>
            <a class="logo" href="home.php">ShowTix id</a>
        </div>
    </header>


    <main class="page-wrapper" id="detailContainer">
        <!-- Auto-filled by JS -->
    </main>


    <script>
        // CEK APA TRAILER BISA DI-EMBED
        function canEmbed(url) {
            if (!url) return false;

            const blocked = [
                "mL5htYG4zjI", // Pangku
                "0Ito96GVPuI", // Sampai Titik Terakhirmu
                "OBbE4wK47ts", // Pengepungan Bukit Duri
                "wQRi_vGBU5g" // Dopamin
            ];

            // ambil ID youtube dari /embed/
            let id = url.split("/embed/")[1];
            if (!id) return false;

            return !blocked.includes(id);
        }
    
        // LOAD DATA FILM
        const params = new URLSearchParams(window.location.search);
        const id = parseInt(params.get("id"));
        const movie = movies.find(m => m.id === id);

        const container = document.getElementById("detailContainer");

        // TAMPILKAN TRAILER (EMBED / TOMBOL YT)
        let trailerHTML = "";

        if (canEmbed(movie.trailer)) {
            // bisa embed → tampilkan iframe
            trailerHTML = `
            <div class="trailer-box">
                <iframe src="${movie.trailer}"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
        `;
        } else {
            // TIDAK bisa embed → tampilkan tombol
            trailerHTML = `
            <div class="trailer-box no-embed">
                <p class="no-embed-text">Karena terdapat beberapa kebijakan, trailer tidak dapat diputar di dalam website ini.</p>
                <a href="${movie.trailer.replace("/embed/", "/watch?v=")}" 
                   target="_blank" 
                   class="btn btn-youtube">
                    ▶ Tonton di YouTube
                </a>
            </div>
        `;
        }

        // RENDER HALAMAN DETAIL
        container.innerHTML = `
        <section class="detail-layout">

            <div class="detail-poster-wrap">
                <img src="${movie.poster}" class="detail-poster">
            </div>

            <div class="detail-right-content">

                <div class="detail-info">
                    <h1>${movie.title}</h1>
                    <p>${movie.genre}</p>

                    <p class="detail-desc">${movie.desc}</p>

                    <div class="detail-actions">
                        <a href="jadwal.php?id=${movie.id}" class="btn btn-primary">Pilih Jadwal</a>
                    </div>
                </div>

                <h3 class="trailer-title">TRAILER</h3>

                ${trailerHTML}

            </div>

        </section>
    `;
    </script>


</body>

</html>