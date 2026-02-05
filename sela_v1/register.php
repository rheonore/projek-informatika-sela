<?php
require_once 'config/db.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email    = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm  = $_POST['confirm'];

    // 1. Validasi dasar
    if ($password !== $confirm) {
        $error = "Password dan konfirmasi tidak sama.";
    } else {
        // 2. Cek apakah email sudah dipakai
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $error = "Email sudah terdaftar.";
        } else {
            // 3. Hash password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // 4. Simpan ke database
            $insert = $conn->prepare(
                "INSERT INTO users (username, email, password) VALUES (?, ?, ?)"
            );
            $insert->bind_param("sss", $username, $email, $hashedPassword);

            if ($insert->execute()) {
                $success = "Registrasi berhasil. Silakan login.";
            } else {
                $error = "Terjadi kesalahan saat menyimpan data.";
            }
        }
    }
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SELA - Register</title>
    <!-- CSS REGISTER PUNYA TEMANMU -->
</head>
<body>

<div class="register-container">
    <h1>Register</h1>

    <form method="POST" action="process/register_process.php">
        <div class="input-group">
            <span>👤</span>
            <input type="text" name="username" required>
        </div>

        <div class="input-group">
            <span>✉️</span>
            <input type="email" name="email" required>
        </div>

        <div class="input-group">
            <span>🔒</span>
            <input type="password" name="password" required>
        </div>

        <button class="btn-signup" type="submit">
            Sign Up →
        </button>
    </form>

    <div class="divider">OR</div>

    <button class="btn-login-outline" onclick="location.href='login.php'">
        Log in →
    </button>
</div>

</body>
</html>
