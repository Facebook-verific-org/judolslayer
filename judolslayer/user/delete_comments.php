<?php
require_once '../config/config.php';
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['user_email'])) {
    header('Location: ../auth/login.php');
    exit();
}

// Proses penghapusan komentar spam
// Pastikan kamu memiliki mekanisme untuk mendeteksi komentar spam dan menghapusnya menggunakan YouTube API

// Simulasi penghapusan komentar spam
// Kamu perlu implementasi penghapusan via YouTube API berdasarkan video ID dan komentar ID

// Simulasi penghapusan
$deleted_comments = []; // Placeholder, berisi daftar komentar yang dihapus

// Jika berhasil menghapus komentar
if (!empty($deleted_comments)) {
    // Update statistik penghapusan komentar spam
    $spam_removed_count = count($deleted_comments);

    // Redirect kembali ke dashboard dengan pesan sukses
    header("Location: dashboard.php?status=success&removed=$spam_removed_count");
    exit();
} else {
    // Jika tidak ada komentar yang dihapus, beri notifikasi error
    header('Location: dashboard.php?status=error');
    exit();
}
