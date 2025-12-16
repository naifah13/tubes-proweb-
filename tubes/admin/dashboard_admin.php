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
<?php
require_once "../koneksi.php";

$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 10;
$page  = isset($_GET['page'])  ? (int)$_GET['page']  : 1;

$limit = in_array($limit, [5, 10, 15, 30]) ? $limit : 10;
$page  = $page < 1 ? 1 : $page;

$offset = ($page - 1) * $limit;

$total_query = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM data_pengguna");
$total_data  = mysqli_fetch_assoc($total_query)['total'];
$total_pages = ceil($total_data / $limit);

$query = mysqli_query($koneksi, "
    SELECT id, nama_lengkap, username, email, role
    FROM data_pengguna
    LIMIT $limit OFFSET $offset
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
                <a href="dashboard_home.php" class="<?= $current_page == 'dashboard_home.php' ? 'active' : '' ?>">Dashboard Admin</a>
                <a href="dashboard_admin.php" class="<?= $current_page == 'dashboard_admin.php' ? 'active' : '' ?>">Data User</a>
                <a href="dashboard_pembelian.php" class="<?= $current_page == 'dashboard_pembelian.php' ? 'active' : '' ?>">Data Pembelian</a>
            </nav>

        </aside>

        <!-- CONTENT -->
        <main class="admin-content">
            <div class="section-header">
                <h2>Data Pengguna</h2>
                <p>Kelola akun user ShowTix</p>
            </div>

            <div class="admin-card">
                <form method="GET" style="margin-bottom:15px;">
                    <label style="margin-right:10px;">Tampilkan</label>

                    <select name="limit" onchange="this.form.submit()" class="input" style="width:80px;">
                        <option value="5" <?= $limit == 5 ? 'selected' : '' ?>>5</option>
                        <option value="10" <?= $limit == 10 ? 'selected' : '' ?>>10</option>
                        <option value="15" <?= $limit == 15 ? 'selected' : '' ?>>15</option>
                        <option value="30" <?= $limit == 30 ? 'selected' : '' ?>>30</option>
                    </select>

                    <input type="hidden" name="page" value="1">
                </form>

                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <?php $no = $offset + 1; ?>

                    <tbody>
                        <?php $no = $offset + 1; ?>
                        <?php while ($row = mysqli_fetch_assoc($query)) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= htmlspecialchars($row['nama_lengkap']) ?></td>
                                <td><?= htmlspecialchars($row['username']) ?></td>
                                <td><?= htmlspecialchars($row['email']) ?></td>
                                <td><span class="badge"><?= $row['role'] ?></span></td>
                                <td>
                                    <a href="edit_user.php?id=<?= $row['id'] ?>" class="action-btn btn-edit">Edit</a>
                                    <a href="delete_user.php?id=<?= $row['id'] ?>" class="action-btn btn-delete delete-btn">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div class="pagination">
                    <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                        <a href="?page=<?= $i ?>&limit=<?= $limit ?>" class="page-link <?= $page == $i ? 'active' : '' ?>">
                            <?= $i ?>
                        </a>
                    <?php } ?>
                </div>
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