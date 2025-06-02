<?php
session_start();
require_once 'koneksiDb.php';

$error_message = '';

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
            // Login berhasil, set session
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['full_name'] = $user['full_name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['logged_in'] = true;
            
            // Update last login
            $updateQuery = "UPDATE users SET last_login = NOW() WHERE user_id = :user_id";
            $updateStmt = $koneksi->prepare($updateQuery);
            $updateStmt->bindParam(':user_id', $user['user_id']);
            $updateStmt->execute();
            
            // Redirect ke halaman utama
            header('Location: index.php');
            exit();
        } else {
            $error_message = "Username atau password salah!";
        }
    } catch(PDOException $e) {
        $error_message = "Terjadi kesalahan: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Informasi Cianjur</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <style>
    :root {
      --primary-color: #1a5276;
      --secondary-color: #28b463;
      --accent-color: #f39c12;
      --dark-color: #2c3e50;
      --light-color: #f8f9f9;
      --text-color: #333;
      --text-light: #777;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f4f6f8;
      color: var(--text-color);
      line-height: 1.7;
      background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), 
                  url('https://upload.wikimedia.org/wikipedia/commons/2/21/Cianjur_view.jpg') no-repeat center center/cover;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .login-container {
      width: 100%;
      max-width: 500px;
      padding: 20px;
    }

    .login-box {
      background: white;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
      text-align: center;
    }

    .login-box h2 {
      color: var(--primary-color);
      margin-bottom: 30px;
      font-size: 2rem;
    }

    .login-box h2 i {
      margin-right: 10px;
    }

    .error-message {
      color: #e74c3c;
      background: #fadbd8;
      padding: 10px;
      border-radius: 5px;
      margin-bottom: 20px;
      font-size: 0.9rem;
    }

    .input-group {
      margin-bottom: 20px;
      text-align: left;
    }

    .input-group label {
      display: block;
      margin-bottom: 8px;
      font-weight: 500;
      color: var(--dark-color);
    }

    .input-group label i {
      margin-right: 8px;
      color: var(--secondary-color);
    }

    .input-group input {
      width: 100%;
      padding: 12px 15px;
      border: 1px solid #ddd;
      border-radius: 5px;
      font-size: 1rem;
      transition: border 0.3s ease;
    }

    .input-group input:focus {
      border-color: var(--secondary-color);
      outline: none;
    }

    .login-btn {
      width: 100%;
      padding: 12px;
      background-color: var(--secondary-color);
      color: white;
      border: none;
      border-radius: 5px;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      transition: background-color 0.3s ease;
      margin-top: 10px;
    }

    .login-btn:hover {
      background-color: #239b56;
    }

    .register-link {
      margin-top: 20px;
      color: var(--text-light);
      font-size: 0.9rem;
    }

    .register-link a {
      color: var(--primary-color);
      text-decoration: none;
      font-weight: 500;
      transition: color 0.3s ease;
    }

    .register-link a:hover {
      color: var(--accent-color);
      text-decoration: underline;
    }

    .back-btn {
      display: inline-block;
      margin-top: 20px;
      padding: 10px 20px;
      background-color: var(--accent-color);
      color: white;
      text-decoration: none;
      border-radius: 5px;
      font-weight: 500;
      transition: background-color 0.3s ease;
    }

    .back-btn:hover {
      background-color: #e67e22;
    }

    .button-group {
      display: flex;
      flex-direction: column;
      gap: 10px;
      margin-top: 20px;
    }

    @media (max-width: 480px) {
      .login-box {
        padding: 30px 20px;
      }
      
      .login-box h2 {
        font-size: 1.5rem;
      }
    }
  </style>
</head>
<body>
  <div class="login-container">
    <div class="login-box">
      <h2><i class="fas fa-user"></i> Login</h2>
      
      <?php if($error_message): ?>
        <div class="error-message"><?php echo $error_message; ?></div>
      <?php endif; ?>
      
      <form action="login.php" method="POST">
        <div class="input-group">
          <label for="username"><i class="fas fa-user"></i> Username</label>
          <input type="text" id="username" name="username" required>
        </div>
        
        <div class="input-group">
          <label for="password"><i class="fas fa-lock"></i> Password</label>
          <input type="password" id="password" name="password" required>
        </div>
        
        <div class="button-group">
          <button type="submit" class="login-btn">Login</button>
          <a href="index.php" class="back-btn"><i class="fas fa-arrow-left"></i> Kembali ke Beranda</a>
        </div>
      </form>
      
      <div class="register-link">
        Belum punya akun? <a href="register.php">Daftar disini</a>
      </div>
    </div>
  </div>
</body>
</html>