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
  <meta name="description" content="Makanan khas Cianjur yang wajib dicoba - Laksa, Geco, Manisan Buah dan lainnya">
  <title>Kuliner Cianjur | Makanan Khas yang Menggugah Selera</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="styles.css" />
</head>
<body>
  <header class="food-header">
    <div class="header-overlay">
      <h1>Kuliner Cianjur</h1>
      <p class="tagline">Rasa Autentik yang Menggugah Selera</p>
    </div>
  </header>

  <nav id="main-nav">
    <div class="nav-container">
      <a href="index.php"><i class="fas fa-home"></i> Home</a>
      <a href="sejarah.php"><i class="fas fa-landmark"></i> Sejarah</a>
      <a href="kuliner.php" class="active"><i class="fas fa-utensils"></i> Kuliner</a>
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

  <main class="food-main">
    <section class="food-intro">
      <div class="container">
        <h2 class="section-title">Makanan Khas Cianjur</h2>
        <p class="section-intro">
          Cianjur tidak hanya menawarkan pemandangan alam yang indah, tetapi juga kekayaan kuliner yang autentik.
          Berikut beberapa hidangan khas yang wajib Anda coba ketika berkunjung:
        </p>
      </div>
    </section>

    <section class="food-gallery">
      <div class="container">
        <div class="food-grid">
          <div class="food-card">
            <div class="food-image">
              <img src="gambar/Laksa Cianjur.jpg" alt="Laksa Cianjur">
            </div>
            <div class="food-content">
              <h3>Laksa Cianjur</h3>
              <div class="food-rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
                <span>4.5</span>
              </div>
              <p>
                Mie berkuah santan kental dengan campuran bumbu rempah khas. Biasanya disajikan dengan tauge, ayam suwir, 
                dan taburan bawang goreng. Laksa Cianjur memiliki cita rasa gurih, pedas, dan sedikit manis yang khas.
              </p>
              <div class="food-info">
                <span><i class="fas fa-map-marker-alt"></i> Tempat Terkenal: Warung Laksa Hj. Euis</span>
                <span><i class="fas fa-tag"></i> Harga: Rp15.000 - Rp25.000</span>
              </div>
            </div>
          </div>

          <div class="food-card">
            <div class="food-image">
              <img src="gambar/geco Cianjur.jpg" alt="Geco Cianjur">
            </div>
            <div class="food-content">
              <h3>Geco (Toge Tauco)</h3>
              <div class="food-rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
                <span>4.0</span>
              </div>
              <p>
                Singkatan dari Toge dan Tauco, disajikan dengan ketupat, bumbu kacang, dan kerupuk. 
                Hidangan ini memiliki tekstur renyah dari toge dan gurih dari tauco, dengan rasa sedikit pedas.
              </p>
              <div class="food-info">
                <span><i class="fas fa-map-marker-alt"></i> Tempat Terkenal: Geco Mang Ujang</span>
                <span><i class="fas fa-tag"></i> Harga: Rp10.000 - Rp15.000</span>
              </div>
            </div>
          </div>

          <div class="food-card">
            <div class="food-image">
              <img src="gambar/manisan buah.webp" alt="Manisan Buah Cianjur">
            </div>
            <div class="food-content">
              <h3>Manisan Buah</h3>
              <div class="food-rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <span>5.0</span>
              </div>
              <p>
                Buah segar seperti pala, kedondong, dan mangga yang diawetkan dengan gula. 
                Manisan Cianjur terkenal dengan tekstur kenyal dan rasa manis-asam yang seimbang.
              </p>
              <div class="food-info">
                <span><i class="fas fa-map-marker-alt"></i> Tempat Terkenal: Pusat Oleh-oleh Cianjur</span>
                <span><i class="fas fa-tag"></i> Harga: Rp25.000 - Rp50.000/pack</span>
              </div>
            </div>
          </div>

          <div class="food-card">
            <div class="food-image">
              <img src="gambar/sate maranggi.jpg" alt="Sate Marah">
            </div>
            <div class="food-content">
              <h3>Sate Marah</h3>
              <div class="food-rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
                <span>4.5</span>
              </div>
              <p>
                Sate maranggi (bahasa Sunda: ᮞᮒᮦ ᮙᮛᮀᮌᮤ, translit. Saté maranggi) adalah makanan khas Sunda di Indonesia yang biasa ditemukan di daerah Jawa Barat, 
                khususnya Purwakarta dan Cianjur. Istilah maranggi sendiri dalam bahasa Sunda merupakan istilah petukangan, yakni "seorang ahli pembuat sarung keris"
              </p>
              <div class="food-info">
                <span><i class="fas fa-map-marker-alt"></i> Tempat Terkenal: Sate Maranggi Cianjur Ma Nunung</span>
                <span><i class="fas fa-tag"></i> Harga: Rp3000an per tusuk sate</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="food-tips">
      <div class="container">
        <h2>Tips Menikmati Kuliner Cianjur</h2>
        <div class="tips-grid">
          <div class="tip-card">
            <i class="fas fa-clock"></i>
            <h3>Waktu Terbaik</h3>
            <p>Laksa biasanya lebih enak dinikmati pagi hari, sedangkan Geco lebih populer sebagai menu makan siang.</p>
          </div>
          <div class="tip-card">
            <i class="fas fa-pepper-hot"></i>
            <h3>Level Pedas</h3>
            <p>Jangan ragu meminta level pedas disesuaikan, karena beberapa hidangan bisa sangat pedas.</p>
          </div>
          <div class="tip-card">
            <i class="fas fa-shopping-bag"></i>
            <h3>Oleh-oleh</h3>
            <p>Manisan buah dan dodol pisang adalah pilihan oleh-oleh yang tahan lama dan khas Cianjur.</p>
          </div>
        </div>
      </div>
    </section>
  </main>
    <?php include 'footer.php'; ?>
</body>
</html>