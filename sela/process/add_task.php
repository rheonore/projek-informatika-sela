<?php
session_start();
require_once '../config/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}

$title = $_POST['title'];
$user_id = $_SESSION['user_id'];

$conn->query("INSERT INTO tasks (user_id, title) VALUES ($user_id, '$title')");

header("Location: ../dashboard.php");
exit;
