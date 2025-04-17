<?php
require_once '../config/config.php';
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['user_email'])) {
    header('Location: ../auth/login.php');
    exit();
}

// Ambil data user
$user_email = $_SESSION['user_email'];
$user_name = $_SESSION['user_name'];

// Ambil daftar video dan komentar (contoh, perlu diimplementasikan)
$videos = [];  // Placeholder, ambil data video dari YouTube API
$comments = [];  // Placeholder, ambil data komentar dari YouTube API

// Ambil statistik pengguna (misalnya: jumlah komentar spam yang sudah dihapus)
$spam_removed_count = 0;  // Placeholder, update sesuai implementasi
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - <?= $site_name ?></title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="dashboard-container">
        <header>
            <h1>Welcome, <?= $user_name ?>!</h1>
            <a href="../auth/logout.php" class="btn-logout">Logout</a>
        </header>

        <section class="statistics">
            <h2>Statistik</h2>
            <p><strong>Jumlah Komentar Spam Terhapus:</strong> <?= $spam_removed_count ?></p>
        </section>

        <section class="videos">
            <h2>Daftar Video</h2>
            <ul>
                <?php foreach ($videos as $video): ?>
                    <li>
                        <h3><?= $video['title'] ?></h3>
                        <ul>
                            <?php foreach ($comments as $comment): ?>
                                <li><?= $comment['content'] ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                <?php endforeach; ?>
            </ul>
        </section>

        <section class="actions">
            <h2>Aksi</h2>
            <form action="delete_comments.php" method="POST">
                <input type="submit" value="Hapus Semua Komentar Spam" class="btn-delete">
            </form>
        </section>
    </div>
</body>
</html>
