<?php
require_once 'app/Models/Laporan.php';

class LaporanController {

    public function index() {
        $laporan = new Laporan();
        $data = $laporan->getAllLaporan() ?? [];
        $total = $laporan->getTotalPenjualanAll() ?? ['total' => 0];

        include 'app/Views/laporan_view.php';
    }

    public function filter() {
        if (isset($_POST['cari'])) {

            $tgl_awal = htmlspecialchars($_POST['tgl_awal']);
            $tgl_akhir = htmlspecialchars($_POST['tgl_akhir']);

            $laporan = new Laporan();
            $data = $laporan->getLaporanByTanggal($tgl_awal, $tgl_akhir) ?? [];
            $total = $laporan->getTotalPenjualan($tgl_awal, $tgl_akhir) ?? ['total' => 0];

            include 'app/Views/laporan_view.php';
        }
    }
}
?>
