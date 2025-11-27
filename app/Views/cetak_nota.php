<?php
$main  = $data['main']  ?? [];
$items = $data['items'] ?? [];

function formatTanggal($tgl) {
    if (!$tgl || $tgl == "0000-00-00 00:00:00") return "–";
    return date("d-m-Y H:i:s", strtotime($tgl));
}

$tanggalTransaksi = $main['tanggal'] 
    ?? ($items[0]['tanggal'] ?? null);

$total = 0;
foreach ($items as $it) {
    $harga    = (float) ($it['harga'] ?? 0);
    $jumlah   = (int)   ($it['jumlah'] ?? 0);
    $subtotal = isset($it['subtotal']) ? (float)$it['subtotal'] : ($harga * $jumlah);
    $total   += $subtotal;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Nota Transaksi</title>

    <style>
        body {
            font-family: "Courier New", monospace;
            background: #f4f4f4;
            padding: 20px;
        }

        .nota-container {
            width: 320px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 8px rgba(0,0,0,0.2);
            margin: auto;
            padding: 20px;
        }

        .header {
            text-align: center;
            border-bottom: 1px dashed #999;
            padding-bottom: 10px;
            margin-bottom: 10px;
        }

        .header h2 {
            margin: 0;
            font-size: 20px;
            font-weight: bold;
        }

        .info-table td {
            padding: 4px 0;
            font-size: 14px;
        }

        .line {
            border-bottom: 1px dashed #999;
            margin: 12px 0;
        }

        .item-table {
            width: 100%;
            font-size: 14px;
        }

        .item-table th,
        .item-table td {
            padding: 4px 0;
        }

        .item-table th {
            text-align: left;
            border-bottom: 1px dashed #999;
        }

        .total-box {
            text-align: right;
            font-size: 16px;
            font-weight: bold;
            margin-top: 15px;
        }

        .footer {
            text-align: center;
            margin-top: 15px;
            font-size: 13px;
            color: #555;
            border-top: 1px dashed #999;
            padding-top: 10px;
        }

        .btn {
            display: block;
            width: 180px;
            margin: 15px auto 0;
            padding: 10px 0;
            text-align: center;
            border-radius: 6px;
            font-size: 15px;
            text-decoration: none;
            cursor: pointer;
        }

        .print-btn {
            background: #0d6efd;
            color: white;
        }

        .back-btn {
            background: #6c757d;
            color: white;
        }

        @media print {
            body {
                background: white;
                padding: 0;
            }
            .btn {
                display: none;
            }
            .nota-container {
                box-shadow: none;
                margin: 0;
            }
        }
    </style>
</head>

<body>

<div class="nota-container">

    <div class="header">
        <h2>BUMI KOMPUTER</h2>
        <small>
            Jl. Contoh Alamat No. 123<br>
            Telp: 0812-3456-7890
        </small>
    </div>

    <table class="info-table">
        <tr>
            <td>Tanggal</td>
            <td>: <?= formatTanggal($tanggalTransaksi) ?></td>
        </tr>
        <tr>
            <td>Pelanggan</td>
            <td>: <?= htmlentities($items[0]['nama_pelanggan'] ?? 'UMUM') ?></td>
        </tr>
    </table>

    <div class="line"></div>

    <table class="item-table">
        <tr>
            <th>Barang</th>
            <th style="text-align:right;">Subtotal</th>
        </tr>

        <?php foreach ($items as $it): ?>
        <?php
            $harga    = (float)($it['harga'] ?? 0);
            $jumlah   = (int)($it['jumlah'] ?? 0);
            $subtotal = $harga * $jumlah;
        ?>
        <tr>
            <td>
                <?= htmlentities($it['nama_barang'] ?? '—') ?><br>
                Qty: <?= $jumlah ?> × Rp <?= number_format($harga, 0, ',', '.') ?>
            </td>
            <td style="text-align:right;">
                Rp <?= number_format($subtotal, 0, ',', '.') ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <div class="line"></div>

    <div class="total-box">
        TOTAL : Rp <?= number_format($total, 0, ',', '.') ?>
    </div>

    <div class="footer">
        Terima kasih telah menggunakan layanan kami!<br>
        *Barang yang sudah diperbaiki tidak dapat dikembalikan*
    </div>

</div>

<a class="btn print-btn" onclick="window.print()">Print Nota</a>
<a class="btn back-btn" href="index.php?action=transaksi">Kembali</a>

</body>
</html>
