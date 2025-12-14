<?php
session_start();
require_once("koneksi.php");

if (isset($_POST['btn-lg'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM data_pengguna WHERE username = ?";
    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {

        $_SESSION['login']    = true; 
        $_SESSION['user_id']  = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role']     = $user['role'];

        if ($user['role'] === 'admin') {
            header("Location: admin/dashboard_home.php");
        } else {
            header("Location: home.php");
        }
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

            <p style="font-size:12px; text-align:center; opacity:0.6; margin-top:10px;">
                Login untuk user & admin
            </p>

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
