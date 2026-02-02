<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard – SELA</title>
</head>
<body>

<h1>Halo, <?= htmlspecialchars($_SESSION['username']) ?> 👋</h1>

<p>Ini dashboard dummy.</p>

<ul>
    <li>📘 Fisika – Pesawat Sederhana</li>
    <li>📗 Matematika – Distribusi Normal</li>
</ul>

<a href="logout.php">Logout</a>

</body>
</html>
