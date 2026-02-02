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
    <title>Register – SELA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<div class="auth-container">
    <h1 class="auth-title">Register</h1>
    <p class="auth-subtitle">Buat akun SELA baru</p>

    <?php if ($error): ?>
        <p class="error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <?php if ($success): ?>
        <p class="success"><?= htmlspecialchars($success) ?></p>
    <?php endif; ?>


    <form class="auth-form" method="post" action="process/register_process.php">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Username" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Email" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Password" required>
        </div>

        <div class="form-group">
            <label for="confirm">Konfirmasi Password</label>
            <input type="password" id="confirm" name="confirm" placeholder="Ulangi password" required>
        </div>

        <button type="submit" class="btn btn-primary">Register</button>
    </form>

    <p class="auth-footer">
        Sudah punya akun?
        <a href="login.php">Login</a>
    </p>
</div>

</body>
</html>
