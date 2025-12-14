<?php
session_start();
require_once("koneksi.php");

if (isset($_POST['btn-lg'])) {

    $user_login = $_POST['username'];
    $pass_login = $_POST['password'];

    $sql = "SELECT * FROM data_pengguna WHERE username = '$user_login'";
    $query = mysqli_query($koneksi, $sql);

    if (!$query) {
        die("Query gagal" . mysqli_error($koneksi));
    }

    $user = "";
    $pass = "";

    while ($row = mysqli_fetch_array($query)) {
        $user = $row['username'];
        $pass = $row['password'];
    }

    if ($user_login == $user && password_verify($pass_login, $pass)) {
        $_SESSION['username'] = $user;
        header("Location: home.php");
        exit;
    } else {
        $login_error = true;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
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
        <h2>Login</h2>

        <form action="" method="POST">
            <input class="input" type="text" name="username" placeholder="Username" required style="margin-bottom: 15px;">
            <input class="input" type="password" name="password" placeholder="Password" required style="margin-bottom: 15px;">

            <button type="submit" name="btn-lg" class="btn btn-primary btn-lg auth-btn">
                Login
            </button>
        </form>

        <p style="margin-top: 20px; font-size: 14px; text-align:center;">
            Belum memiliki akun?
            <a href="daftar.php" style="color:#007bff; text-decoration:none;">Klik di sini</a>
        </p>
    </div>
</section>

<script>
<?php if (isset($login_error)) : ?>
    alert("Username atau Password salah!");
<?php endif; ?>
</script>

</body>
</html>
