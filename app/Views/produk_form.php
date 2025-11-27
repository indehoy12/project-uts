<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= isset($data) ? 'Edit Produk' : 'Tambah Produk'; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(120deg, #cce0ff, #ffffff, #e0f7ff);
            background-size: 300% 300%;
            animation: gradientMove 15s ease-in-out infinite;
            color: #343a40;
            overflow-x: hidden;
            font-family: 'Inter', sans-serif;
            padding: 30px 0;
        }

        @keyframes gradientMove {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }
        .form-card {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            border-radius: 12px;
            background-color: white;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            border: none;
        }

        .btn-simpan {
            background-color: #0d6efd;
            border-color: #0d6efd;
            font-weight: 600;
        }

        .btn-simpan:hover {
            background-color: #0b5ed7;
            border-color: #0b5ed7;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="form-card">
            <h3 class="fw-bold mb-3">
                <i class="bi bi-pencil-square me-2"></i>
                <?= isset($data) ? 'Edit Produk' : 'Tambah Produk'; ?>
            </h3>
            <hr class="mb-4">

            <form method="POST" action="index.php?action=produk&subaction=<?= isset($data) ? 'update' : 'simpan'; ?>">
                <?php if (isset($data)): ?>
                    <input type="hidden" name="id" value="<?= $data['kode_barang']; ?>">
                <?php endif; ?>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Barang</label>
                    <input type="text" name="nama" class="form-control" value="<?= $data['nama'] ?? ''; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Harga (Rp)</label>
                    <input type="number" step="0.01" name="harga" class="form-control" value="<?= $data['harga'] ?? ''; ?>"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Stok</label>
                    <input type="number" name="stok" class="form-control" value="<?= $data['stok'] ?? ''; ?>" required>
                </div>

                <div class="d-flex justify-content-end gap-2 pt-3 mt-4 border-top">
                    <a href="index.php?action=produk" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary btn-simpan">
                        <i class="bi bi-save"></i> Simpan Data
                    </button>
                </div>
            </form>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
