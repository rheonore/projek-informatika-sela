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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>

<div class="login-container">
    <h1>Login</h1>

    <form method="POST" action="process/login_process.php">
        <div class="input-group">
            <span>👤</span>
            <input type="text" name="email" placeholder="Masukkan username atau email" required>
        </div>

        <div class="input-group">
            <span>🔒</span>
            <input type="password" name="password" placeholder="Masukkan password" required>
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
