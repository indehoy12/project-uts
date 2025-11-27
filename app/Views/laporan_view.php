<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Laporan Penjualan - BUMI KOMPUTER</title>

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

        .navbar-brand {
            color: white !important;
            font-weight: 700;
        }

        #sidebarToggle {
            color: white !important;
            background: none;
            border: none;
            font-size: 22px;
            cursor: pointer;
        }

        .offcanvas {
            background: #ffffff;
            color: #343a40;
            border-right: 1px solid #dee2e6;
            width: 250px;
        }

        .offcanvas .nav-link {
            padding: 14px 20px;
            display: flex;
            align-items: center;
            gap: 14px;
            font-size: 15px;
            color: #343a40;
        }

        .offcanvas .nav-link:hover {
            background: #e9ecef;
            border-left: 3px solid #0d6efd;
            padding-left: 17px;
            color: #0d6efd;
        }

        .content {
            padding: 90px 40px 40px;
        }

        .page-title {
            font-size: 32px;
            font-weight: 800;
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
        }

        .filter-card {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        }

        .table-wrapper {
            background: white;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            margin-top: 20px;
            overflow: hidden;
        }

        .table-modern thead th {
            background: #f8f9fa;
            padding: 14px;
            color: #0d6efd;
            font-weight: 600;
            border-bottom: 2px solid #dee2e6;
        }

        .table-modern tbody tr:hover {
            background: #f8f9fa;
        }

        .table-modern td {
            padding: 14px;
            border-top: 1px solid #e9ecef;
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
                <li><a class="nav-link" href="index.php?action=index"><i class="bi bi-house-door"></i> Dashboard</a></li>
                <li><a class="nav-link" href="index.php?action=produk"><i class="bi bi-box-seam"></i> Sparepart</a></li>
                <li><a class="nav-link" href="index.php?action=pelanggan"><i class="bi bi-people"></i> Customer</a></li>
                <li><a class="nav-link" href="index.php?action=transaksi"><i class="bi bi-receipt"></i> Daftar Penjualan</a></li>
                <li><a class="nav-link">
                    <i class="bi bi-graph-up"></i> Laporan
                </a></li>
                <li><a class="nav-link" href="index.php?action=login&subaction=logout"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
            </ul>
        </div>
    </div>

    <main class="content">

        <div class="page-title">
            <i class="bi bi-graph-up text-primary" style="font-size:34px;"></i>
            Laporan Penjualan
        </div>
        <div class="filter-card mb-4">
            <form method="POST" action="?action=laporan&subaction=filter" class="row g-3">
                <div class="col-md-4">
                    <label class="form-label fw-semibold">Dari Tanggal</label>
                    <input type="date" name="tgl_awal" class="form-control" required
                        value="<?= $_POST['tgl_awal'] ?? '' ?>">
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">Sampai Tanggal</label>
                    <input type="date" name="tgl_akhir" class="form-control" required
                        value="<?= $_POST['tgl_akhir'] ?? '' ?>">
                </div>

                <div class="col-md-4 d-flex align-items-end">
                    <button type="submit" name="cari" class="btn btn-primary w-100">
                        <i class="bi bi-search"></i> Cari
                    </button>
                </div>
            </form>
        </div>
       <div class="table-wrapper">
    <div class="table-responsive">
        <table class="table table-modern">
            <thead>
               <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Pelanggan</th>
                    <th>Barang</th>
                    <th class="text-center">Jumlah</th>
                    <th class="text-end">Total Harga</th>
                </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php if (!empty($data)): ?>
                            <?php foreach ($data as $row): ?>

                                <?php
                                $tanggal = !empty($row['tanggal'])
                                    ? date("d-m-Y H:i", strtotime($row['tanggal']))
                                    : "-";

                                $pelanggan = $row['nama_pelanggan'] ?? "Umum";
                                $jumlah = $row['total_jumlah'] ?? 0;
                                ?>

                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= htmlspecialchars($tanggal) ?></td>
                                    <td><?= htmlspecialchars($pelanggan) ?></td>
                                    <td><?= htmlspecialchars($row['nama_barang']) ?></td>
                                    <td class="text-center"><?= htmlspecialchars($jumlah) ?></td>
                                    <td class="text-end">Rp <?= number_format($row['total_harga'], 0, ',', '.') ?></td>
                                </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center text-muted">Tidak ada data transaksi.</td>
                    </tr>
                <?php endif; ?>
            </tbody>

        </table>
    </div>
</div>

        <!-- TOTAL -->
        <div class="mt-4 p-3 bg-white rounded shadow-sm">
            <h5 class="fw-bold">
                Total Penjualan:
                <span class="text-success">
                    Rp <?= number_format($total['total'] ?? 0, 0, ',', '.') ?>
                </span>
            </h5>
        </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
