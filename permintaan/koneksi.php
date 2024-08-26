<?php
// Database configuration
$host = 'localhost';
$dbname = 'dailyre1_permintaan';
$username = 'dailyre1_permintaan'; // Sesuaikan dengan username database Anda
$password = 'Yuhanes16*'; // Sesuaikan dengan password database Anda

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>
