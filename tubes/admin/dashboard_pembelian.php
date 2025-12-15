<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit;
}

require_once "../koneksi.php";

$query = mysqli_query($koneksi, "
    SELECT 
        id,
        user_name,
        movie_title,
        cinema_name,
        showtime,
        seat,
        total_price,
        payment_method,
        created_at
    FROM data_pembelian
    ORDER BY created_at DESC
");
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard – ShowTix id</title>
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
            background: rgba(15, 15, 20, 0.9);
            backdrop-filter: blur(10px);
            border-right: 1px solid rgba(255, 255, 255, 0.08);
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

        .admin-card {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 16px;
            padding: 25px;
            backdrop-filter: blur(8px);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 14px;
            text-align: left;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        th {
            font-weight: 600;
            letter-spacing: 1px;
        }

        .action-btn {
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 13px;
            text-decoration: none;
            margin-right: 6px;
        }

        .btn-edit {
            background: #4caf50;
            color: #fff;
        }

        .btn-delete {
            background: #f44336;
            color: #fff;
        }

        .pagination {
            margin-top: 20px;
            text-align: center;
        }

        .pagination .page-link {
            display: inline-block;
            padding: 6px 12px;
            margin: 0 4px;
            border-radius: 6px;
            text-decoration: none;
            border: 1px solid rgba(255, 255, 255, 0.4);
            color: #fff;
            transition: 0.2s;
        }

        .pagination .page-link:hover {
            background: rgba(255, 255, 255, 0.15);
        }

        .pagination .page-link.active {
            background: #ff4b5c;
            border-color: #ff4b5c;
            color: #fff;
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

    <!-- NAVBAR (reuse style) -->
    <header class="navbar">
        <div class="navbar-left">
            <a style="font-size: 25px;">🎬</a><a href="#" class="logo"> ShowTix id</a>
        </div>
        <div class="navbar-right">
            <span class="badge">ADMIN</span>
            <a class="btn btn-outline" href="../logout.php"
                onclick="return confirm('Yakin ingin logout?')">Logout
            </a>
        </div>
    </header>

    <div class="admin-layout">

        <!-- SIDEBAR -->
        <aside class="admin-sidebar">
            <h3>Panel Admin</h3>

            <nav class="admin-menu">
                <a href="dashboard_home.php">Dashboard Admin</a>
                <a href="dashboard_admin.php">Data User</a>
                <a href="dashboard_pembelian.php" class="active">Data Pembelian</a>
            </nav>

        </aside>

        <!-- CONTENT -->
        <main class="admin-content">
            <div class="section-header">
                <h2>Data Pembelian</h2>
                <p>Riwayat transaksi pengguna ShowTix</p>
            </div>

            <div class="admin-card">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>User</th>
                            <th>Film</th>
                            <th>Bioskop</th>
                            <th>Jam</th>
                            <th>Kursi</th>
                            <th>Total</th>
                            <th>Metode</th>
                            <th>Tanggal Pemesanan</th>
                            <th>Hapus</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php $no = 1; ?>
                    <?php while ($row = mysqli_fetch_assoc($query)) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= htmlspecialchars($row['user_name']) ?></td>
                            <td><?= htmlspecialchars($row['movie_title']) ?></td>
                            <td><?= htmlspecialchars($row['cinema_name']) ?></td>
                            <td><?= htmlspecialchars($row['showtime']) ?></td>
                            <td><?= htmlspecialchars($row['seat']) ?></td>
                            <td>Rp <?= number_format($row['total_price'],0,',','.') ?></td>
                            <td><span class="badge"><?= $row['payment_method'] ?></span></td>
                            <td><?= date('d/m/Y H:i', strtotime($row['created_at'])) ?></td>
                            <td>
                                <a href="delete_pembelian.php?id=<?= $row['id'] ?>" class="action-btn btn-delete delete-btn">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </main>

    </div>

    <script>
        document.querySelectorAll('.delete-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                if (!confirm('Yakin ingin menghapus user ini?')) {
                    e.preventDefault();
                }
            });
        });
    </script>

</body>

</html>