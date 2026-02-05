<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SELA - Login</title>
    <!-- CSS PUNYA TEMANMU (TIDAK DIUBAH) -->
    <!-- (paste style login.html di sini) -->
    <style>
        :root {
            /* Ungu muda untuk latar belakang keseluruhan */
    --bg-light: #F3EAFB; 
    /* Ungu transparan untuk kartu (Glassmorphism) */
    --glass-bg: rgba(230, 210, 250, 0.4); 
    /* Ungu tua untuk tombol utama */
    --button-purple: #8B3371;
    /* Putih bersih untuk input */
    --input-bg: #FFFFFF;
    /* Warna teks */
    --text-dark: #333333;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background-color: var(--bg-light); /* Menggunakan warna ungu muda */
    /* Atau jika ingin gradasi halus: */
    /* background: linear-gradient(180deg, #F3EAFB 0%, #E5D1FA 100%); */
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
        }

        /* Container utama seperti layar Android */
        .login-container {
            width: 100%;
            max-width: 380px;
            background: var(--glass-bg);
            backdrop-filter: blur(15px); /* Efek blur di belakang kartu */
            -webkit-backdrop-filter: blur(15px);
            padding: 40px 25px;
            border-radius: 30px;
            box-shadow: 0 10px 32px rgba(0, 0, 0, 0.1);
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        h1 {
            font-family: 'Crimson Pro', serif;
            font-size: 56px; /* Ukuran besar sesuai desain */
            color: #333;
            margin-bottom: 40px;
        }

        /* Grouping input dengan ikon */
        .input-group {
            background: var(--input-bg);
            border-radius: 15px;
            display: flex;
            align-items: center;
            padding: 12px 18px;
            margin-bottom: 15px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }

        .input-group img, .input-group i {
            width: 20px;
            margin-right: 12px;
            opacity: 0.6;
        }

        .input-group input {
            border: none;
            outline: none;
            width: 100%;
            font-size: 15px;
            color: #666;
        }

        /* Tombol Login Utama */
        .btn-login {
            background-color: var(--button-purple);
            color: white;
            border: none;
            width: 100%;
            padding: 16px;
            border-radius: 15px;
            font-size: 18px;
            font-weight: 600;
            margin-top: 10px;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            transition: transform 0.2s;
        }

        .btn-login:active {
            transform: scale(0.98);
        }

        /* Garis pemisah OR */
        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 25px 0;
            color: #333;
            font-weight: bold;
            font-size: 14px;
        }

        .divider::before, .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1.5px solid #333;
        }

        .divider:not(:empty)::before { margin-right: 15px; }
        .divider:not(:empty)::after { margin-left: 15px; }

        /* Tombol Sign Up (Outline) */
        .btn-signup {
            background: transparent;
            color: var(--button-purple);
            border: 2px solid var(--button-purple);
            width: 100%;
            padding: 14px;
            border-radius: 15px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            transition: 0.3s;
        }

        .btn-signup:hover {
            background: rgba(139, 51, 113, 0.1);
        }

        /* Ikon panah sederhana */
        .arrow {
            font-size: 20px;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h1>Login</h1>

    <form method="POST" action="process/login_process.php">
        <div class="input-group">
            <span>👤</span>
            <input type="text" name="email" placeholder="Enter username or email" required>
        </div>

        <div class="input-group">
            <span>🔒</span>
            <input type="password" name="password" placeholder="Enter password" required>
        </div>

        <button type="submit" class="btn-login">
            Log In →
        </button>
    </form>

    <div class="divider">OR</div>

    <button class="btn-signup" onclick="location.href='register.php'">
        Sign Up →
    </button>
</div>

</body>
</html>
