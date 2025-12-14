<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>ShowTix id – Now Showing & Coming Soon</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="data/movies.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <style>
        .logo {

            background: linear-gradient(90deg, #ff2d55, #ff5c8a);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;

            text-shadow: 0 0 18px rgba(255, 45, 85, 0.6);
        }

        .btn-logout {
            background: transparent;
            border: 1px solid #fff;
            color: #fff;
            padding: 8px 14px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            transition: 0.3s ease;
        }

        .btn-logout:hover {
            background: #ff2d55;
            border-color: #ff2d55;
            color: #fff;
        }
    </style>
</head>
<script>
    function confirmLogout() {
        return confirm("Yakin mau logout?");
    }
</script>

<body>

    <header class="navbar">
        <div class="navbar-left">
            <a style="font-size: 25px;">🎬</a> <a href="home.php" class="logo">ShowTix id</a>

            <nav class="nav-links">
                <a href="#now">Now Showing</a>
                <a href="#coming">Coming Soon</a>
            </nav>
        </div>

        <div class="navbar-right">
            <div class="search-bar">
                <input type="text" id="searchInput" placeholder="Cari film...">
            </div>

            <form action="logout.php" method="post" style="margin-left: 15px;" onsubmit="return confirmLogout();">
                <button type="submit" class="btn-logout">Logout</button>
            </form>

        </div>

    </header>



    <main class="page-wrapper">

        <!-- HERO -->
        <section class="hero">
            <div class="hero-left">
                <p class="badge">Now Showing</p>
                <h1>Nonton film favoritmu hanya dari satu tempat.</h1>
                <p class="hero-subtitle">Beli tiket dengan cepat, pilih kursi, dan nikmati pengalaman bioskop terbaik.</p>

                <div class="hero-actions">
                    <a href="#now" class="btn btn-primary">Lihat Film</a>
                </div>
            </div>

            <div class="hero-right">
                <div class="hero-poster-bg" id="heroBg"></div>

                <div class="hero-overlay-text">
                    <p class="hero-coming">COMING SOON</p>
                    <h2 class="hero-movie-title" id="heroTitle"></h2>
                </div>

                <div class="hero-poster-card">
                    <img id="heroPoster" src="">
                </div>
            </div>
        </section>


        <!-- NOW SHOWING -->
        <section id="now" class="section slider-section">
            <div class="section-header">
                <h2>Now Showing</h2>
                <p>Tayang di bioskop minggu ini.</p>
            </div>

            <div class="slider-container">
                <button class="slider-btn left" id="slideLeft">‹</button>

                <div class="slider-viewport">
                    <div class="slider-wrapper" id="movieSlider"></div>
                </div>

                <button class="slider-btn right" id="slideRight">›</button>
            </div>

            <div class="slider-dots" id="sliderDots"></div>
        </section>



        <!-- COMING SOON (DITAMBAH DI SINI) -->
        <section id="coming" class="section">
            <div class="section-header">
                <h2>Coming Soon</h2>
                <p>Film-film terbaru yang akan segera tayang.</p>
            </div>

            <div id="comingGrid" class="coming-soon-grid"></div>
        </section>

    </main>


    <!-- SCRIPT NOW SHOWING -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const slider = document.getElementById("movieSlider");
            const cardWidth = 260;

            const list = movies.filter(m => !m.status || m.status === "now");

            let index = 0;

            function render() {
                slider.innerHTML = "";

                for (let i = 0; i < list.length; i++) {
                    const pos = (index + i) % list.length;
                    const m = list[pos];

                    slider.innerHTML += `
                <div class="slide-card">
                    <a href="detail.php?id=${m.id}">
                        <img src="${m.poster}" class="slide-poster">
                    </a>
                    <p class="slide-title">${m.title}</p>
                </div>
            `;
                }
            }

            function renderDots() {
                const dotsBox = document.getElementById("sliderDots");
                dotsBox.innerHTML = "";

                for (let i = 0; i < list.length; i++) {
                    dotsBox.innerHTML += `
                <span class="dot ${i === index ? 'active-dot' : ''}" data-i="${i}"></span>
            `;
                }

                document.querySelectorAll(".dot").forEach(d => {
                    d.onclick = () => {
                        index = Number(d.dataset.i);
                        render();
                        renderDots();
                    };
                });
            }

            render();
            renderDots();

            document.getElementById("slideRight").onclick = () => {
                index = (index + 1) % list.length;

                slider.style.transition = "0.35s ease";
                slider.style.transform = "translateX(-260px)";

                setTimeout(() => {
                    slider.style.transition = "none";
                    slider.style.transform = "translateX(0)";
                    render();
                    renderDots();
                }, 350);
            };

            document.getElementById("slideLeft").onclick = () => {
                index = (index - 1 + list.length) % list.length;

                slider.style.transition = "none";
                slider.style.transform = "translateX(-260px)";
                render();

                setTimeout(() => {
                    slider.style.transition = "0.35s ease";
                    slider.style.transform = "translateX(0)";
                    renderDots();
                }, 10);
            };

        });
    </script>



    <!-- SCRIPT HERO COMING SOON -->
    <script>
        const comingListHero = movies.filter(m => m.status === "coming");

        let heroIndex = 0;

        const heroPoster = document.getElementById("heroPoster");
        const heroBg = document.getElementById("heroBg");
        const heroTitle = document.getElementById("heroTitle");

        function updateHero() {
            const movie = comingListHero[heroIndex];

            heroPoster.src = movie.poster;
            heroBg.style.backgroundImage = `url(${movie.poster})`;
            heroTitle.innerText = movie.title;

            heroTitle.style.animation = "none";
            heroTitle.offsetHeight;
            heroTitle.style.animation = "fadeInUp 1s forwards";

            heroIndex = (heroIndex + 1) % comingListHero.length;
        }

        updateHero();
        setInterval(updateHero, 5000);
    </script>



    <!-- SCRIPT COMING SOON GRID -->
    <script>
        const comingGrid = document.getElementById("comingGrid");

        if (comingGrid) {
            const comingList = movies.filter(m => m.status === "coming");

            comingGrid.innerHTML = comingList.map(c => `
        <div class="coming-card">
            <div class="coming-poster-wrap">
                <img src="${c.poster}" class="coming-poster">

                <div class="coming-overlay">
                    <span class="coming-date">${c.release}</span>
                </div>
            </div>

            <div class="coming-info">
                <h3>${c.title}</h3>
                <p>${c.genre}</p>
            </div>
        </div>
    `).join("");
        }
    </script>

</body>

</html>