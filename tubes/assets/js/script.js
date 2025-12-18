// home.js logic
document.addEventListener("DOMContentLoaded", () => {
    const grid = document.getElementById("movieGrid");
    if (!grid) return;

    grid.innerHTML = movies.map(m => `
        <div class="movie-card">
            <img src="${m.poster}" class="movie-poster">
            <div class="movie-info">
                <h3>${m.title}</h3>
                <p>${m.genre}</p>
                <a href="detail.html?id=${m.id}" class="btn btn-outline">Detail</a>
            </div>
        </div>
    `).join("");

    // Pencarian
    const search = document.getElementById("searchInput");
    if (search) {
        search.addEventListener("input", () => {
            const term = search.value.toLowerCase();
            document.querySelectorAll(".movie-card").forEach(card => {
                card.style.display = card.innerText.toLowerCase().includes(term)
                    ? "block" : "none";
            });
        });
    }
});
// SEARCH FUNCTION
document.getElementById("searchInput").addEventListener("keyup", function(e) {
    let q = e.target.value.toLowerCase().trim();

    // filter film
    let filtered = movies.filter(m => m.title.toLowerCase().includes(q));

    const slider = document.getElementById("movieSlider");
    const dots = document.getElementById("sliderDots");

    slider.innerHTML = "";
    dots.innerHTML = "";

    filtered.forEach((m, i) => {
        slider.innerHTML += `
            <div class="slide-card">
                <a href="detail.html?id=${m.id}">
                    <img src="${m.poster}" class="slide-poster">
                </a>
                <p class="slide-title">${m.title}</p>
            </div>
        `;
        dots.innerHTML += `
            <span class="dot ${i === 0 ? 'active-dot' : ''}" data-index="${i}"></span>
        `;
    });
});
