<?php
$current_page = basename($_SERVER['PHP_SELF']); // ambil nama file yg dibuka
?>
<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin – ShowTix id</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Bebas Neue', sans-serif;
        }

        .admin-layout {
            margin-top: 70px;
            display: grid;
            grid-template-columns: 220px 1fr;
            min-height: 100vh;
        }

        .admin-sidebar {
            background: rgba(15,15,20,0.9);
            backdrop-filter: blur(10px);
            border-right: 1px solid rgba(255,255,255,0.08);
            padding: 30px 20px;
        }

        .admin-sidebar h3 {
            margin-bottom: 30px;
            letter-spacing: 1px;
        }

        .admin-menu a {
            display: block;
            padding: 12px 15px;
            border-radius: 10px;
            margin-bottom: 10px;
            color: #fff;
            text-decoration: none;
            transition: 0.25s;
        }

        .admin-menu a:hover,
        .admin-menu a.active {
            background: linear-gradient(135deg, #ff4b5c, #ff9068);
        }

        .admin-content {
            padding: 40px;
        }

        .welcome-card {
            background: rgba(255,255,255,0.05);
            border-radius: 16px;
            padding: 50px;
            backdrop-filter: blur(8px);
            text-align: center;
        }

        .welcome-card h1 {
            font-size: 36px;
            margin-bottom: 20px;
            color: #fff;
        }

        .welcome-card p {
            font-size: 18px;
            color: rgba(255,255,255,0.8);
            margin-bottom: 15px;
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

<!-- NAVBAR -->
<header class="navbar">
    <div class="navbar-left">
       <a style="font-size: 25px;">🎬</a> <a href="#" class="logo">ShowTix id</a> 
    </div>
    <div class="navbar-right">
        <span class="badge">ADMIN</span>
        <a class="btn btn-outline" href="../logout.php" onclick="return confirm('Yakin ingin logout?')">Logout</a>
    </div>
</header>

<div class="admin-layout">

    <!-- SIDEBAR -->
    <aside class="admin-sidebar">
        <h3>Panel Admin</h3>

        <nav class="admin-menu">
            <a href="dashboard_home.php" class="active">Dashboard Admin</a>
            <a href="dashboard_admin.php">Data User</a>
            <a href="dashboard_pembelian.php">Data Pembelian</a>
        </nav>
    </aside>

    <!-- CONTENT -->
    <main class="admin-content">
        <div class="welcome-card">
            <h1>Selamat Datang di ShowTix Admin</h1>
            <p>Kelola akun, atur konten, dan pantau aktivitas pengguna dengan mudah.</p>
            <p>Gunakan menu di sebelah kiri untuk navigasi ke Data User atau Data Pembelian.</p>
        </div>
    </main>

</div>
</body>
</html>
