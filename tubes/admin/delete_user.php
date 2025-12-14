<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit;
}

require_once "../koneksi.php";

if (!isset($_GET['id'])) {
    header("Location: dashboard_admin.php");
    exit;
}

$id = $_GET['id'];

// proteksi: jangan hapus diri sendiri (opsional tapi disarankan)
if ($_SESSION['user_id'] == $id) {
    header("Location: dashboard_admin.php");
    exit;
}

$delete = mysqli_query($koneksi, "DELETE FROM data_pengguna WHERE id = $id");

if ($delete) {
    header("Location: dashboard_admin.php");
    exit;
} else {
    echo "Gagal menghapus user";
}
