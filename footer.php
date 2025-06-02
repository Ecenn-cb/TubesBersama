  </main>

  <footer>
    <div class="footer-container">
      <div class="footer-section">
        <h4>Tentang Kami</h4>
        <p>Informasi Cianjur adalah portal informasi terupdate seputar Kabupaten Cianjur, Jawa Barat.</p>
        <div class="social-icons">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-youtube"></i></a>
        </div>
      </div>

      <div class="footer-section">
        <h4>Link Cepat</h4>
        <ul>
          <li><a href="index.php">Beranda</a></li>
          <li><a href="sejarah.php">Sejarah</a></li>
          <li><a href="kuliner.php">Kuliner</a></li>
          <li><a href="wisata.php">Wisata</a></li>
          <li><a href="about.php">Tentang Kami</a></li>
        </ul>
      </div>

      <div class="footer-section">
        <h4>Kontak Kami</h4>
        <ul>
          <li><i class="fas fa-map-marker-alt"></i> Jl. Siliwangi No. 123, Cianjur</li>
          <li><i class="fas fa-phone"></i> (0263) 123456</li>
          <li><i class="fas fa-envelope"></i> info@cianjur.web.id</li>
        </ul>
      </div>
    </div>

    <div class="copyright">
      <p>&copy; <?php echo date('Y'); ?> Informasi Cianjur. Semua Hak Dilindungi.</p>
    </div>
  </footer>

  <script>
    // Simple JavaScript for dropdown functionality
    document.addEventListener('DOMContentLoaded', function() {
      const dropdowns = document.querySelectorAll('.user-dropdown');
      
      dropdowns.forEach(dropdown => {
        dropdown.addEventListener('click', function(e) {
          const content = this.querySelector('.dropdown-content');
          content.style.display = content.style.display === 'block' ? 'none' : 'block';
        });
      });
      
      // Close dropdown when clicking outside
      document.addEventListener('click', function(e) {
        if (!e.target.closest('.user-dropdown')) {
          document.querySelectorAll('.dropdown-content').forEach(content => {
            content.style.display = 'none';
          });
        }
      });
    });
  </script>
</body>
</html>