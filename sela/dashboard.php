<?php
require 'config/db.php';

$tasks = $conn->query("SELECT * FROM tasks ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Task Dashboard</title>
    <style>
        .done {
            text-decoration: line-through;
            color: gray;
        }
    </style>
</head>
<body>

<h2>Tambah Task Utama</h2>
<form action="process/add_task.php" method="POST">
    <input type="text" name="title" required>
    <button type="submit">Tambah</button>
</form>

<hr>

<?php while ($task = $tasks->fetch_assoc()): ?>
    <h3><?= htmlspecialchars($task['title']) ?></h3>

    <form action="process/add_subtask.php" method="POST">
        <input type="hidden" name="task_id" value="<?= $task['id'] ?>">
        <input type="text" name="title" required>
        <button type="submit">Tambah Subtask</button>
    </form>

    <ul>
        <?php
        $subs = $conn->query("SELECT * FROM subtasks WHERE task_id = {$task['id']}");
        while ($sub = $subs->fetch_assoc()):
        ?>
            <li>
                <form action="process/toggle_subtask.php" method="POST" style="display:inline">
                    <input type="hidden" name="id" value="<?= $sub['id'] ?>">
                    <button type="submit">✔</button>
                </form>

                <span class="<?= $sub['is_done'] ? 'done' : '' ?>">
                    <?= htmlspecialchars($sub['title']) ?>
                </span>

                <a href="process/delete_subtask.php?id=<?= $sub['id'] ?>">❌</a>
            </li>
        <?php endwhile; ?>
    </ul>

    <a href="process/delete_task.php?id=<?= $task['id'] ?>">🗑 Hapus Task</a>
    <hr>
<?php endwhile; ?>

</body>
</html>
