<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login – SELA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<div class="auth-container">
    <h1 class="auth-title">Login</h1>
    <p class="auth-subtitle">Masuk ke akun SELA kamu</p>

    <form class="auth-form" method="post">
        <div class="form-group">
            <label for="email">Email / Username</label>
            <input type="text" id="email" name="email" placeholder="Masukkan email" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Password" required>
        </div>

        <button type="submit" class="btn btn-primary">Login</button>
    </form>

    <p class="auth-footer">
        Belum punya akun?
        <a href="register.php">Daftar</a>
    </p>
</div>

</body>
</html>
