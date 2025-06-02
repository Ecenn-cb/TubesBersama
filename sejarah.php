<?php
session_start();
require_once 'koneksiDb.php';

// Check if user is logged in
$logged_in = isset($_SESSION['logged_in']);
$username = $logged_in ? $_SESSION['username'] : '';
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="Sejarah lengkap Kabupaten Cianjur dari masa ke masa">
  <title>Sejarah Cianjur | Informasi Lengkap Perkembangan Cianjur</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="styles.css" />
</head>
<body>
  <header class="history-header">
    <div class="header-overlay">
      <h1>Sejarah Cianjur</h1>
      <p class="tagline">Melacak Jejak Peradaban dari Masa ke Masa</p>
    </div>
  </header>

  <nav id="main-nav">
    <div class="nav-container">
      <a href="index.php"><i class="fas fa-home"></i> Home</a>
      <a href="sejarah.php" class="active"><i class="fas fa-landmark"></i> Sejarah</a>
      <a href="kuliner.php"><i class="fas fa-utensils"></i> Kuliner</a>
      <a href="wisata.php"><i class="fas fa-mountain"></i> Wisata</a>
      
      <?php if($logged_in): ?>
        <div class="user-dropdown">
          <button class="user-btn">
            <i class="fas fa-user-circle"></i> <?php echo htmlspecialchars($username); ?>
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

  <main class="history-main">
    <section class="timeline-section">
      <div class="container">
        <h2 class="section-title">Perjalanan Sejarah Cianjur</h2>
        <p class="section-intro">
          Cianjur memiliki catatan sejarah panjang yang bermula dari abad ke-17. Berikut perkembangan penting dalam sejarah Kabupaten Cianjur:
        </p>
        
        <div class="timeline">
          <div class="timeline-item">
            <div class="timeline-content">
              <h3>Masa Pendirian (1677-1680)</h3>
              <div class="timeline-image">
                <img src="gambar/R.A-Wiradatanu-I.jpg" alt="Pendiri Cianjur">
              </div>
              <p>
                Sejarah Cianjur bermula dari Raden Jayasasana (Aria Wira Tanu I), putra Aria Wangsa Goparana dari Talaga (Majalengka selatan). 
                Atas perintah Sultan Sepuh I dari Cirebon, ia memimpin 100 cacah (rakyat) untuk membuka wilayah baru di Cikundul (sekarang Cikalongkulon).
              </p>
            </div>
          </div>
          
          <div class="timeline-item">
            <div class="timeline-content">
              <h3>Pertahanan dari Banten (1680)</h3>
              <p>
                Sebagai wilayah vasal Mataram melalui Cirebon, Cianjur berhasil mempertahankan diri dari serangan Banten yang bermusuhan dengan Mataram. 
                Kesuksesan ini membuat Jayasasana dianugerahi gelar "Panglima Wira Tanu".
              </p>
            </div>
          </div>
          
          <div class="timeline-item">
            <div class="timeline-content">
              <h3>Pemindahan Ibu Nagari (1680)</h3>
              <div class="timeline-image">
                <img src="gambar/alun_alun_cjr.jpg" alt="Alun-alun Cianjur">
              </div>
              <p>
                Di bawah Wira Tanu II (putra Jayasasana), pusat pemerintahan dipindahkan ke Pamoyanan (sekarang Kecamatan Cianjur). 
                Wilayah ini mulai disebut "Cianjur" (dari sungai Ci Anjur) dan berkembang menjadi pusat pemerintahan yang penting.
              </p>
            </div>
          </div>
          
          <div class="timeline-item">
            <div class="timeline-content">
              <h3>Perkembangan Islam</h3>
              <p>
                Aria Wangsa Goparana mendirikan Nagari Sagara Herang (Subang) dan menyebarkan Islam ke wilayah sekitarnya, 
                sementara Cikundul berkembang menjadi ibu nagari yang penting di bawah kepemimpinan Wira Tanu.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <section class="modern-history">
      <div class="container">
        <h2>Cianjur Masa Kini</h2>
        <div class="modern-grid">
          <div class="modern-content">
            <p>
              Dari wilayah pertahanan kecil di abad ke-17, Cianjur berkembang menjadi kabupaten penting di Jawa Barat dengan:
            </p>
            <ul class="history-list">
              <li><i class="fas fa-check-circle"></i> Luas wilayah 3.840,16 km²</li>
              <li><i class="fas fa-check-circle"></i> 32 kecamatan dan 354 desa/kelurahan</li>
              <li><i class="fas fa-check-circle"></i> Julukan "Kota Tahu" dan "Kota Santri"</li>
              <li><i class="fas fa-check-circle"></i> Pusat produksi beras dan sayuran</li>
            </ul>
          </div>
          <div class="modern-image">
            <img src="gambar/Alun-alun-Cianjur3.jpg" alt="Cianjur Modern">
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include 'footer.php'; ?>
</body>
</html>