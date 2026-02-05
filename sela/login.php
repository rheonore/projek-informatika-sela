<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login – SELA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=""stylesheet" href=""assets/css/style.css>
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>

        <form method="POST" action="process/login_process.php">
            <div class="input-group">
                <span>👤</span> <input type="text" placeholder="Enter username or email" required>
            </div>

            <div class="input-group">
                <span>🔒</span>
                <input type="password" placeholder="Enter password" required>
            </div>

            <button type="submit" class="btn-login" onclick="window.location.href='ceklist.html'">
                Log In <span class="arrow">→</span>
            </button>
        </form>

        <div class="divider">OR</div>

        <button class="btn-signup"onclick="window.location.href='register.html'" >
            Sign Up <span class="arrow">→</span>
        </button>
    </div>
</body>
</html>
