<?php
// register.php
require_once 'koneksiDb.php';

$error_message = '';
$success_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    $full_name = $_POST['full_name'] ?? '';
    
    // Validasi
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        $error_message = "Semua field harus diisi!";
    } elseif ($password !== $confirm_password) {
        $error_message = "Password dan konfirmasi password tidak sama!";
    } else {
        try {
            // Cek apakah username atau email sudah ada
            $query = "SELECT COUNT(*) FROM users WHERE username = :username OR email = :email";
            $stmt = $koneksi->prepare($query);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            
            if ($stmt->fetchColumn() > 0) {
                $error_message = "Username atau email sudah terdaftar!";
            } else {
                // Hash password
                $password_hash = password_hash($password, PASSWORD_DEFAULT);
                
                // Simpan ke database
                $query = "INSERT INTO users (username, email, password_hash, full_name) 
                          VALUES (:username, :email, :password_hash, :full_name)";
                $stmt = $koneksi->prepare($query);
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password_hash', $password_hash);
                $stmt->bindParam(':full_name', $full_name);
                $stmt->execute();
                
                $success_message = "Pendaftaran berhasil! Silakan login.";
            }
        } catch(PDOException $e) {
            $error_message = "Terjadi kesalahan: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar - Informasi Cianjur</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="auth.css">
</head>
<body>
  <div class="register-container">
    <div class="register-box">
      <h2><i class="fas fa-user-plus"></i> Daftar Akun</h2>
      
      <?php if($error_message): ?>
        <div class="error-message"><?php echo $error_message; ?></div>
      <?php endif; ?>
      
      <?php if($success_message): ?>
        <div class="success-message"><?php echo $success_message; ?></div>
      <?php endif; ?>
      
      <form action="register.php" method="POST">
        <div class="input-group">
          <label for="username"><i class="fas fa-user"></i> Username</label>
          <input type="text" id="username" name="username" required>
        </div>
        
        <div class="input-group">
          <label for="email"><i class="fas fa-envelope"></i> Email</label>
          <input type="email" id="email" name="email" required>
        </div>
        
        <div class="input-group">
          <label for="full_name"><i class="fas fa-id-card"></i> Nama Lengkap</label>
          <input type="text" id="full_name" name="full_name" required>
        </div>
        
        <div class="input-group">
          <label for="password"><i class="fas fa-lock"></i> Password</label>
          <input type="password" id="password" name="password" required>
        </div>
        
        <div class="input-group">
          <label for="confirm_password"><i class="fas fa-lock"></i> Konfirmasi Password</label>
          <input type="password" id="confirm_password" name="confirm_password" required>
        </div>
        
        <button type="submit" class="register-btn">Daftar</button>
      </form>
      
      <div class="login-link">
        Sudah punya akun? <a href="login.php">Login disini</a>
      </div>
    </div>
  </div>
</body>
</html>