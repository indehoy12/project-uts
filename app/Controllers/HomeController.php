<?php

require_once 'app/Models/Produk.php';
require_once 'app/Models/Pelanggan.php';
require_once 'app/Models/Transaksi.php';

class HomeController {

    public function index() {

        $produkModel = new Produk();
        $pelangganModel = new Pelanggan();
        $transaksiModel = new Transaksi();

        $data['total_produk'] = $produkModel->countProduk();
        $data['total_pelanggan'] = $pelangganModel->countPelanggan();
        $data['total_transaksi'] = $transaksiModel->countTransaksi();

        // kirim data ke view
        include "app/Views/index.php";
    }
}
