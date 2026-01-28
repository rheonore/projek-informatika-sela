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

    <form class="auth-form" method="post">
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
