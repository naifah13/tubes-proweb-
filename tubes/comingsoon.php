<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Coming Soon – ShowTix id</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="data/movies.js"></script>
     <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    </head>

<body>
<header class="navbar">
    <div class="navbar-left">
        <a href="home.php" class="logo">🎬 ShowTix id</span></a>
        <nav class="nav-links">
            <a href="home.php">Now Showing</a>
            <a class="active-nav" href="comingsoon.php">Coming Soon</a>
        </nav>
    </div>
</header>

<main class="page-wrapper">
    <section class="section">
        <div class="section-header">
            <h2>Coming Soon</h2>
            <p>Film-film terbaru yang akan segera tayang.</p>
        </div>

        <div id="comingGrid" class="coming-soon-grid"></div>
    </section>
</main>

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

