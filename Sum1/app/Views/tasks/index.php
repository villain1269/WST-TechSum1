<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Tasks</title>
    <style>
        body { font-family: system-ui, sans-serif; max-width: 900px; margin: 40px auto; padding: 0 20px; }
        nav { margin-bottom: 24px; border-bottom: 1px solid #ddd; padding-bottom: 12px; }
        nav a { margin-right: 16px; text-decoration: none; color: #0a58ca; }
        table { width: 100%; border-collapse: collapse; }
        th, td { text-align: left; padding: 10px; border-bottom: 1px solid #eee; }
        th { background: #f5f5f5; }
        .status { font-size: 12px; padding: 2px 8px; border-radius: 10px; color: #fff; }
        .done { background: #198754; }
        .pending { background: #fd7e14; }
    </style>
</head>
<body>
    <nav>
        <a href="/">Welcome</a>
        <a href="/tasks">All Tasks</a>
        <a href="/profile">Profile</a>
        <a href="/about">About</a>
    </nav>

    <h1>All Tasks</h1>
    <p>Total: <?= count($tasks) ?> tasks</p>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Status</th>
                <th>Task Date</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tasks as $i => $task): ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= esc($task['title']) ?></td>
                    <td>
                        <span class="status <?= esc($task['status']) ?>">
                            <?= esc($task['status']) ?>
                        </span>
                    </td>
                    <td><?= esc($task['task_date']) ?></td>
                    <td><?= esc($task['created_at']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>