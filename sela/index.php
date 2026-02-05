<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>SELA – Task Tracker Sekolah</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS nanti diurus temanmu -->
    <link rel="stylesheet" href="assets/style.css">
    <link rel="manifest" href="pwa/manifest.json">
    <meta name="theme-color" content="#5b3df5">

</head>


<body>

    <div class="splash-container">
        <div class="app-brand">
            <img src="assets/logo.png" alt="SELA Logo" class="app-logo">
            <h1 class="app-name">SELA</h1>
            <p class="app-tagline">Task Tracker Sekolah</p>
        </div>

        <div class="action-buttons">
            <a href="login.php" class="btn btn-primary">Login</a>
            <a href="register.php" class="btn btn-secondary">Register</a>
        </div>
    </div>

    <script>
if ("serviceWorker" in navigator) {
  navigator.serviceWorker.register("pwa/service-worker.js");
}
</script>

</body>
</html>
