<?php
session_start();
require_once 'koneksiDb.php';

// Redirect jika belum login
if (!isset($_SESSION['logged_in'])) {
    header('Location: login.php');
    exit();
}

// Ambil data user
try {
    $query = "SELECT * FROM users WHERE user_id = :user_id";
    $stmt = $koneksi->prepare($query);
    $stmt->bindParam(':user_id', $_SESSION['user_id']);
    $stmt->execute();
    $user = $stmt->fetch();
} catch(PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil Pengguna - Informasi Cianjur</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="user.css"> <!-- Pastikan menggunakan styles.css yang sama -->
</head>
<body>
  <?php include 'header.php'; ?>

  <main class="container">
    <div class="profile-section">
      <div class="profile-header">
        <h2><i class="fas fa-user-circle"></i> Profil Pengguna</h2>
        <div class="profile-actions">
          <a href="edit_profile.php" class="btn btn-primary"><i class="fas fa-edit"></i> Edit Profil</a>
          <a href="change_password.php" class="btn btn-secondary"><i class="fas fa-key"></i> Ganti Password</a>
        </div>
      </div>
      
      <div class="profile-details">
        <div class="detail-row">
          <div class="detail-label">
            <i class="fas fa-user"></i> Username:
          </div>
          <div class="detail-value">
            <?php echo htmlspecialchars($user['username']); ?>
          </div>
        </div>
        
        <div class="detail-row">
          <div class="detail-label">
            <i class="fas fa-envelope"></i> Email:
          </div>
          <div class="detail-value">
            <?php echo htmlspecialchars($user['email']); ?>
          </div>
        </div>
        
        <div class="detail-row">
          <div class="detail-label">
            <i class="fas fa-id-card"></i> Nama Lengkap:
          </div>
          <div class="detail-value">
            <?php echo htmlspecialchars($user['full_name']); ?>
          </div>
        </div>
        
        <div class="detail-row">
          <div class="detail-label">
            <i class="fas fa-calendar-alt"></i> Terdaftar sejak:
          </div>
          <div class="detail-value">
            <?php echo date('d F Y', strtotime($user['created_at'])); ?>
          </div>
        </div>
        
        <div class="detail-row">
          <div class="detail-label">
            <i class="fas fa-clock"></i> Terakhir login:
          </div>
          <div class="detail-value">
            <?php echo $user['last_login'] ? date('d F Y H:i', strtotime($user['last_login'])) : 'Belum pernah login'; ?>
          </div>
        </div>
      </div>
    </div>
  </main>
  
  <?php include 'footer.php'; ?>
</body>
</html>