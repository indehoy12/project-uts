<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Pelanggan - BUMI KOMPUTER</title>

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
        }

        @keyframes gradientMove {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .top-navbar {
            background: #0d6efd !important;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            width: 100%;
            height: 60px;
            padding: 12px 20px;
            z-index: 3000;
            display: flex;
            align-items: center;
        }

        .navbar-brand, #sidebarToggle {
            color: white !important;
            font-weight: 700;
        }

        #sidebarToggle {
            font-size: 22px;
            cursor: pointer;
            margin-right: 15px;
            border: none;
            background: none;
        }
        .offcanvas {
            background: #ffffff;
            color: #343a40;
            border-right: 1px solid #dee2e6;
            width: 250px;
            z-index: 3500;
        }

        .offcanvas-header {
            border-bottom: 1px solid #dee2e6;
        }

        .offcanvas-title {
            color: #0d6efd;
            font-weight: 700;
        }
        .offcanvas .nav-link {
            padding: 14px 20px;
            display: flex;
            align-items: center;
            gap: 14px;
            color: #343a40;
            text-decoration: none;
            font-size: 15px;
            transition: 0.2s ease;
        }

        .offcanvas .nav-link:hover,
        .offcanvas .nav-link.active {
            background: #e9ecef;
            color: #0d6efd;
            border-left: 3px solid #0d6efd;
            padding-left: 17px;
        }
        .content {
            padding: 90px 40px 40px;
            color: #343a40; 
            transition: 0.3s ease;
        }

        .page-title {
            font-size: 32px;
            font-weight: 800;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 12px;
            color: #343a40;
            text-shadow: none;
        }

        .table-wrapper {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            padding: 0;
            overflow: hidden;
            margin-top: 20px;
        }

        .table-responsive {
            padding: 20px;
        }

        .table-modern {
            width: 100%;
            margin-bottom: 0;
            color: #343a40;
        }

        .table-modern thead th {
            background: #f8f9fa;
            padding: 14px;
            color: #0d6efd; 
            font-weight: 600;
            border-bottom: 2px solid #dee2e6;
        }

        .table-modern tbody tr {
            transition: background-color 0.2s ease;
        }

        .table-modern tbody tr:hover {
            background-color: #f8f9fa;
        }

        .table-modern td {
            padding: 14px;
            border-top: 1px solid #e9ecef;
            color: #555;
        }
        
        .table-modern tbody tr:last-child td {
            border-bottom: none;
        }

        .btn-add {
            background: #0d6efd;
            color: white !important;
            border-radius: 8px;
            padding: 8px 18px;
            font-weight: 500;
            text-decoration: none;
            display: inline-flex;
            gap: 8px;
            align-items: center;
            transition: background-color 0.2s ease;
        }

        .btn-add:hover {
            background: #0b5ed7;
            color: white;
        }

        .btn-aksi {
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            margin: 0 2px;
            text-decoration: none;
            display: inline-block;
        }

        .btn-edit {
            color: #0d6efd;
            background: rgba(13, 110, 253, 0.1);
        }
        .btn-edit:hover {
            background: rgba(13, 110, 253, 0.2);
            color: #0d6efd;
        }

        .btn-del {
            color: #dc3545;
            background: rgba(220, 53, 69, 0.1);
        }
        .btn-del:hover {
            background: rgba(220, 53, 69, 0.2);
            color: #dc3545;
        }
    </style>
</head>

<body>

    <nav class="navbar top-navbar navbar-dark">
        <div class="container-fluid">
            <button class="btn btn-link p-0 me-3 d-flex align-items-center" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarOffcanvas" aria-controls="sidebarOffcanvas" id="sidebarToggle">
                <i class="bi bi-list fs-4"></i>
            </button>

            <span class="navbar-brand me-auto">BUMI KOMPUTER</span>
        </div>
    </nav>

    <div class="offcanvas offcanvas-start" tabindex="-1" id="sidebarOffcanvas" aria-labelledby="offcanvasLabel">

        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasLabel">BUMI KOMPUTER</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <div class="offcanvas-body p-0">
      <ul class="navbar-nav">
        <li>
            <a href="index.php?action=index" class="nav-link ">
              <i class="bi bi-house-door"></i><span>Dashboard</span>
            </a>
        </li>
        <li>
            <a href="index.php?action=produk" class="nav-link ">
              <i class="bi bi-box-seam"></i><span>Sparepart</span>
            </a>
        </li>
        <li>
            <a href="index.php?action=pelanggan" class="nav-link active">
              <i class="bi bi-people"></i><span>Customer</span>
            </a>
        </li>
        <li>
            <a href="index.php?action=transaksi" class="nav-link">
              <i class="bi bi-receipt"></i><span>Daftar Penjualan</span>
            </a>
        </li>
        <li>
            <a href="index.php?action=laporan" class="nav-link">
              <i class="bi bi-graph-up"></i><span>Laporan</span>
            </a>
        </li>
        <li>
            <a href="index.php?action=login&subaction=logout" class="nav-link">
              <i class="bi bi-box-arrow-right"></i><span>Logout</span>
            </a>
        </li>
      </ul>
    </div>
    </div>


    <main id="content" class="content">

        <div class="page-title">
            <i class="bi bi-people text-primary" style="font-size:34px;"></i>
            Daftar Customer
        </div>

        <a href="index.php?action=pelanggan&subaction=tambah" class="btn-add">
            <i class="bi bi-plus-circle"></i> Tambah Customer
        </a>

        <div class="table-wrapper">
            <div class="table-responsive">

                <table class="table table-modern mb-0">
                    <thead>
                        <tr>
                            <th style="width: 50px;">No</th>
                            <th>Nama Customer</th>
                            <th>Alamat</th>
                            <th style="width: 150px;">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if (!empty($data)): $no=1; foreach($data as $d): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= htmlspecialchars($d['nama']) ?></td>
                            <td><?= htmlspecialchars($d['alamat']) ?></td>
                            <td>
                                <a class="btn-aksi btn-edit"
                                    href="index.php?action=pelanggan&subaction=edit&id=<?= $d['id_pelanggan'] ?>">Edit</a>

                                <a class="btn-aksi btn-del"
                                    onclick="return confirm('Yakin ingin menghapus pelanggan ini?')"
                                    href="index.php?action=pelanggan&subaction=hapus&id=<?= $d['id_pelanggan'] ?>">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; else: ?>
                        <tr>
                            <td colspan="4" class="text-center text-muted">Tidak ada data Customer.</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>

                </table>

            </div>
        </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.querySelectorAll('.offcanvas-body .nav-link').forEach(link => {
            link.addEventListener('click', () => {
                if (window.bootstrap) {
                    const offcanvasElement = document.getElementById('sidebarOffcanvas');
                    const offcanvas = bootstrap.Offcanvas.getInstance(offcanvasElement);
                    if (offcanvas) {
                        offcanvas.hide();
                    }
                }
            });
        });
    </script>

</body>
</html>
