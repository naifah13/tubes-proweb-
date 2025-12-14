<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Showtix ID</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .hero-poster-card {
            position: relative;
        }

        .hero-poster-card img {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0;
            transition: opacity 0.8s ease;
        }

        .hero-poster-card img.active {
            opacity: 1;
        }
        .page-wrapper {
            padding-top: 0 !important;
        }

        .section-header {
            margin-bottom: 20px !important;
        }

        .hero {
            margin-top: 0 !important;
        }

        .section-header p {
            margin-bottom: 70px !important;
        }

        .brand-highlight {
            font-size: inherit;
            font-weight: inherit;

            background: linear-gradient(90deg, #ff2d55, #ff5c8a);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;

            text-shadow: 0 0 18px rgba(255, 45, 85, 0.6);
        }

        .cta-daftar {
            text-align: center;
            margin-top: 60px;
        }

        .cta-daftar a {
            display: inline-block;
            padding: 14px 36px;
            font-family: 'Bebas Neue', sans-serif;
            font-size: 22px;
            color: #fff;
            text-decoration: none;

            background: linear-gradient(90deg, #ff2d55, #ff5c8a);
            border-radius: 30px;

            box-shadow: 0 0 25px rgba(255, 45, 85, 0.5);
            transition: all 0.3s ease;
        }

        .cta-daftar a:hover {
            transform: translateY(-3px);
            box-shadow: 0 0 40px rgba(255, 45, 85, 0.8);
        }
    </style>
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