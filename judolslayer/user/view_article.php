<?php
require_once '../config/config.php';
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['user_email'])) {
    header('Location: ../auth/login.php');
    exit();
}

// Ambil slug artikel dari URL
if (isset($_GET['slug'])) {
    $slug = $_GET['slug'];
} else {
    header('Location: blog.php');
    exit();
}

// Ambil artikel berdasarkan slug (Placeholder: ganti dengan query ke database)
$articles = [
    'panduan-penggunaan-judolslayer' => [
        'title' => 'Panduan Penggunaan JudolSlayer',
        'content' => 'Panduan lengkap tentang bagaimana menggunakan JudolSlayer untuk menghapus komentar spam pada channel YouTube Anda.',
        'date' => '2025-04-18',
    ],
    'update-fitur-terbaru' => [
        'title' => 'Update Fitur Terbaru',
        'content' => 'Fitur baru telah ditambahkan, termasuk integrasi pembayaran dan penghapusan komentar massal.',
        'date' => '2025-04-17',
    ],
];

// Cek jika artikel ditemukan
if (!isset($articles[$slug])) {
    echo 'Artikel tidak ditemukan.';
    exit();
}

// Ambil artikel yang sesuai dengan slug
$article = $articles[$slug];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $article['title'] ?> - <?= $site_name ?></title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="article-container">
        <header>
            <h1><?= $article['title'] ?></h1>
            <a href="blog.php" class="btn-back">Kembali ke Blog</a>
        </header>

        <section class="article-content">
            <p><strong>Tanggal:</strong> <?= $article['date'] ?></p>
            <p><?= $article['content'] ?></p>
        </section>
    </div>
</body>
</html>
