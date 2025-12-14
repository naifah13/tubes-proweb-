<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit;
}

require_once "../koneksi.php";

$id = $_GET['id'];

$query = mysqli_query($koneksi, "SELECT * FROM data_pengguna WHERE id = $id");
$user = mysqli_fetch_assoc($query);

if (!$user) {
    die("User tidak ditemukan");
}

if (isset($_POST['update'])) {

    $nama     = $_POST['nama_lengkap'];
    $username = $_POST['username'];
    $email    = $_POST['email'];
    $role     = $_POST['role'];

    $update = mysqli_query($koneksi, "
        UPDATE data_pengguna
        SET 
            nama_lengkap='$nama',
            username='$username',
            email='$email',
            role='$role'
        WHERE id=$id
    ");

    if ($update) {
        header("Location: dashboard_admin.php");
        exit;
    } else {
        echo "Gagal update data";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit User – Admin</title>

    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

    <style>
        body, input, select, button, h2, p, a {
            font-family: 'Bebas Neue', sans-serif;
        }

        /* wrapper khusus halaman edit */
        .edit-user-wrapper {
            margin-top: 70px;
            min-height: calc(100vh - 70px);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }

        /* card form */
        .edit-user-card {
            width: 100%;
            max-width: 420px;
            background: rgba(255,255,255,0.05);
            backdrop-filter: blur(8px);
            border-radius: 16px;
            padding: 30px;
        }

        .edit-user-card h2 {
            text-align: center;
            margin-bottom: 5px;
        }

        .edit-user-card p {
            text-align: center;
            font-size: 13px;
            opacity: 0.7;
            margin-bottom: 25px;
        }

        .edit-user-card .input {
            margin-bottom: 15px;
        }

        .edit-user-actions {
            display: flex;
            justify-content: center;
            margin-top: 15px;
        }

    </style>
</head>

<body>

<header class="navbar">
    <div class="navbar-left">
        <a href="dashboard_admin.php" class="logo">🎬 ShowTix id</a>
    </div>
</header>

<div class="edit-user-wrapper">

    <div class="edit-user-card">

        <h2>Edit User</h2>
        <p>Perbarui data akun pengguna</p>

        <form method="POST">

            <input class="input" type="text" name="nama_lengkap"
                   placeholder="Nama Lengkap"
                   value="<?= htmlspecialchars($user['nama_lengkap']) ?>" required>

            <input class="input" type="text" name="username"
                   placeholder="Username"
                   value="<?= htmlspecialchars($user['username']) ?>" required>

            <input class="input" type="email" name="email"
                   placeholder="Email"
                   value="<?= htmlspecialchars($user['email']) ?>" required>

            <select class="input" name="role">
                <option value="user" <?= $user['role']=='user'?'selected':'' ?>>User</option>
                <option value="admin" <?= $user['role']=='admin'?'selected':'' ?>>Admin</option>
            </select>

            <div class="edit-user-actions">
                <button type="submit" name="update" class="btn btn-primary btn-lg">
                    Simpan Perubahan
                </button>
            </div>

        </form>

    </div>

</div>

</body>
</html>
