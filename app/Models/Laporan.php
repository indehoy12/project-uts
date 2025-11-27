<?php
require_once 'config/database.php';

class Laporan {

    private $db;

    public function __construct() {
        $this->db = (new Database())->getConnection();
        date_default_timezone_set('Asia/Jakarta');
    }
    public function getAllLaporan() {
        $sql = "
            SELECT 
                t.id_group,
                MIN(t.id_transaksi) AS id_transaksi_awal,
                MIN(t.tanggal) AS tanggal,
                p.nama AS nama_pelanggan,
                GROUP_CONCAT(CONCAT(b.nama, ' (', t.jumlah, ')') ORDER BY t.id_transaksi SEPARATOR ', ') AS nama_barang,
                SUM(t.jumlah) AS total_jumlah,
                SUM(t.total_harga) AS total_harga
            FROM transaksi t
            JOIN barang b ON t.kode_barang = b.kode_barang
            JOIN pelanggan p ON t.id_pelanggan = p.id_pelanggan
            GROUP BY t.id_group
            ORDER BY id_transaksi_awal ASC
        ";

        $query = $this->db->query($sql);
        $data = [];

        while ($row = $query->fetch_assoc()) {
            $row['tanggal'] = date("Y-m-d H:i:s", strtotime($row['tanggal']));
            $data[] = $row;
        }

        return $data;
    }

    public function getLaporanByTanggal($tgl_awal, $tgl_akhir) {

        $sql = "
            SELECT 
                t.id_group,
                MIN(t.id_transaksi) AS id_transaksi_awal,
                MIN(t.tanggal) AS tanggal,
                p.nama AS nama_pelanggan,
                GROUP_CONCAT(CONCAT(b.nama, ' (', t.jumlah, ')') ORDER BY t.id_transaksi SEPARATOR ', ') AS nama_barang,
                SUM(t.jumlah) AS total_jumlah,
                SUM(t.total_harga) AS total_harga
            FROM transaksi t
            JOIN barang b ON t.kode_barang = b.kode_barang
            JOIN pelanggan p ON t.id_pelanggan = p.id_pelanggan
            WHERE DATE(t.tanggal) BETWEEN '$tgl_awal' AND '$tgl_akhir'
            GROUP BY t.id_group
            ORDER BY id_transaksi_awal ASC
        ";

        $query = $this->db->query($sql);
        $data = [];

        while ($row = $query->fetch_assoc()) {
            $row['tanggal'] = date("Y-m-d H:i:s", strtotime($row['tanggal']));
            $data[] = $row;
        }

        return $data;
    }

    public function getTotalPenjualan($tgl_awal, $tgl_akhir) {

        $sql = "
            SELECT SUM(total_harga) AS total
            FROM (
                SELECT SUM(total_harga) AS total_harga
                FROM transaksi
                WHERE DATE(tanggal) BETWEEN '$tgl_awal' AND '$tgl_akhir'
                GROUP BY id_group
            ) AS x
        ";

        return $this->db->query($sql)->fetch_assoc();
    }

    public function getTotalPenjualanAll() {

        $sql = "
            SELECT SUM(total_harga) AS total
            FROM (
                SELECT SUM(total_harga) AS total_harga
                FROM transaksi
                GROUP BY id_group
            ) AS x
        ";

        return $this->db->query($sql)->fetch_assoc();
    }

}
?>
