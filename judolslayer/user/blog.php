<?php
require_once '../config/config.php';
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['user_email'])) {
    header('Location: ../auth/login.php');
    exit();
}

// Ambil daftar artikel dari database (placeholder)
$articles = [
    [
        'title' => 'Panduan Penggunaan JudolSlayer',
        'content' => 'Panduan lengkap tentang bagaimana menggunakan JudolSlayer untuk menghapus komentar spam pada channel YouTube Anda.',
        'date' => '2025-04-18',
        'slug' => 'panduan-penggunaan-judolslayer',
    ],
    [
        'title' => 'Update Fitur Terbaru',
        'content' => 'Fitur baru telah ditambahkan, termasuk integrasi pembayaran dan penghapusan komentar massal.',
        'date' => '2025-04-17',
        'slug' => 'update-fitur-terbaru',
    ]
    // Tambahkan artikel lain sesuai kebutuhan
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Blog - <?= $site_name ?></title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="blog-container">
        <header>
            <h1>Artikel & Berita</h1>
            <a href="dashboard.php" class="btn-back">Kembali ke Dashboard</a>
        </header>

        <section class="articles">
            <h2>Daftar Artikel</h2>
            <ul>
                <?php foreach ($articles as $article): ?>
                    <li>
                        <h3><a href="view_article.php?slug=<?= $article['slug'] ?>"><?= $article['title'] ?></a></h3>
                        <p><?= substr($article['content'], 0, 100) ?>...</p>
                        <small><?= $article['date'] ?></small>
                    </li>
                <?php endforeach; ?>
            </ul>
        </section>
    </div>
</body>
</html>
