<?php
// config/db.php
// Ubah setting sesuai environment lokal kamu
$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = '';
$DB_NAME = 'db_course_management';

try {
    // Membuat koneksi PDO
    $dsn = "mysql:host=$DB_HOST;dbname=$DB_NAME;charset=utf8mb4";
    $pdo = new PDO($dsn, $DB_USER, $DB_PASS);

    // Set mode error ke exception agar mudah ditangani
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Optional: set default fetch mode ke associative array
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    // Jika gagal koneksi, tampilkan pesan error
    die("Failed to connect to MySQL: " . $e->getMessage());
}
