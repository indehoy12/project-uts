<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registrasi - Bumi Komputer Pekalongan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex justify-content-center align-items-center" style="min-height:100vh; background:#0d6efd;">

<div class="glass-card" style="width:350px;background:rgba(255,255,255,0.2);padding:25px;border-radius:15px;">
    <h3 class="text-center text-white">Registrasi</h3>
    <p class="text-center text-white-50">Buat akun baru</p>

    <form method="post" action="index.php?action=prosesRegistrasi">
        <div class="mb-3">
            <label class="form-label text-white">Username</label>
            <input type="text" name="username" class="form-control" required autocomplete="off" />
        </div>

        <div class="mb-3">
            <label class="form-label text-white">Password</label>
            <input type="password" name="password" class="form-control" required autocomplete="new-password" />
        </div>

        <button class="btn btn-light w-100">Daftar</button>
        <a href="index.php?action=login" class="btn btn-outline-light w-100 mt-2">Kembali ke Login</a>
    </form>
</div>

</body>
</html>
