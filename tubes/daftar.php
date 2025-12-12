<?php
require_once 'koneksi.php';

if(isset($_POST['daftar'])){
    $nama_lengkap = $_POST['nama_lengkap'];
    $username     = $_POST['username'];
    $email        = $_POST['email'];
    $password     = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO data_pengguna (nama_lengkap, username, email, password) VALUES ('$nama_lengkap', '$username', '$email', '$password')";

    if($koneksi->query($sql)===TRUE){
        header("Location: login.php");
        exit;
    } else {
        $error = "Terjadi kesalahan: ".$koneksi->error;
    }

    $koneksi->close();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <style>
        body, input, button, h2, p, a {
            font-family: 'Bebas Neue', sans-serif;
        }
    </style>
</head>
<body>

<section class="auth-section">
    <div class="auth-card">
        <h2>Daftar</h2>

        <?php
        if(isset($error)){
            echo "<p style='color:red;text-align:center;'>$error</p>";
        }
        ?>

        <form action="" method="POST">
            <input class="input" type="text" name="nama_lengkap" placeholder="Nama Lengkap" style="margin-bottom: 15px;" required>
            <input class="input" type="text" name="username" placeholder="Username" style="margin-bottom: 15px;" required>
            <input class="input" type="email" name="email" placeholder="Email" style="margin-bottom: 15px;" required>
            <input class="input" type="password" name="password" placeholder="Password" style="margin-bottom: 15px;" required>

            <button type="submit" name="daftar" class="btn btn-primary btn-lg auth-btn">Daftar</button>
        </form>

        <p style="margin-top: 20px; font-size: 14px; text-align:center;">
            Sudah memiliki akun?
            <a href="login.php" style="color: #007bff; text-decoration: none;">Klik di sini</a>
        </p>
    </div>
</section>

</body>
</html>
