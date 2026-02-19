<?php
require '../config/db.php';

$id = $_GET['id'];
$conn->query("DELETE FROM subtasks WHERE id = $id");

header("Location: ../dashboard.php");
