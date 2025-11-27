<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Bumi Komputer Pekalongan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            padding: 20px;
            background: linear-gradient(120deg, #0d6efd, #6ea8fe, #5b8cff, #1e90ff);
            background-size: 300% 300%;
            animation: gradientMove 10s ease-in-out infinite;
        }

        @keyframes gradientMove {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* ====== FLOATING BLUR BLOBS ====== */
        .blob {
            position: absolute;
            width: 450px;
            height: 450px;
            background: rgba(255, 255, 255, 0.35);
            filter: blur(120px);
            border-radius: 50%;
            animation: floatBlob 12s infinite alternate ease-in-out;
            z-index: -1;
        }

        .blob2 {
            background: rgba(255, 255, 255, 0.20);
            width: 400px;
            height: 400px;
            animation-duration: 14s;
        }

        @keyframes floatBlob {
            0%   { transform: translate(-80px, -40px); }
            100% { transform: translate(120px, 80px); }
        }

        /* ====== GLASS CARD ====== */
        .glass-card {
            width: 100%;
            max-width: 380px;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-radius: 18px;
            padding: 25px 30px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .glass-card h3 {
            font-weight: 700;
            color: white;
            text-align: center;
            margin-bottom: 5px;
        }

        .glass-card p {
            text-align: center;
            color: #e8e8e8;
            margin-bottom: 25px;
            font-size: 0.9rem;
        }

        .form-label {
            color: #f1f1f1;
            font-weight: 500;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.30);
            color: white;
            border: none;
            border-radius: 10px;
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.8);
        }

        .btn-login {
            background: #ffffff;
            color: #0d6efd;
            font-weight: 600;
            padding: 10px;
            border-radius: 10px;
        }

        footer {
            position: fixed;
            bottom: 10px;
            width: 100%;
            text-align: center;
            color: white;
            font-size: 0.85rem;
            opacity: 0.9;
        }

        footer a {
            color: #ffffff;
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <!-- Floating blur blobs -->
    <div class="blob" style="top: -100px; left: -100px;"></div>
    <div class="blob blob2" style="bottom: -120px; right: -120px;"></div>

    <div class="glass-card">
        <h3>Login</h3>
        <p>Bumi Komputer Pekalongan</p>

        <form method="post" action="index.php?action=prosesLogin" autocomplete="off">
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" placeholder="Masukkan username" class="form-control" required autocomplete="off" />
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" placeholder="Masukkan password" class="form-control" required autocomplete="new-password" />
            </div>

            <button type="submit" class="btn btn-login w-100 mt-2">Login</button>

            <div class="text-center mt-3">
    <span style="color:white;">Belum punya akun?</span>
    <a href="index.php?action=registrasi" style="color:#fff; font-weight:bold;">Daftar</a>
</div>

        </form>
    </div>

    <footer>
        © 2023 Bumi Komputer Pekalongan · 
        <a href="#">Privacy Policy</a> · 
        <a href="#">Terms</a>
    </footer>

</body>
</html>
