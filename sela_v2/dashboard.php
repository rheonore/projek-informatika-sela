<?php
session_start();
require_once 'config/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$tasks = $conn->query("SELECT * FROM tasks WHERE user_id=$user_id");
?>
<!DOCTYPE html>
<html lang="id">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SELA</title>
    <link rel="stylesheet" href="assets/css/dashboard.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@400;700&display=swap" rel="stylesheet">

    </head>
<body>
<div class="phone-screen">
<header class="header">
    <div class="logo-area">
        <img src="assets/curut.png" class="logo-img">
        <span class="brand-name">SELA</span>
    </div>
    <a href="logout.php">🚪</a>
</header>

<?php while ($task = $tasks->fetch_assoc()): ?>
<div class="todo-section">
    <h2 class="section-title"><?= htmlspecialchars($task['title']) ?></h2>

    <?php
    $subs = $conn->query("SELECT * FROM subtasks WHERE task_id={$task['id']}");
    while ($sub = $subs->fetch_assoc()):
    ?>
    <div class="todo-item <?= $sub['is_done'] ? 'completed' : '' ?>">
        <div class="checkbox"
            onclick="toggleSubtask(<?= $sub['id'] ?>, this)">
        </div>
        <span class="todo-text"><?= htmlspecialchars($sub['title']) ?></span>

        <a href="process/delete_subtask.php?id=<?= $sub['id'] ?>">🗑️</a>
    </div>
    <?php endwhile; ?>

    <div class="add-list-btn" onclick="showSubtaskForm(<?= $task['id'] ?>)">
        + Add list
    </div>

    <form action="process/add_subtask.php" method="POST"
        id="subtask-form-<?= $task['id'] ?>"
        class="add-form"
        style="display:none; margin-left:39px;">
    <input type="hidden" name="task_id" value="<?= $task['id'] ?>">
    <input type="text" name="title" placeholder="Subtask baru..." required>
    <button type="submit">Add</button>
    </form>
    <hr>
</div>
<?php endwhile; ?>

<div class="fab" onclick="showTaskForm()">+</div>

<form action="process/add_task.php" method="POST"
    id="task-form"
    class="add-form"
    style="display:none; margin:15px;">
    <div class="checkbox"></div>
    <input type="text" name="title" placeholder="Task baru..." required>
    <button type="submit">Add</button>
</form>

<script>
function showSubtaskForm(taskId) {
    const form = document.getElementById('subtask-form-' + taskId);
    form.style.display = 'block';
    form.querySelector('input[type=text]').focus();
}

function showTaskForm() {
    const form = document.getElementById('task-form');
    form.style.display = 'block';
    form.querySelector('input').focus();
}

function toggleSubtask(id, el) {
    fetch('process/toggle_subtask.php?id=' + id)
        .then(() => el.parentElement.classList.toggle('completed'));
}
</script>

</body>
</html>
