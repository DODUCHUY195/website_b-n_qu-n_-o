<?php
$host = 'localhost';
$db   = 'du_an_1';
$user = 'root';
$pass = '';
$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
    die("Kết nối thất bại: " . $e->getMessage());
}
