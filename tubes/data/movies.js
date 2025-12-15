// =============================
// NOW SHOWING (Sedang Tayang)
// =============================

const movies = [
    {
        id: 1,
        status: "now",
        title: "Agak Laen: Menyala Pantiku",
        genre: "Drama",
        rating: "9.9",
        duration: "1j 59m",
        age: "13+",
        poster: "images/agaklaen.webp",
        trailer : "https://www.youtube.com/embed/fYjJ6zP2Cp0",
        desc: "Film ini mengisahkan petualangan empat sekawan, Boris, Bene, Jegel, dan Oki, yang harus menjalankan misi penyamaran di sebuah panti jompo.",
        showtimes: [
            {
                cinema: "Cinepolis cinemas Sun Plaza",
                studios: [
                    { type: "ScreenX 2D", price: "50.000", times: ["10:30", "12:45", "17:30"] },
                    { type: "Regular 2D", price: "50.000", times: ["11:00", "11:45", "13:15", "14:00", "15:30", "16:15", "20:15"] }
                ]
            },
            {
                cinema: "Thamrin XXI",
                studios: [
                    { type: "IMAX 2D", price: "50.000", times: ["12:45", "14:50", "19:00", "21:05"] }
                ]
            },
            {
                cinema: "Delipark XXI",
                studios: [
                    { type: "2D", price: "50.000", times: ["12:15", "16:30", "20:40"] }
                ]
            },
            {
                cinema: "Cambridge City Square XXI",
                studios: [
                    { type: "2D", price: "50.000", times: ["12:20", "14:20", "16:35", "16:50","17:50","18:50", "19:10", "21:15"] }
                ]
            }
        ]
    },

    {
        id: 2,
        status: "now",
        title: "Zootopia 2",
        genre: "Animation • Adventure",
        rating: "9.7",
        duration: "1j 48m",
        age: "SU",
        poster: "images/zootopia.jpg",
        trailer : "https://www.youtube.com/embed/BjkIOU5PhyQ",
        desc: "Melanjutkan kisah Judy Hopps dan Nick Wilde yang kini menghadapi kasus baru di Marsh Market.",
        showtimes: [
            {
                cinema: "Manhattan XXI",
                studios: [
                    { type: "Regular 2D", price: "50.000", times: ["10:00", "12:00", "14:00", "16:00"] }
                ]
            },
            {
                cinema: "Centre Point XXI",
                studios: [
                    { type: "Regular 2D", price: "50.000", times: ["12:45", "14:50", "16:55", "20:45"] }
                ]
            },
            {
                cinema: "Delipark IMAX",
                studios: [
                    { type: "IMAX 2D", price: "50.000", times: ["12:40", "16:40", "18:50", "21:00"] }
                ]
            },
            {
                cinema: "Sun Plaza Cinepolis",
                studios: [
                    { type: "Regular 2D", price: "50.000", times: ["12:00"] },
                    { type: "Junior 2D", price: "50.000", times: ["12:45", "15:30", "18:15"] },
                    { type: "VIP 2D", price: "50.000", times: ["16:30"] }
                ]
            }
        ]
    },

    {
        id: 3,
        status: "now",
        title: "Pangku",
        genre: "Drama",
        rating: "9.1",
        duration: "1j 44m",
        age: "17+",
        poster: "images/pangku.jpg",
        noEmbed : true,
        trailer : "https://www.youtube.com/embed/mL5htYG4zjI",
        desc: "Menceritakan kehidupan perempuan muda bernama Sartika yang sedang hamil tetapi nekat meninggalkan kampung halamannya.",
        showtimes: [
            {
                cinema: "SuZuYa Mall XXI",
                studios: [
                    { type: "Regular 2D", price: "50.000", times: ["11:00", "13:00", "15:00", "17:00"] }
                ]
            },
            {
                cinema: "Focal Point CGV",
                studios: [
                    { type: "Regular 2D", price: "50.000", times: ["09:50", "16:30"] }
                ]
            }
        ]
    },

    {
        id: 4,
        status: "now",
        title: "Sampai Titik Terakhirmu",
        genre: "Drama • Romance",
        rating: "9.8",
        duration: "1j 54m",
        age: "13+",
        poster: "images/stt.jpg",
        noEmbed : true,
        trailer : "https://www.youtube.com/embed/0Ito96GVPuI",
        desc: "Mengisahkan cinta sejati Albi dan Shella, pejuang kanker ovarium.",
        showtimes: [
            {
                cinema: "Ringroad Citywalk XXI",
                studios: [
                    { type: "Regular 2D", price: "50.000", times: ["10:45", "13:00", "15:30", "18:00"] }
                ]
            },
            {
                cinema: "Hermes XXI",
                studios: [
                    { type: "2D", price: "50.000", times: ["14:15", "18:40"] }
                ]
            },
            {
                cinema: "Plaza Medan Fair Cinepolis",
                studios: [
                    { type: "Regular 2D", price: "50.000", times: ["18:00"] }
                ]
            }
        ]
    },

    {
        id: 5,
        status: "now",
        title: "Wicked : For Good",
        genre: "Fantasy",
        rating: "9.2",
        duration: "2j 17m",
        age: "13+",
        poster: "images/wicked.jpg",
        trailer : "https://www.youtube.com/embed/vt98AlBDI9Y",
        desc: "Film ini melanjutkan kisah Elphaba dan Glinda.",
        showtimes: [
            {
                cinema: "Centre Point XXI",
                studios: [
                    { type: "2D", price: "50.000", times: ["20:50"] }
                ]
            }
        ]
    },

    {
        id: 6,
        status: "now",
        title: "Legenda Kelam Malin Kundang",
        genre: "Drama • Mystery",
        rating: "8.6",
        duration: "1j 39m",
        age: "17+",
        poster: "images/malinkundang.jpg",
        trailer : "https://www.youtube.com/embed/wZqkVJfnzvo",
        desc: "Tentang anak yang hilang ingatan bertemu perempuan tua yang mengklaim sebagai ibu kandungnya.",
        showtimes: [
            {
                cinema: "Plaza Medan Fair Cinepolis",
                studios: [
                    { type: "Regular 2D", price: "50.000", times: ["10:30"] }
                ]
            }
        ]
    },

    {
        id: 7,
        status: "now",
        title: "Now You See Me 2",
        genre: "Action • Comedy • Thriller",
        rating: "6.4",
        duration: "2j 9m",
        age: "13+",
        poster: "images/nowyouseeme.jpg",
        trailer :"https://www.youtube.com/embed/-E3lMRx7HRQ",
        desc: "The Four Horsemen kembali untuk misi baru.",
        showtimes: [
            {
                cinema: "Manhattan XXI",
                studios: [
                    { type: "IMAX 2D", price: "50.000", times: ["11:00", "14:00", "17:00", "20:00"] }
                ]
            },
            {
                cinema: "Lippo Plaza Medan Cinepolis",
                studios: [
                    { type: "Regular 2D", price: "50.000", times: ["11:00", "14:00", "17:00", "20:00"] }
                ]
            }
        ]
    },

    {
        id: 8,
        status: "now",
        title: "Dopamin",
        genre: "Drama • Romance • Survival",
        rating: "8.1",
        duration: "1j 34m",
        age: "13+",
        poster: "images/dopamin.jpg",
        noEmbed : true,
        trailer : "https://www.youtube.com/embed/wQRi_vGBU5g",
        desc: "Pasangan muda yang terhimpit masalah ekonomi.",
        showtimes: [
            {
                cinema: "Ringroad Citywalk XXI",
                studios: [
                    { type: "Regular 2D", price: "50.000", times: ["12:00", "14:00", "16:00"] }
                ]
            },
            {
                cinema: "Hermes XXI",
                studios: [
                    { type: "2D", price: "50.000", times: ["14:15", "18:40"] }
                ]
            },
            {
                cinema: "Delipark IMAX",
                studios: [
                    { type: "IMAX 2D", price: "50.000", times: ["11:00", "14:00", "17:00", "20:00"] }
                ]
            }
        ]
    },

    {
        id: 9,
        status: "now",
        title: "Jumbo",
        genre: "Fantasy • Adventure",
        rating: "9.5",
        duration: "1j 42m",
        age: "SU+",
        poster: "images/jumbo.jpg",
        trailer : "https://www.youtube.com/embed/yMqDgbZmBdk",
        desc: "Mengisahkan Don, anak yatim bertubuh besar.",
        showtimes: [
            {
                cinema: "SuZuYa Mall XXI",
                studios: [
                    { type: "Regular 2D", price: "50.000", times: ["10:00", "12:00", "14:00"] }
                ]
            },
            {
                cinema: "Delipark IMAX",
                studios: [
                    { type: "IMAX 2D", price: "50.000", times: ["12:40", "16:40", "18:50", "21:00"] }
                ]
            },
            {
                cinema: "Sun Plaza Cinepolis",
                studios: [
                    { type: "Regular 2D", price: "50.000", times: ["12:00"] },
                    { type: "Junior 2D", price: "50.000", times: ["12:45", "15:30", "18:15"] },
                    { type: "VIP 2D", price: "50.000", times: ["16:30"] }
                ]
            }
        ]
    },

    {
        id: 10,
        status: "now",
        title: "Pengepungan di Bukit Duri",
        genre: "Action",
        rating: "9.0",
        duration: "1j 58m",
        age: "17+",
        poster: "images/duri.jpg",
        trailer : "https://www.youtube.com/embed/OBbE4wK47ts",
        desc: "Kisah Edwin, guru pengganti yang ditugaskan di sekolah berbahaya.",
        showtimes: [
            {
                cinema: "Manhattan Times XXI",
                studios: [
                    { type: "Regular 2D", price: "50.000", times: ["13:00", "15:15", "18:30"] }
                ]
            },
            {
                cinema: "Plaza Medan Fair Cinepolis",
                studios: [
                    { type: "Regular 2D", price: "50.000", times: ["10:30"] }
                ]
            }
        ]
    },

    {
        id: 11,
        status: "now",
        title: "Sore : Istri dari Masa Depan",
        genre: "Science Fiction • Romance",
        rating: "9.4",
        duration: "1j 59m",
        age: "17+",
        poster: "images/sore.jpg",
        trailer : "https://www.youtube.com/embed/HiVzpboRpR0",
        desc: "Remake dari seri web populer di YouTube tahun 2017.",
        showtimes: [
            {
                cinema: "Ringroad Citywalk XXI",
                studios: [
                    { type: "Regular 2D", price: "50.000", times: ["11:30", "14:00", "16:30"] }
                ]
            },
            {
                cinema: "SuZuYa Mall XXI",
                studios: [
                    { type: "Regular 2D", price: "50.000", times: ["11:00", "13:00", "15:00", "17:00"] }
                ]
            },
            {
                cinema: "Focal Point CGV",
                studios: [
                    { type: "Regular 2D", price: "50.000", times: ["09:50", "16:30"] }
                ]
            }
        ]
    },

    {
        id: 12,
        status: "now",
        title: "Rangga dan Cinta",
        genre: "Drama Musical • Romance",
        rating: "9.0",
        duration: "1j 59m",
        age: "15+",
        poster: "images/rangga.jpg",
        trailer : "https://www.youtube.com/embed/otTjJZUFGl0",
        desc: "Pembuatan ulang film 'Ada Apa dengan Cinta?' versi modern.",
        showtimes: [
            {
                cinema: "AEON Mall JGC - CGV",
                studios: [
                    { type: "ScreenX 2D", price: "50.000", times: ["12:00", "15:00", "18:00"] }
                ]
            },
            {
                cinema: "Cambridge City Square Premiere",
                studios: [
                    { type: "2D", price: "50.000", times: ["12:15", "16:30", "20:40"] }
                ]
            }
        ]
    },


    // =============================
    // COMING SOON (Segera Tayang)
    // =============================    
    {
        id: 101,
        status: "coming",
        title: "Spider-man: Brand New Day",
        release: "31 July 2026",
        genre: "Sci-Fi • Superhero • Action • Adventure",
        poster: "images/spiderman.jpg",
        desc: "Film menggambarkan awal baru bagi Peter Parker."
    },
    {
        id: 102,
        status: "coming",
        title: "Toy Story 5",
        release: "19 June 2026",
        genre: "Comedy • Adventure • Animation",
        poster: "images/toystory.jpg",
        desc: "Menceritakan Woody, Buzz, dan geng mainan klasik menghadapi tantangan baru."
    },
    {
        id: 103,
        status: "coming",
        title: "Moana",
        release: "10 July 2026",
        genre: "Animation • Musical • Fantasy",
        poster: "images/moana.jpg",
        desc: "Moana Waialiki, putri kepala suku yang memiliki ikatan kuat dengan laut."
    },
    {
        id: 104,
        status: "coming",
        title: "Avengers : Doomsday",
        release: "18 Dec 2026",
        genre: "Sci-Fi • Action",
        poster: "images/avengers.jpg",
        desc: "Menampilkan kembalinya para Avengers menghadapi ancaman besar."
    },
    {
        id: 105,
        status: "coming",
        title: "Avatar : Fire and Ash",
        release: "19 Dec 2025",
        genre: "Action • Fantasy",
        poster: "images/avatar.jpg",
        desc: "Ash People, klan Na'vi elemen api yang kejam."
    }
];
