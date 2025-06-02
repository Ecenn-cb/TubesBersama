<?php
// proses_login.php
session_start();
require_once 'koneksiDb.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    try {
        // Cari user berdasarkan username
        $query = "SELECT * FROM users WHERE username = :username";
        $stmt = $koneksi->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        
        $user = $stmt->fetch();
        
        if ($user && password_verify($password, $user['password_hash'])) {
            // Login berhasil
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['full_name'] = $user['full_name'];
            
            // Redirect ke halaman utama
            header('Location: index.php');
            exit();
        } else {
            // Login gagal
            $error_message = "Username atau password salah!";
            include 'login.php';
        }
    } catch(PDOException $e) {
        $error_message = "Terjadi kesalahan: " . $e->getMessage();
        include 'login.php';
    }
} else {
    header('Location: login.php');
    exit();
}
?>