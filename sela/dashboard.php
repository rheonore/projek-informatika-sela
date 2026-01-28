<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard – SELA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<header class="app-header">
    <h1 class="app-title">SELA</h1>
    <a href="#" class="logout-btn">Logout</a>
</header>

<main class="dashboard-container">

    <section class="task-list">

        <div class="task-card">
            <div class="task-header">
                <h2 class="task-title">Fisika</h2>
                <button class="add-subtask-btn">+</button>
            </div>

            <ul class="subtask-list">
                <li class="subtask-item">
                    <input type="checkbox">
                    <span>Projek pesawat sederhana</span>
                </li>
                <li class="subtask-item">
                    <input type="checkbox">
                    <span>Laporan praktikum</span>
                </li>
            </ul>
        </div>

        <div class="task-card">
            <div class="task-header">
                <h2 class="task-title">Matematika</h2>
                <button class="add-subtask-btn">+</button>
            </div>

            <ul class="subtask-list">
                <li class="subtask-item">
                    <input type="checkbox">
                    <span>Latihan integral</span>
                </li>
            </ul>
        </div>

    </section>

    <button class="add-task-btn">+ Tambah Tugas</button>

</main>

</body>
</html>
