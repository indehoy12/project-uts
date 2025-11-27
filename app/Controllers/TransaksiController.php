<?php
require_once 'app/models/Transaksi.php';
require_once 'config/database.php';
require_once 'app/models/Produk.php';

class TransaksiController
{
    public function daftarTransaksi()
    {
        $transaksi = new Transaksi();
        $data = $transaksi->tampilkanSemuaTransaksi();
        require 'app/views/transaksi_view.php';
    }

    public function tambah()
    {
        $database = new Database();
        $conn = $database->getConnection();

        $barang = [];
        $result = $conn->query("SELECT * FROM barang");
        if ($result && $result->num_rows > 0) {
            $barang = $result->fetch_all(MYSQLI_ASSOC);
        }

        $pelanggan = [];
        $result2 = $conn->query("SELECT * FROM pelanggan");
        if ($result2 && $result2->num_rows > 0) {
            $pelanggan = $result2->fetch_all(MYSQLI_ASSOC);
        }

        require 'app/Views/transaksi_form.php';
    }
    public function simpan()
    {
        $transaksi = new Transaksi();
        $produk = new Produk();

        $id_pelanggan = $_POST['id_pelanggan'];
        $barang_dibeli = $_POST['barang'];

        $database = new Database();
        $conn = $database->getConnection();

        // Ambil harga barang
        $dataBarang = [];
        $result = $conn->query("SELECT kode_barang, harga FROM barang");
        while ($row = $result->fetch_assoc()) {
            $dataBarang[$row['kode_barang']] = $row['harga'];
        }

        // ❗ Buat ID_GROUP hanya sekali
        $sql = $conn->query("SELECT MAX(id_group) AS last FROM transaksi");
        $last = $sql->fetch_assoc()['last'];
        if (!$last)
            $last = 0;
        $id_group_baru = $last + 1;

        // ❗ Sekarang loop barang memakai ID_GROUP yang sama
        foreach ($barang_dibeli as $kode_barang => $jumlah) {

            if ($jumlah > 0 && isset($dataBarang[$kode_barang])) {

                $harga = $dataBarang[$kode_barang];
                $total_harga = $harga * $jumlah;

                $transaksi->tambahTransaksi([
                    'kode_barang' => $kode_barang,
                    'id_pelanggan' => $id_pelanggan,
                    'jumlah' => $jumlah,
                    'total_harga' => $total_harga,
                    'tanggal' => date("Y-m-d"),
                    'id_group' => $id_group_baru       // ⬅ Kirim group
                ]);

                $produk->kurangiStok($kode_barang, $jumlah);
            }
        }

        header('Location: index.php?action=transaksi');
        exit;
    }



    public function edit($id)
    {
        $transaksi = new Transaksi();
        $data = $transaksi->tampilkanTransaksiById($id);
        require 'app/Views/transaksi_form.php';
    }

    public function update($id)
    {
        $transaksi = new Transaksi();
        $transaksi->updateTransaksi($id, $_POST);
        header('Location: index.php?action=transaksi');
    }

    public function hapus($id)
    {
        $transaksi = new Transaksi();
        $transaksi->hapusTransaksi($id);
        header('Location: index.php?action=transaksi');
    }

    public function detail()
    {
        $model = new Transaksi();

        $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
        if ($id <= 0) {
            die("ID transaksi tidak valid.");
        }

        $data = $model->getDetailTransaksi($id);

        if (empty($data) || !isset($data['items']) || count($data['items']) === 0) {
            $message = "Detail transaksi tidak ditemukan.";
            require 'app/views/detail_transaksi.php';
            return;
        }

        require 'app/views/detail_transaksi.php';
    }


}
?>
