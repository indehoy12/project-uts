<?php

$main = $data['main'] ?? null;
$detailBarang = $data['items'] ?? [];

if (empty($detailBarang)) {
    die("<h3>Data transaksi tidak ditemukan.</h3>");
}

$first = $detailBarang[0];
$totalHarga = 0.0;

foreach ($detailBarang as $it) {
    $harga = (float) ($it['harga'] ?? 0);
    $jumlah = (int) ($it['jumlah'] ?? 0);
    $subtotal = $harga * $jumlah;
    $totalHarga += $subtotal;
}
function formatTanggalLengkap($tgl)
{
    if (!$tgl || $tgl === "0000-00-00 00:00:00") return "–";
    return date("d-m-Y H:i:s", strtotime($tgl));
}

?>

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Transaksi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: #f5f9ff;
            font-family: "Inter", sans-serif;
        }

        .page-title {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 2rem;
            font-weight: 700;
            color: #0d6efd;
            margin-bottom: 20px;
        }

        .page-title i {
            font-size: 2.3rem;
        }

        .card-modern {
            border: none;
            border-radius: 18px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, .06);
        }

        .table-modern th {
            width: 260px;
            background: #f1f5ff;
            border-right: 1px solid #e2e6f0;
            font-weight: 600;
        }

        .item-block {
            background: #f8faff;
            padding: 12px 14px;
            border-radius: 12px;
            margin-bottom: 12px;
            border: 1px solid #e4e8f3;
        }

        .btn-warning {
            border-radius: 8px;
            font-weight: 500;
        }
    </style>
</head>

<body>

    <div class="container py-5">

        <div class="page-title">
            <i class="bi bi-receipt"></i> Detail Transaksi
        </div>

        <a href="index.php?action=transaksi" class="btn btn-warning mb-3">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>

        <div class="card card-modern">
            <div class="card-body p-4">

                <table class="table table-modern table-bordered mb-0">
                    <tr>
                        <th>ID Pelanggan</th>
                        <td><?= htmlspecialchars($first['id_pelanggan']) ?></td>
                    </tr>
                    <tr>
                        <th>Nama Pelanggan</th>
                        <td><?= htmlspecialchars($first['nama_pelanggan']) ?></td>
                    </tr>
                    <tr>
                        <th>Detail Barang</th>
                        <td>
                            <?php foreach ($detailBarang as $b): ?>
                                <div class="item-block">

                                    <strong><?= htmlspecialchars($b['nama_barang']) ?></strong><br>

                                    Harga Satuan:
                                    Rp <?= number_format($b['harga'], 0, ',', '.') ?><br>

                                    Jumlah: <?= $b['jumlah'] ?><br>

                                    Subtotal:
                                    <b>Rp <?= number_format($b['harga'] * $b['jumlah'], 0, ',', '.') ?></b>

                                </div>
                            <?php endforeach; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Total Harga</th>
                        <td><b>Rp <?= number_format($totalHarga, 0, ',', '.') ?></b></td>
                    </tr>
                    <tr>
                        <th>Tanggal Transaksi</th>
                        <td><?= formatTanggalLengkap($first['tanggal']) ?></td>
                    </tr>

                </table>

            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
