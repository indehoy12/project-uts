<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Transaksi - BUMI KOMPUTER</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(120deg, #cce0ff, #ffffff, #e0f7ff);
            background-size: 300% 300%;
            animation: gradientMove 15s ease-in-out infinite;
            color: #343a40;
        }

        @keyframes gradientMove {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .form-wrapper {
            background: #ffffff;
            padding: 25px;
            border-radius: 14px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        }
        .page-title {
            font-weight: 700;
            color: #0d6efd;
        }
        .table-modern thead th {
            background: #f8f9fa;
            padding: 12px;
            color: #0d6efd;
            font-weight: 600;
            border-bottom: 2px solid #dee2e6;
        }

        .table-modern td {
            padding: 12px;
            border-bottom: 1px solid #eaeaea;
        }

        .btn-back {
            background: rgba(255, 193, 7, 0.15);
            color: #ffb300;
            border-radius: 8px;
            font-weight: 500;
        }

        .btn-back:hover {
            background: rgba(255, 193, 7, 0.3);
            color: #d99000;
        }

        .btn-primary {
            border-radius: 8px;
            padding: 8px 18px;
            font-weight: 500;
        }
    </style>
</head>

<body>

    <div class="container py-4">

        <div class="form-wrapper mt-4">

            <h3 class="page-title mb-3">
                <i class="bi bi-plus-circle"></i> Tambah Transaksi
            </h3>

            <a href="index.php?action=transaksi" class="btn btn-back mb-3">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>

            <form method="POST" action="index.php?action=transaksi&subaction=simpan">

                <!-- PILIH PELANGGAN -->
                <div class="mb-3">
                    <label for="id_pelanggan" class="form-label fw-semibold">Pelanggan</label>
                    <select class="form-select" id="id_pelanggan" name="id_pelanggan" required>
                        <option value="">-- Pilih Pelanggan --</option>
                        <?php foreach ($pelanggan as $p): ?>
                            <option value="<?= $p['id_pelanggan']; ?>">
                                <?= htmlspecialchars($p['nama']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- TABEL BARANG -->
                <table class="table table-modern table-bordered mt-3">
                    <thead>
                        <tr>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Jumlah Beli</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($barang as $b): ?>
                            <tr>
                                <td><?= htmlspecialchars($b['nama']); ?></td>
                                <td>Rp <?= number_format($b['harga'], 0, ',', '.'); ?></td>
                                <td><?= $b['stok']; ?></td>
                                <td>
                                    <input type="number" class="form-control"
                                           name="barang[<?= $b['kode_barang']; ?>]"
                                           value="0" min="0" max="<?= $b['stok']; ?>">
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <div class="mt-4 d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-circle"></i> Simpan
                    </button>
                    <button type="reset" class="btn btn-secondary">
                        <i class="bi bi-x-circle"></i> Reset
                    </button>
                </div>

            </form>

        </div>

    </div>

</body>

</html>
