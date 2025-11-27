<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BUMI KOMPUTER</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
        body {
            min-height: 100vh;
            background: linear-gradient(120deg, #cce0ff, #ffffff, #e0f7ff);
            background-size: 300% 300%;
            animation: gradientMove 15s ease-in-out infinite;
            color: #343a40;
            overflow-x: hidden;
            font-family: 'Inter', sans-serif;
        }

        @keyframes gradientMove {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .top-navbar {
            background: #0d6efd !important;
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.25);
            position: sticky;
            top: 0;
            z-index: 3000;
        }

        .navbar-brand, #sidebarToggle {
            color: white !important;
            font-weight: 700;
        }

        .offcanvas {
            background: #f8f9fa;
            border-right: 1px solid #dee2e6;
            width: 250px;
            animation: sidebarFade 0.3s ease;
        }

        @keyframes sidebarFade {
            from { opacity: 0; transform: translateX(-20px); }
            to   { opacity: 1; transform: translateX(0); }
        }

        .offcanvas .nav-link {
            padding: 14px 20px;
            display: flex;
            align-items: center;
            gap: 14px;
            color: #343a40;
            text-decoration: none;
            font-size: 15px;
            transition: 0.25s ease;
            border-left: 3px solid transparent;
        }

        .offcanvas .nav-link:hover,
        .offcanvas .nav-link.active {
            background: #e9ecef;
            color: #0d6efd;
            border-left-color: #0d6efd;
        }

        .content {
            padding: 30px 40px;
            margin-top: 60px;
        }

        /* Dashboard Card */
        .card-dashboard {
            background: #ffffff;
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            transition: 0.25s ease;
            height: 100%;
            opacity: 0;
            animation: fadePop 0.6s ease forwards;
        }

        @keyframes fadePop {
            0% { opacity: 0; transform: scale(0.95); }
            100% { opacity: 1; transform: scale(1); }
        }

        .card-dashboard:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 26px rgba(0, 0, 0, 0.18), 0 0 8px rgba(13, 110, 253, 0.15);
        }

        /* Welcome Alert */
        .custom-alert {
            background: #e6f7ff;
            border: 1px solid #91d5ff;
            border-left: 5px solid #0d6efd;
            border-radius: 12px;
            color: #001529;
            padding: 20px;
        }

        /* Fade-in Title */
        .fade-title {
            opacity: 0;
            animation: fadeDown 0.8s ease forwards;
        }

        @keyframes fadeDown {
            from { opacity: 0; transform: translateY(-12px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* Dashboard Card Stagger */
        .stagger-card:nth-child(1) { animation-delay: 0.2s; }
        .stagger-card:nth-child(2) { animation-delay: 0.4s; }
        .stagger-card:nth-child(3) { animation-delay: 0.6s; }

        /* --- Aksi Cepat Modern (Quick Card) --- */
        .quick-card {
            background: rgba(255, 255, 255, 0.35);
            border-radius: 18px;
            padding: 22px;
            height: 130px;
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.28);
            box-shadow: 0 6px 14px rgba(0,0,0,0.08);
            transition: all 0.35s ease;
            display: flex;
            align-items: center;
            gap: 16px;
            cursor: pointer;
            text-decoration: none;
            color: #333;
        }

        .quick-card:hover {
            transform: translateY(-6px) scale(1.03);
            box-shadow: 0 12px 26px rgba(0,0,0,0.15), 0 0 12px rgba(13,110,253,0.18);
            border-color: rgba(13,110,253,0.4);
        }

        /* Icon Box */
        .quick-icon {
            width: 52px;
            height: 52px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            color: white;
            transition: 0.3s;
        }

        /* Gradient Colors */
        .q-blue   { background: linear-gradient(135deg, #1d8cf8, #3358f4); }
        .q-green  { background: linear-gradient(135deg, #00c851, #007e33); }
        .q-orange { background: linear-gradient(135deg, #ffa726, #fb8c00); }
        .q-purple { background: linear-gradient(135deg, #9c27b0, #6a1b9a); }

        .quick-title {
            font-weight: 700;
            font-size: 1.05rem;
            margin-bottom: 4px;
        }

        .quick-sub {
            opacity: 0.65;
            margin: 0;
            font-size: 0.85rem;
        }
        .quick-section {
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  gap: 20px;
}

.quick-section .col-6,
.quick-section .col-sm-3,
.quick-section .col-lg-2 {
  display: flex;
  justify-content: center;
}
.custom-alert {
  position: relative;
  padding: 20px 26px;
  border-radius: 18px;
  background: rgba(255, 255, 255, 0.15);
  border: 1px solid rgba(255, 255, 255, 0.35);
  backdrop-filter: blur(18px);
  -webkit-backdrop-filter: blur(18px);
  
  color: #1c1c1c;
  font-size: 15px;
  line-height: 1.5;

  display: flex;
  align-items: flex-start;
  gap: 14px;

  box-shadow: 0 8px 28px rgba(0, 0, 0, 0.12);
  animation: slideFade 0.7s ease;

  overflow: hidden;
}

/* ICON – gradient modern */
.custom-alert::before {
  content: "🚀";
  font-size: 22px;
  opacity: 0.9;
}

/* Glow effect halus */
.custom-alert::after {
  content: "";
  position: absolute;
  top: -20px;
  right: -20px;
  width: 90px;
  height: 90px;
  background: linear-gradient(135deg, #0d6efd, #00d1ff);
  opacity: 0.18;
  filter: blur(40px);
  border-radius: 50%;
}

/* Animasi */
@keyframes slideFade {
  from {
    opacity: 0;
    transform: translateY(-10px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Strong text */
.custom-alert b {
  color: #0057e7;
  font-size: 16px;
}
/* ===== Modern Professional Footer ===== */
.footer-modern {
    width: 100%;
    background: rgba(255, 255, 255, 0.35);
    backdrop-filter: blur(16px);
    -webkit-backdrop-filter: blur(16px);
    border-top: 1px solid rgba(0, 0, 0, 0.08);
    padding: 35px 0 22px;
    margin-top: 60px;

    box-shadow: 0 -4px 18px rgba(0,0,0,0.08);
}

.footer-container {
    max-width: 1200px;
    margin: auto;
    padding: 0 25px;
    text-align: center;
}

.footer-brand h5 {
    font-size: 20px;
    margin-bottom: 6px;
    color: #0d6efd;
}

.footer-desc {
    color: #555;
    font-size: 14px;
    margin-bottom: 20px;
}

.footer-links {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 18px;
    margin-bottom: 18px;
}

.footer-links a {
    color: #444;
    text-decoration: none;
    font-size: 15px;
    transition: 0.25s ease;
    font-weight: 500;
}

.footer-links a:hover {
    color: #0d6efd;
    text-decoration: underline;
}

.footer-copy {
    color: #666;
    font-size: 13px;
    margin-top: 10px;
    opacity: 0.8;
}
        /* Animation slide-up */
        .quick-section {
            opacity: 0;
            animation: slideUp 0.8s ease forwards;
            animation-delay: 0.4s;
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(18px); }
            to   { opacity: 1; transform: translateY(0); }
        }
  </style>
</head>

<body>

  <nav class="navbar top-navbar navbar-dark fixed-top">
    <div class="container-fluid">
      <button class="btn btn-link p-0 me-3 d-flex align-items-center" type="button"
        data-bs-toggle="offcanvas" data-bs-target="#sidebarOffcanvas" id="sidebarToggle">
        <i class="bi bi-list fs-4"></i>
      </button>

      <a class="navbar-brand me-auto" href="#">BUMI KOMPUTER</a>
    </div>
  </nav>

  <div class="offcanvas offcanvas-start" tabindex="-1" id="sidebarOffcanvas">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title">BUMI KOMPUTER</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>

    <div class="offcanvas-body p-0">
      <ul class="navbar-nav">
        <li><a href="index.php?action=index" class="nav-link active"><i class="bi bi-house"></i> Dashboard</a></li>
        <li><a href="index.php?action=produk" class="nav-link"><i class="bi bi-box-seam"></i> Sparepart</a></li>
        <li><a href="index.php?action=pelanggan" class="nav-link"><i class="bi bi-people"></i> Customer</a></li>
        <li><a href="index.php?action=transaksi" class="nav-link"><i class="bi bi-receipt"></i> Daftar Penjualan</a></li>
        <li><a href="index.php?action=laporan" class="nav-link"><i class="bi bi-graph-up"></i> Laporan</a></li>
        <li><a href="index.php?action=login&subaction=logout" class="nav-link"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
      </ul>
    </div>
  </div>

  <div id="content" class="content">

    <h3 class="fw-bold mb-4 fade-title">
      <i class="bi bi-speedometer2"></i> Dashboard
    </h3>
    <div class="mt-5 custom-alert">
  <div>
    <b>Selamat datang di Aplikasi Layanan BUMI KOMPUTER.</b><br>
    Kelola sparepart, pelanggan, dan layanan service dengan lebih cepat dan efisien.
  </div>
</div>

    


    <div class="row g-4">
      <div class="col-md-4">
        <div class="card-dashboard">
          <div class="d-flex justify-content-between">
            <div>
              <h5 class="text-secondary">Total Sparepart</h5>
              <h2 class="fw-bold"><?= $data['total_produk'] ?></h2>
            </div>
            <i class="bi bi-box-seam fs-1 text-primary"></i>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card-dashboard">
          <div class="d-flex justify-content-between">
            <div>
              <h5 class="text-secondary">Total Customer</h5>
              <h2 class="fw-bold"><?= $data['total_pelanggan'] ?></h2>
            </div>
            <i class="bi bi-people fs-1 text-success"></i>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card-dashboard stagger-card">
          <div class="d-flex justify-content-between">
            <div>
              <h5 class="text-secondary">Total Penjualan</h5>
              <h2 class="fw-bold"><?= $data['total_transaksi'] ?></h2>
            </div>
            <i class="bi bi-receipt fs-1 text-warning"></i>
          </div>
        </div>
      </div>
    </div>

    <!-- UPDATED AKSI CEPAT -->
    <h4 class="fw-bold mb-3 mt-5 text-secondary">Aksi Cepat</h4>
    <hr class="mb-4">

    <div class="row g-4 mb-5 quick-section">

      <!-- Service Baru -->
      <div class="col-6 col-sm-3 col-lg-2">
        <a href="index.php?action=transaksi&subaction=tambah" class="quick-card">
          <div class="quick-icon q-blue">
            <i class="bi bi-plus-circle-fill"></i>
          </div>
          <div>
            <div class="quick-title">Penjualan Baru</div>
            <p class="quick-sub">Tambah transaksi</p>
          </div>
        </a>
      </div>

      <!-- Stok Baru -->
      <div class="col-6 col-sm-3 col-lg-2">
        <a href="index.php?action=produk&subaction=tambah" class="quick-card">
          <div class="quick-icon q-green">
            <i class="bi bi-box-arrow-in-down"></i>
          </div>
          <div>
            <div class="quick-title">Stok Baru</div>
            <p class="quick-sub">Input sparepart</p>
          </div>
        </a>
      </div>

      <!-- Lihat Stok -->
      <div class="col-6 col-sm-3 col-lg-2">
        <a href="index.php?action=produk" class="quick-card">
          <div class="quick-icon q-orange">
            <i class="bi bi-grid-fill"></i>
          </div>
          <div>
            <div class="quick-title">Lihat Stok</div>
            <p class="quick-sub">Daftar barang</p>
          </div>
        </a>
      </div>

      <!-- Customer List -->
      <div class="col-6 col-sm-3 col-lg-2">
        <a href="index.php?action=pelanggan" class="quick-card">
          <div class="quick-icon q-purple">
            <i class="bi bi-person-lines-fill"></i>
          </div>
          <div>
            <div class="quick-title">Customer List</div>
            <p class="quick-sub">Data pelanggan</p>
          </div>
        </a>
      </div>
    </div>

  </div>
  <footer class="footer-modern mt-5">
    <div class="footer-container">
        <div class="footer-brand">
            <h5 class="fw-bold">BUMI KOMPUTER</h5>
            <p class="footer-desc">Solusi service & sparepart komputer dengan layanan cepat dan terpercaya.</p>
        </div>

        <div class="footer-links">
            <a href="index.php?action=index">Dashboard</a>
            <a href="index.php?action=produk">Sparepart</a>
            <a href="index.php?action=pelanggan">Customer</a>
            <a href="index.php?action=transaksi">Service</a>
        </div>

        <div class="footer-copy">
            © <?= date('Y') ?> BUMI KOMPUTER — All Rights Reserved.
        </div>
    </div>
</footer>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    // Auto close sidebar after clicking a link
    document.querySelectorAll('.offcanvas-body .nav-link').forEach(link => {
        link.addEventListener('click', () => {
            const offcanvasElement = document.getElementById('sidebarOffcanvas');
            const offcanvas = bootstrap.Offcanvas.getInstance(offcanvasElement);
            if (offcanvas) offcanvas.hide();
        });
    });
  </script>

</body>
</html>
