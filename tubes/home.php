<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>ShowTix id – Now Showing</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="data/movies.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

</head>

<body>
    <header class="navbar">
        <div class="navbar-left">
            <a href="home.html" class="logo">🎬 ShowTix id</span></a>
            <nav class="nav-links">
                <a href="home.html">Now Showing</a>
                <a href="comingsoon.html">Coming Soon</a>
            </nav>
        </div>

        <div class="navbar-right">
            <div class="search-bar">
                <input type="text" id="searchInput" placeholder="Cari film...">
            </div>
            <a class="btn btn-outline" href="login.html">Login</a>
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


    </main>

   <script src="assets/js/script.js"></script>

<!-- SLIDER NOW SHOWING FINAL FIX -->
<script>
document.addEventListener("DOMContentLoaded", function () {

    const slider = document.getElementById("movieSlider");
    const cardWidth = 260;

    // ONLY NOW SHOWING — Jaminan anti-Spiderman
    const list = movies.filter(m => !m.status || m.status === "now");

    let index = 0;

    /* RENDER POSTERS */
    function render() {
        slider.innerHTML = "";

        for (let i = 0; i < list.length; i++) {
            const pos = (index + i) % list.length;
            const m = list[pos];

            slider.innerHTML += `
                <div class="slide-card">
                    <a href="detail.html?id=${m.id}">
                        <img src="${m.poster}" class="slide-poster">
                    </a>
                    <p class="slide-title">${m.title}</p>
                </div>
            `;
        }
    }

    /* RENDER DOTS */
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

    /* INITIAL RENDER */
    render();
    renderDots();

    /* NEXT */
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

    /* PREV */
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


<script>
    
// Ambil data COMING SOON
const comingList = movies.filter(m => m.status === "coming");

let index = 0;

const heroPoster = document.getElementById("heroPoster");
const heroBg = document.getElementById("heroBg");
const heroTitle = document.getElementById("heroTitle");

// fungsi update hero
function updateHero() {
    const movie = comingList[index];

    // ganti poster
    heroPoster.src = movie.poster;

    // ganti blur glow
    heroBg.style.backgroundImage = `url(${movie.poster})`;

    // ganti judul
    heroTitle.innerText = movie.title;

    // animasi ulang (biar fade-in tiap ganti)
    heroTitle.style.animation = "none";
    heroTitle.offsetHeight; // reset trick
    heroTitle.style.animation = "fadeInUp 1s forwards";

    index = (index + 1) % comingList.length;
}

// jalan pertama kali
updateHero();

// ganti setiap 5 detik
setInterval(updateHero, 5000);
</script>


</body>
</html>
