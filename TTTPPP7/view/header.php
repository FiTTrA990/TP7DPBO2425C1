<?php
// view/header.php
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Kursus</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header class="main-header">
    <h1>📘 Sistem Manajemen Kursus</h1>
    <nav>
        <ul>
            <li><a href="index.php?page=home" <?= ($page === 'home') ? 'class="active"' : ''; ?>>Home</a></li>
            <li><a href="index.php?page=courses" <?= ($page === 'courses') ? 'class="active"' : ''; ?>>Kursus</a></li>
            <li><a href="index.php?page=students" <?= ($page === 'students') ? 'class="active"' : ''; ?>>Peserta</a></li>
            <li><a href="index.php?page=enrollments" <?= ($page === 'enrollments') ? 'class="active"' : ''; ?>>Enrollment</a></li>
        </ul>
    </nav>
</header>

<main class="container">
<?php if (!empty($msg)): ?>
    <p class="message"><?= htmlspecialchars($msg) ?></p>
<?php endif; ?>
