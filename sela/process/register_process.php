<?php
require '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email    = $_POST['email'];
    $password = $_POST['password'];
    $confirm  = $_POST['confirm'];

    if ($password !== $confirm) {
        die("Password tidak sama");
    }

    $check = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        die("Email sudah terdaftar");
    }

    $hashed = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare(
        "INSERT INTO users (username, email, password) VALUES (?, ?, ?)"
    );
    $stmt->bind_param("sss", $username, $email, $hashed);

    if ($stmt->execute()) {
        header("Location: ../login.php");
        exit;
    } else {
        echo "Register gagal";
    }
}
