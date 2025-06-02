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
  <meta name="description" content="Tempat wisata menarik di Cianjur - Kebun Raya Cibodas, Curug Citambur, Gunung Padang dan lainnya">
  <title>Wisata Cianjur | Destinasi Alam & Budaya yang Memukau</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="styles.css" />
</head>
<body>
  <header class="wisata-header">
    <div class="header-overlay">
      <h1>Wisata Cianjur</h1>
      <p class="tagline">Keindahan Alam & Warisan Budaya yang Memesona</p>
      <a href="#explore" class="cta-button">Jelajahi Sekarang <i class="fas fa-arrow-down"></i></a>
    </div>
  </header>

  <nav id="main-nav">
    <div class="nav-container">
      <a href="index.php"><i class="fas fa-home"></i> Home</a>
      <a href="sejarah.php"><i class="fas fa-landmark"></i> Sejarah</a>
      <a href="kuliner.php"><i class="fas fa-utensils"></i> Kuliner</a>
      <a href="wisata.php" class="active"><i class="fas fa-mountain"></i> Wisata</a>

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
    </div>
  </nav>

  <main id="explore">
    <section class="wisata-intro">
      <div class="container">
        <h2 class="section-title">Destinasi Wisata Cianjur</h2>
        <p class="section-intro">
          Kabupaten Cianjur menawarkan beragam destinasi wisata mulai dari alam yang memukau hingga situs budaya bersejarah.
          Berikut beberapa tempat wisata unggulan yang wajib dikunjungi:
        </p>
      </div>
    </section>

    <section class="wisata-grid-section">
      <div class="container">
        <div class="wisata-grid">
          <div class="wisata-card">
            <div class="wisata-image">
              <img src="gambar/kebun raya cibodas.jpg" alt="Kebun Raya Cibodas">
              <div class="wisata-label">Alam</div>
            </div>
            <div class="wisata-content">
              <h3>Kebun Raya Cibodas</h3>
              <div class="wisata-rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
                <span>4.7 (1.2k ulasan)</span>
              </div>
              <p>
                Taman botani seluas 125 hektar dengan koleksi lebih dari 5.000 jenis tumbuhan. Memiliki udara sejuk dengan suhu 17-27°C dan beberapa spot foto instagramable.
              </p>
              <div class="wisata-info">
                <span><i class="fas fa-map-marker-alt"></i> Kec. Pacet, 15 km dari pusat kota</span>
                <span><i class="fas fa-clock"></i> Buka: 08.00-16.00 WIB</span>
                <span><i class="fas fa-ticket-alt"></i> Tiket: Rp15.000/orang</span>
              </div>
              <a href="#" class="wisata-btn">Lihat Peta <i class="fas fa-map-marked-alt"></i></a>
            </div>
          </div>

          <div class="wisata-card">
            <div class="wisata-image">
              <img src="gambar/curug citambur.webp" alt="Curug Citambur">
              <div class="wisata-label">Petualangan</div>
            </div>
            <div class="wisata-content">
              <h3>Curug Citambur</h3>
              <div class="wisata-rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <span>4.9 (890 ulasan)</span>
              </div>
              <p>
                Air terjun setinggi 87 meter yang dikelilingi hutan lebat. Perjalanan menuju curug melalui jalur trekking sejauh 1,5 km dengan pemandangan spektakuler.
              </p>
              <div class="wisata-info">
                <span><i class="fas fa-map-marker-alt"></i> Kec. Naringgul, 45 km dari kota</span>
                <span><i class="fas fa-clock"></i> Buka: 07.00-17.00 WIB</span>
                <span><i class="fas fa-ticket-alt"></i> Tiket: Rp10.000/orang</span>
              </div>
              <a href="#" class="wisata-btn">Lihat Peta <i class="fas fa-map-marked-alt"></i></a>
            </div>
          </div>

          <div class="wisata-card">
            <div class="wisata-image">
              <img src="gambar/situsGunungPadang.jpeg" alt="Situs Gunung Padang">
              <div class="wisata-label">Sejarah</div>
            </div>
            <div class="wisata-content">
              <h3>Situs Gunung Padang</h3>
              <div class="wisata-rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
                <span>4.3 (2.5k ulasan)</span>
              </div>
              <p>
                Situs megalitikum terbesar di Asia Tenggara yang diperkirakan berusia lebih dari 5.000 tahun. Terdiri dari lima teras batu dengan misteri arkeologi yang belum terpecahkan.
              </p>
              <div class="wisata-info">
                <span><i class="fas fa-map-marker-alt"></i> Kec. Campaka, 30 km dari kota</span>
                <span><i class="fas fa-clock"></i> Buka: 08.00-17.00 WIB</span>
                <span><i class="fas fa-ticket-alt"></i> Tiket: Rp20.000/orang</span>
              </div>
              <a href="#" class="wisata-btn">Lihat Peta <i class="fas fa-map-marked-alt"></i></a>
            </div>
          </div>

          <div class="wisata-card">
            <div class="wisata-image">
              <img src="gambar/telagaBiru.jpg" alt="Telaga Biru">
              <div class="wisata-label">Alam</div>
            </div>
            <div class="wisata-content">
              <h3>Telaga Biru</h3>
              <div class="wisata-rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
                <span>4.6 (750 ulasan)</span>
              </div>
              <p>
                Danau kecil dengan air berwarna biru kehijauan yang jernih, dikelilingi tebing dan vegetasi hutan yang asri. Spot populer untuk foto dan bersantai.
              </p>
              <div class="wisata-info">
                <span><i class="fas fa-map-marker-alt"></i> Kec. Pacet, 20 km dari kota</span>
                <span><i class="fas fa-clock"></i> Buka: 07.00-18.00 WIB</span>
                <span><i class="fas fa-ticket-alt"></i> Tiket: Rp5.000/orang</span>
              </div>
              <a href="#" class="wisata-btn">Lihat Peta <i class="fas fa-map-marked-alt"></i></a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="wisata-categories">
      <div class="container">
        <h2>Jenis Wisata di Cianjur</h2>
        <div class="category-grid">
          <div class="category-card" style="background-image: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3)), url('https://upload.wikimedia.org/wikipedia/commons/3/3f/Curug_Citambur.jpg')">
            <h3>Wisata Alam</h3>
            <p>Air terjun, kebun raya, dan pemandangan gunung</p>
            <a href="#">Jelajahi <i class="fas fa-arrow-right"></i></a>
          </div>
          <div class="category-card" style="background-image: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3)), url('https://upload.wikimedia.org/wikipedia/commons/5/5d/Gunung_Padang_2014.JPG')">
            <h3>Wisata Sejarah</h3>
            <p>Situs purbakala dan bangunan bersejarah</p>
            <a href="#">Jelajahi <i class="fas fa-arrow-right"></i></a>
          </div>
          <div class="category-card" style="background-image: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3)), url('https://upload.wikimedia.org/wikipedia/commons/7/7f/Telaga_Biru_Cianjur.jpg')">
            <h3>Wisata Keluarga</h3>
            <p>Tempat rekreasi dan edukasi untuk semua usia</p>
            <a href="#">Jelajahi <i class="fas fa-arrow-right"></i></a>
          </div>
        </div>
      </div>
    </section>
  </main>
    <?php include 'footer.php'; ?>
</body>
</html>