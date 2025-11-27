<?php
require_once "app/Models/User.php";
class LoginController
{
    private $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function index()
    {
        require "app/Views/login_view.php";
    }

    public function prosesLogin()
    {
        session_start();
        $user = new User($this->db);

        $username = $_POST['username'];
        $password = $_POST['password'];

        $data = $user->login($username, $password);

        if ($data) {
            $_SESSION['user'] = $data;
            header("Location: index.php?action=index");
            exit;
        } else {
            echo "<script>
                alert('Username atau password salah!');
                window.location='index.php?action=login';
            </script>";
        }
    }

    public function registrasi()
{
    require "app/Views/register_view.php";
}

public function prosesRegistrasi()
{
    $user = new User($this->db);

    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($user->register($username, $password)) {
        echo "<script>
            alert('Registrasi berhasil! Silakan login.');
            window.location='index.php?action=login';
        </script>";
    } else {
        echo "<script>
            alert('Registrasi gagal, username mungkin sudah digunakan!');
            window.location='index.php?action=login';
        </script>";
    }
}


    public function logout()
    {
        session_start();
        session_destroy();

       header("Location: index.php?action=login");
exit;
    }
}
?>
