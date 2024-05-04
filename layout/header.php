
<nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">MUSABA</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php">Home</a>
        </li>
        <?php  if($_SESSION['level'] == 1 or $_SESSION['level'] == 3): ?>
        <li class="nav-item">
          <a class="nav-link" href="index.php?p=databarang">Data Barang</a>
        </li>
        <?php endif; ?>
        <?php  if($_SESSION['level'] == 1 or $_SESSION['level'] == 2): ?>
        <li class="nav-item">
          <a class="nav-link" href="index.php?p=datasiswa">Data Siswa</a>
        </li>
          <?php endif; ?>
          <?php  if($_SESSION['level'] == 1): ?>
        <li class="nav-item">
          <a class="nav-link" href="index.php?p=akunmodal">Data Akun</a>
        </li>
        <?php endif; ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Layanan BLUD
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Sewa Gedung</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Sewa Lapangan</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Jasa Bengkel Motor</a></li>
          </ul>
        </li>

    </div>
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
    
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fa-solid fa-user me-2"></i> Hai. <?php echo $_SESSION['nama']; ?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Profil</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="logout.php" onclick = "return confirm('Yakin Ingin Keluar')">Keluar</a></li>
            
          </ul>
        </li>
</ul>
  </div>
  
</nav>
