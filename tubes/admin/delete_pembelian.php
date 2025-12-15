<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit;
}

require_once "../koneksi.php";

if (!isset($_GET['id'])) {
    header("Location: dashboard_pembelian.php");
    exit;
}

// Pastikan ID itu angka (security dasar biar gak kena SQL Injection ringan)
$id = (int) $_GET['id'];

// Hapus bagian proteksi "jangan hapus diri sendiri", itu gak relevan buat data pembelian.

$delete = mysqli_query($koneksi, "DELETE FROM data_pembelian WHERE id = $id");

if ($delete) {
    header("Location: dashboard_pembelian.php");
    exit;
} else {
    // Tampilin error MySQL kalau gagal, biar tau kenapa
    echo "Gagal menghapus data: " . mysqli_error($koneksi);
}
?>