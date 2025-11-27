<?php
require_once 'app/models/Transaksi.php';

class CetakNotaController
{
    public function cetak()
    {
        if (!isset($_GET['id'])) {
            die("ID transaksi tidak ditemukan.");
        }

        $id = (int) $_GET['id'];
        $transaksi = new Transaksi();
        $data = $transaksi->getDetailTransaksi($id);

        if (!$data || empty($data['items'])) {
            die("Data transaksi tidak ditemukan atau tidak ada item.");
        }
        require 'app/views/cetak_nota.php';
    }
}
