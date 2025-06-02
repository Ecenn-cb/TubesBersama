<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "websiteinformasi";

try {
    $koneksi = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    // Set mode error PDO ke exception
    $koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}
?>