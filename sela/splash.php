<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SELA - Splash Screen</title>
    <style>
        :root {
            --bg-purple: #B647B2; /* Warna ungu utama dari gambar splash */
            --bg-accent: #8E44AD;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            /* Membuat pola abstrak menggunakan radial gradient sebagai pengganti gambar bg */
            background: radial-gradient(circle at 20% 30%, #C85CC5 0%, transparent 40%),
                        radial-gradient(circle at 80% 70%, #9B3998 0%, transparent 40%),
                        var(--bg-purple);
            overflow: hidden;
            cursor: pointer;
        }

        /* Container Logo */
        .splash-container {
            text-align: center;
            animation: fadeInScale 1.2s ease-out;
        }

.logo-circle {
    width: 200px;  /* Sesuaikan ukuran lingkaran */
    height: 200px;
    background-color: #5D69BE; /* Warna biru sesuai gambar splash */
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden; /* Memastikan gambar tetap di dalam lingkaran */
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
    margin: 0 auto;
}

.logo-circle img {
    width: 100%;
    height: 100%;
    object-fit: contain; /* Menggunakan 'contain' agar gambar kucing tidak terpotong */
    display: block;
}

        .logo-circle img {
            width: 90%;
            height: auto;
            /* Jika belum ada file gambarnya, gunakan emoji sebagai placeholder sementara */
        }

        /* Animasi masuk */
        @keyframes fadeInScale {
            0% {
                opacity: 0;
                transform: scale(0.8);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        /* Teks instruksi kecil di bawah */
        .footer-text {
            position: absolute;
            bottom: 40px;
            color: white;
            font-family: 'Arial', sans-serif;
            font-size: 14px;
            opacity: 0.7;
            letter-spacing: 1px;
        }
    </style>
    <link rel="manifest" href="/sela/pwa/manifest.json">
    <meta name="theme-color" content="#5b3df5">
</head>

<body>

<div class="splash-container" onclick="location.href='login.php'">
    <div class="logo-circle">
        <img src="assets/curut.png" alt="Sela Cat Logo">
    </div>
</div>

    <div class="footer-text">Tap to Continue</div>

    <!-- <script>
        // Otomatis pindah ke halaman login setelah 3 detik
        setTimeout(() => {
            window.location.href = 'login.php';
        }, 3000); -->
    </script>
    <script>
        window.addEventListener("beforeinstallprompt", (e) => {
        e.preventDefault();
        });
    </script>

</body>
</html>