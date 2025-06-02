<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Informasi Cianjur</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <header>
    <div class="header-overlay">
      <h1>Informasi Cianjur</h1>
      <p class="tagline">Portal informasi terupdate seputar Kabupaten Cianjur</p>
      <a href="#main-content" class="cta-button">Jelajahi Sekarang</a>
    </div>
  </header>

  <nav id="main-nav">
    <div class="nav-container">
      <a href="index.php" class="active"><i class="fas fa-home"></i> Beranda</a>
      <a href="sejarah.php"><i class="fas fa-landmark"></i> Sejarah</a>
      <a href="makanan.php"><i class="fas fa-utensils"></i> Kuliner</a>
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
        <a href="login.php" class="login-btn"><i class="fas fa-sign-in-alt"></i> Login</a>
      <?php endif; ?>
    </div>
  </nav>

  <main id="main-content" class="container">