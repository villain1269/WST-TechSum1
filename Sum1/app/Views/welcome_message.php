<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tasks for Today</title>
    <style>
        body { font-family: system-ui, sans-serif; max-width: 720px; margin: 40px auto; padding: 0 20px; }
        nav { margin-bottom: 24px; border-bottom: 1px solid #ddd; padding-bottom: 12px; }
        nav a { margin-right: 16px; text-decoration: none; color: #0a58ca; }
        .task { padding: 10px 14px; border: 1px solid #ddd; border-radius: 6px; margin-bottom: 8px; }
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

    <h1>Tasks for Today</h1>
    <p><strong><?= esc($today) ?></strong></p>

    <?php if (empty($tasks)): ?>
        <p>No tasks scheduled for today.</p>
    <?php else: ?>
        <?php foreach ($tasks as $task): ?>
            <div class="task">
                <strong><?= esc($task['title']) ?></strong>
                <span class="status <?= esc($task['status']) ?>">
                    <?= esc($task['status']) ?>
                </span>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>