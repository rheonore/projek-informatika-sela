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
    <style>
        :root {
            --primary-purple: #6B52A1;
            --bg-light: #F3EAFB;
            --text-dark: #333;
            --text-gray: #AAA;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Inter', sans-serif; }

        body {
            background-color: #e0e0e0;
            display: flex;
            justify-content: center;
            min-height: 100vh;
        }

        .phone-screen {
            width: 100%;
            max-width: 412px;
            background: var(--bg-light);
            position: relative;
            min-height: 100vh;
            padding: 20px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }

        /* Header */
        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 40px;
        }
        .logo-area { display: flex; align-items: center; gap: 10px; }
        .logo-img { width: 45px; height: 45px; border-radius: 50%; background: #ddd; }
        .brand-name { font-size: 28px; font-weight: 800; }

        /* Todo Item Styling */
        .section-title {
            font-family: 'Crimson Pro', serif;
            font-size: 28px;
            margin-bottom: 15px;
            color: #444;
        }

        .todo-item {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 15px;
            cursor: pointer;
            transition: 0.2s;
        }

        /* Checkbox Custom */
        .checkbox {
            width: 24px;
            height: 24px;
            border: 2px solid var(--primary-purple);
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            background: white;
            transition: all 0.2s ease;
        }

        /* State saat dicentang */
        .todo-item.completed .checkbox {
            background-color: var(--primary-purple);
        }

        .todo-item.completed .checkbox::after {
            content: '✓';
            color: white;
            font-size: 16px;
            font-weight: bold;
        }

        .todo-text {
            font-size: 16px;
            color: var(--text-dark);
            transition: 0.2s;
        }

        /* Style teks saat selesai */
        .todo-item.completed .todo-text {
            text-decoration: line-through;
            color: var(--text-gray);
        }

        hr { border: 0; border-top: 1px solid #DDD; margin: 20px 0; }

        .add-list-btn {
            color: var(--text-dark);
            font-size: 14px;
            margin-left: 39px;
            cursor: pointer;
            opacity: 0.7;
        }

        /* Floating Button */
        .fab {
            position: fixed;
            bottom: 30px;
            right: calc(50% - 180px); /* Menyesuaikan posisi di layar lebar */
            width: 65px;
            height: 65px;
            background-color: var(--primary-purple);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 40px;
            box-shadow: 0 8px 15px rgba(107, 82, 161, 0.4);
        }
        @media (max-width: 412px) { .fab { right: 20px; } }

    </style>
    </head>
<body>

<div class="phone-screen">
<header class="header">
    <div class="logo-area">
        <img src="logo.png" class="logo-img">
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

    <a class="add-list-btn" href="add_subtask_form.php?task_id=<?= $task['id'] ?>">
        + Add list
    </a>
    <hr>
</div>
<?php endwhile; ?>

<div class="fab">+</div>
</div>

<script>
function toggleSubtask(id, el) {
    fetch('process/toggle_subtask.php?id=' + id)
        .then(() => el.parentElement.classList.toggle('completed'));
}
</script>

</body>
</html>
