<?php
require_once 'config/database.php';

use CodeIgniter\Model;

class Transaksi
{
    private $conn;

    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
        date_default_timezone_set('Asia/Jakarta');
    }

    public function tampilkanSemuaTransaksi()
    {
        $sql = "
            SELECT 
                t.id_group,
                MIN(t.id_transaksi) AS id_transaksi,
                MIN(t.tanggal) AS tanggal,
                p.nama AS nama_pelanggan,
                GROUP_CONCAT(b.nama ORDER BY t.id_transaksi SEPARATOR ', ') AS nama_barang,
                SUM(t.jumlah) AS total_jumlah,
                SUM(t.total_harga) AS total_harga
            FROM transaksi t
            JOIN barang b ON t.kode_barang = b.kode_barang
            JOIN pelanggan p ON t.id_pelanggan = p.id_pelanggan
            GROUP BY t.id_group
            ORDER BY id_transaksi ASC
        ";

        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function tampilkanTransaksiById($id)
    {
        $sql = "SELECT * FROM transaksi WHERE id_transaksi = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
    public function tambahTransaksi($data)
    {
        $query = "
            INSERT INTO transaksi 
            (kode_barang, id_pelanggan, jumlah, total_harga, tanggal, id_group) 
            VALUES (?, ?, ?, ?, ?, ?)
        ";

        $stmt = $this->conn->prepare($query);
        $dt = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
        $datetime = $dt->format('Y-m-d H:i:s');

        $stmt->bind_param(
            "iiidsi",
            $data['kode_barang'],
            $data['id_pelanggan'],
            $data['jumlah'],
            $data['total_harga'],
            $datetime, 
            $data['id_group']
        );

        return $stmt->execute();
    }
    public function updateTransaksi($id, $data)
    {
        $sql = "
            UPDATE transaksi 
            SET kode_barang=?, jumlah=?, total_harga=?, tanggal=? 
            WHERE id_transaksi=?
        ";

        $stmt = $this->conn->prepare($sql);
        $dt = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
        $datetime = $dt->format('Y-m-d H:i:s');

        $stmt->bind_param(
            "iidsi",
            $data['kode_barang'],
            $data['jumlah'],
            $data['total_harga'],
            $datetime, 
            $id
        );

        $stmt->execute();
    }

    public function hapusTransaksi($id)
    {
        $sql = "SELECT id_group FROM transaksi WHERE id_transaksi = ? LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $res = $stmt->get_result()->fetch_assoc();

        if (!$res) return false;

        $id_group = $res['id_group'];

        if (!is_null($id_group) && $id_group !== "") {
            $sqlDel = "DELETE FROM transaksi WHERE id_group = ?";
            $stmtDel = $this->conn->prepare($sqlDel);
            $stmtDel->bind_param("i", $id_group);
            return $stmtDel->execute();
        }

        $sqlDel = "DELETE FROM transaksi WHERE id_transaksi = ?";
        $stmtDel = $this->conn->prepare($sqlDel);
        $stmtDel->bind_param("i", $id);
        return $stmtDel->execute();
    }
    public function getDetailTransaksi($id_transaksi)
    {
        $sqlMain = "SELECT id_group FROM transaksi WHERE id_transaksi = ? LIMIT 1";
        $stmtMain = $this->conn->prepare($sqlMain);
        $stmtMain->bind_param("i", $id_transaksi);
        $stmtMain->execute();
        $main = $stmtMain->get_result()->fetch_assoc();

        if (!$main) return null;

        $id_group = $main['id_group'];

        $sqlItems = "
            SELECT 
                t.*,
                b.nama AS nama_barang,
                b.harga,
                p.nama AS nama_pelanggan
            FROM transaksi t
            JOIN barang b ON t.kode_barang = b.kode_barang
            JOIN pelanggan p ON p.id_pelanggan = t.id_pelanggan
            WHERE t.id_group = ?
            ORDER BY t.id_transaksi ASC
        ";

        $stmtItems = $this->conn->prepare($sqlItems);
        $stmtItems->bind_param("i", $id_group);
        $stmtItems->execute();
        $items = $stmtItems->get_result()->fetch_all(MYSQLI_ASSOC);

        return [
            'id_group' => $id_group,
            'items' => $items
        ];
    }

    public function countTransaksi()
    {
        $sql = "SELECT COUNT(DISTINCT id_group) AS total FROM transaksi";
        $result = $this->conn->query($sql);
        return $result->fetch_assoc()['total'];
    }
}
?>
