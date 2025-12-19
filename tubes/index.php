<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Showtix ID</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/index.css">
    
</head>

<body>

    <div class="page-wrapper">
        <!-- JUDUL -->
        <div class="section-header" style="text-align:center;">
            <h2 style="font-size: 100px;">
                Selamat Datang di
              <span class="brand-highlight">Showtix ID </span>🎬
            </h2>
            <p style="font-size: 30px;">Pesan tiket film favoritmu dengan mudah dan terpercaya</p>
        </div>
        <!-- CARD FILM -->
        <div class="hero" style="grid-template-columns: repeat(3, 1fr); margin-top:40px;">
            <!-- HORROR -->
            <div class="hero-right">
                <div class="hero-poster-bg"></div>
                <div class="hero-poster-card">
                    <img src="images/avatar.jpg" class="active">
                    <img src="images/spiderman.jpg">
                    <img src="images/avengers.jpg">
                </div>
                <div class="hero-overlay-text">
                    <div class="hero-coming">GENRE</div>
                    <h3 class="hero-movie-title">action</h3>
                </div>
            </div>
            <!-- COMEDY -->
            <div class="hero-right">
                <div class="hero-poster-bg"></div>
                <div class="hero-poster-card">
                    <img src="images/toystory.jpg" class="active">
                    <img src="images/zootopia.jpg">
                    <img src="images/jumbo.jpg">
                </div>
                <div class="hero-overlay-text">
                    <div class="hero-coming">GENRE</div>
                    <h3 class="hero-movie-title">animasi</h3>
                </div>
            </div>
            <!-- THRILLER -->
            <div class="hero-right">
                <div class="hero-poster-bg"></div>
                <div class="hero-poster-card">
                    <img src="images/duri.jpg" class="active">
                    <img src="images/dopamin.jpg">
                    <img src="images/malinkundang.jpg">
                </div>
                <div class="hero-overlay-text">
                    <div class="hero-coming">GENRE</div>
                    <h3 class="hero-movie-title">THRILLER</h3>
                </div>
            </div>
        </div>
        <div class="cta-daftar">
            <a href="login.php">Pesan tiket sekarang</a>
        </div>
    </div>
    <script>
        document.querySelectorAll('.hero-poster-card').forEach(card => {
            const imgs = card.querySelectorAll('img');
            if (imgs.length <= 1) return;

            let i = 0;
            imgs[i].classList.add('active');

            setInterval(() => {
                imgs[i].classList.remove('active');
                i = (i + 1) % imgs.length;
                imgs[i].classList.add('active');
            }, 3000);
        });
    </script>

</body>

</html>