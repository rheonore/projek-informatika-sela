<?php
require '../config/db.php';

$title = $_POST['title'];
$task_id = $_POST['task_id'];

$stmt = $conn->prepare(
    "INSERT INTO subtasks (task_id, title) VALUES (?, ?)"
);
$stmt->bind_param("is", $task_id, $title);
$stmt->execute();

header("Location: ../dashboard.php");
