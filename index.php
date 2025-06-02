<?php
session_start();
require_once 'koneksiDb.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="Website informasi lengkap tentang Cianjur - sejarah, budaya, kuliner, dan wisata">
  <title>Informasi Cianjur | Halaman Utama</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="styles.css"/>
</head>
<body>
  <header>
    <div class="header-overlay">
      <h1>Selamat Datang di Cianjur</h1>
      <p class="tagline">Menjelajahi Keindahan, Sejarah, dan Budaya Tanah Pasundan</p>
      <a href="#explore" class="cta-button">Mulai Jelajahi <i class="fas fa-chevron-down"></i></a>
    </div>
  </header>

  <nav id="main-nav">
    <div class="nav-container">
      <a href="index.php" class="active"><i class="fas fa-home"></i> Home</a>
      <a href="sejarah.php"><i class="fas fa-landmark"></i> Sejarah</a>
      <a href="kuliner.php"><i class="fas fa-utensils"></i> Kuliner</a>
      <a href="wisata.php"><i class="fas fa-mountain"></i> Wisata</a>
      <?php if(isset($_SESSION['logged_in'])): ?>
        <div class="user-dropdown">
          <button class="user-btn">
            <i class="fas fa-user-circle"></i> <?php echo htmlspecialchars($_SESSION['username']); ?>
          </button>
          <div class="dropdown-content">
            <a href="profile.php"><i class="fas fa-user"></i> Profil</a>
            <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
          </div>
        </div>
      <?php else: ?>
        <a href="login.php" class="login-btn"><i class="fas fa-user"></i> Login</a>
      <?php endif; ?>
    </div>
  </nav>

  <main id="explore">
    <section class="intro-section">
      <div class="container">
        <h2>Mengenal Cianjur</h2>
        <p class="lead-text">
          Kabupaten Cianjur di Jawa Barat menawarkan harmoni alam yang memukau, warisan budaya yang kaya, dan sejarah panjang yang mengagumkan. Dikenal sebagai "Kota Tahu" dan "Kota Santri", Cianjur menyimpan banyak cerita dan keindahan yang menunggu untuk dijelajahi.
        </p>
        
        <div class="features-grid">
          <div class="feature-card">
            <i class="fas fa-history"></i>
            <h3>Sejarah Panjang</h3>
            <p>Temukan perjalanan Cianjur dari masa ke masa melalui peninggalan bersejarahnya.</p>
          </div>
          
          <div class="feature-card">
            <i class="fas fa-utensils"></i>
            <h3>Kuliner Lezat</h3>
            <p>Rasakan keunikan cita rasa khas Cianjur yang menggugah selera.</p>
          </div>
          
          <div class="feature-card">
            <i class="fas fa-mountain"></i>
            <h3>Wisata Alam</h3>
            <p>Jelajahi keindahan alam Cianjur yang memesona dari dataran rendah hingga pegunungan.</p>
          </div>
        </div>
      </div>
    </section>

    <section class="highlight-section">
      <div class="container">
        <h2>Spotlight Cianjur</h2>
        <div class="highlight-card">
          <img src="gambar/cianjur-cianjur-regency-b26c19f6-7364-413c-8a71-8cd7ae73d50-resize-750.jpg" alt="Pemandangan Cianjur" class="responsive">
          <div class="highlight-content">
            <h3>Keindahan Alam yang Memukau</h3>
            <p>Cianjur menawarkan panorama alam yang beragam, mulai dari sawah hijau yang membentang, perkebunan teh yang asri, hingga puncak gunung yang menantang. Setiap sudutnya menawarkan pengalaman berbeda yang tak terlupakan.</p>
            <a href="wisata.html" class="read-more">Selengkapnya <i class="fas fa-arrow-right"></i></a>
          </div>
        </div>
      </div>
    </section>
  </main>

  <footer>
    <div class="footer-container">
      <div class="footer-section">
        <h4>Informasi Cianjur</h4>
        <p>Website informasi lengkap tentang sejarah, budaya, kuliner dan wisata Kabupaten Cianjur, Jawa Barat.</p>
      </div>
      
      <div class="footer-section">
        <h4>Navigasi</h4>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="sejarah.php">Sejarah</a></li>
          <li><a href="kuliner.php">Kuliner</a></li>
          <li><a href="wisata.php">Wisata</a></li>
        </ul>
      </div>
      
      <div class="footer-section">
        <h4>Kontak</h4>
        <p><i class="fas fa-envelope"></i> kelompokwebinformasi@gmail.com</p>
        <div class="social-icons">
          <a href="#"><i class="fab fa-facebook"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
        </div>
      </div>
    </div>
    
    <div class="copyright">
      <p>&copy; 2025 Informasi Cianjur. All rights reserved.</p>
    </div>
  </footer>
</body>
</html>