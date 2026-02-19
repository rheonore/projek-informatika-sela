<?php
require '../config/db.php';

$id = $_POST['id'];

$conn->query("
    UPDATE subtasks
    SET is_done = NOT is_done
    WHERE id = $id
");

header("Location: ../dashboard.php");
