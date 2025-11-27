<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

require_once 'config/database.php';
require_once 'app/Controllers/LoginController.php';
require_once 'app/Controllers/ProdukController.php';
require_once 'app/Controllers/PelangganController.php';
require_once 'app/Controllers/TransaksiController.php';
require_once 'app/Controllers/HomeController.php';
require_once 'app/Controllers/LaporanController.php';




$db = (new Database())->getConnection();

$action = isset($_GET['action']) ? $_GET['action'] : 'login';

if (!isset($_SESSION['user'])) {
    if ($action !== 'login' && $action !== 'prosesLogin') {
        header("Location: index.php?action=login");
        exit;
    }
}

switch ($action) {
    case 'login':
        $controller = new LoginController($db);
        $controller->index();
        break;

    case 'prosesLogin':
        $controller = new LoginController($db);
        $controller->prosesLogin();
        break;

        case 'registrasi':
    $controller = new LoginController($db);
    $controller->registrasi();
    break;

case 'prosesRegistrasi':
    $controller = new LoginController($db);
    $controller->prosesRegistrasi();
    break;


    case 'logout':
        $controller = new LoginController($db);
        $controller->logout();
        break;

    case 'produk':
        $controller = new ProdukController();
        $subaction = isset($_GET['subaction']) ? $_GET['subaction'] : 'daftarProduk';

        switch ($subaction) {
            case 'daftarProduk':
                $controller->daftarProduk();
                break;
            case 'tambah':
                $controller->tambah();
                break;
            case 'simpan':
                $controller->simpan();
                break;
            case 'edit':
                $controller->edit();
                break;
            case 'update':
                $controller->update();
                break;
            case 'hapus':
                $controller->hapus();
                break;
            default:
                echo "Aksi produk tidak ditemukan!";
        }
        break;

    case 'pelanggan':
        $controller = new PelangganController();
        $subaction = isset($_GET['subaction']) ? $_GET['subaction'] : 'daftarPelanggan';

        switch ($subaction) {
            case 'daftarPelanggan':
                $controller->daftarPelanggan();
                break;
            case 'tambah':
                $controller->tambah();
                break;
            case 'simpan':
                $controller->simpan();
                break;
            case 'edit':
                $controller->edit();
                break;
            case 'update':
                $controller->update();
                break;
            case 'hapus':
                $controller->hapus();
                break;
            default:
                echo "Aksi pelanggan tidak ditemukan!";
        }
        break;

    case 'transaksi':
        $controller = new TransaksiController();
        $subaction = isset($_GET['subaction']) ? $_GET['subaction'] : 'daftarTransaksi';

        switch ($subaction) {
            case 'daftarTransaksi':
                $controller->daftarTransaksi();
                break;

            case 'tambah':
                $controller->tambah();
                break;

            case 'simpan':
                $controller->simpan();
                break;

            case 'hapus':
                if (isset($_GET['id'])) {
                    $controller->hapus($_GET['id']);
                }
                break;

            default:
                $controller->daftarTransaksi();
                break;
        }
        break;

            case 'detail_transaksi':
                $controller = new TransaksiController();
                $controller->detail();
                break;

            case 'cetak_nota':
            require_once 'app/Controllers/CetakNotaController.php';
            $controller = new CetakNotaController();
            $controller->cetak();
            break;

            case 'laporan':
            $controller = new LaporanController();
            $subaction = isset($_GET['subaction']) ? $_GET['subaction'] : 'index';

            switch ($subaction) {
                case 'index':
                    $controller->index();
                    break;

                case 'filter':
                    $controller->filter();
                    break;

                default:
                    echo "Aksi laporan tidak ditemukan!";
            }
            break;


            case 'dashboard':
                $controller = new HomeController();
                $controller->index();
                break;


            case 'index':
            default:
                $controller = new HomeController();
                $controller->index();
                break;
    
}
