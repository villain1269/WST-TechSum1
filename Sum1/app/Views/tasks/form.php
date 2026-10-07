<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= esc($heading) ?></title>
    <style>
        body { font-family: system-ui, sans-serif; max-width: 720px; margin: 40px auto; padding: 0 20px; }
        nav { margin-bottom: 24px; border-bottom: 1px solid #ddd; padding-bottom: 12px; }
        nav a { margin-right: 16px; text-decoration: none; color: #0a58ca; }
        label { display: block; margin-top: 14px; font-weight: 600; }
        input, select { box-sizing: border-box; width: 100%; padding: 9px; margin-top: 5px; }
        button { margin-top: 18px; padding: 9px 16px; }
        .error { color: #b00020; }
    </style>
</head>
<body>
    <nav>
        <a href="<?= site_url('/') ?>">Welcome</a>
        <a href="<?= site_url('tasks') ?>">All Tasks</a>
        <a href="<?= site_url('profile') ?>">Profile</a>
        <a href="<?= site_url('about') ?>">About</a>
        <a href="<?= site_url('tasks/new') ?>">New Task</a>
        <form method="post" action="<?= site_url('logout') ?>" style="display:inline"><?= csrf_field() ?><button type="submit">Logout</button></form>
    </nav>

    <h1><?= esc($heading) ?></h1>
    <?php if (isset($validation)): ?><div class="error"><?= $validation->listErrors() ?></div><?php endif; ?>

    <form method="post" action="<?= esc($formAction) ?>">
        <?= csrf_field() ?>
        <label for="title">Title</label>
        <input id="title" name="title" maxlength="150" value="<?= old('title', $task['title'] ?? '') ?>" required>

        <label for="status">Status</label>
        <select id="status" name="status">
            <?php $status = old('status', $task['status'] ?? 'pending'); ?>
            <option value="pending" <?= $status === 'pending' ? 'selected' : '' ?>>Pending</option>
            <option value="done" <?= $status === 'done' ? 'selected' : '' ?>>Done</option>
        </select>

        <label for="task_date">Task Date</label>
        <input id="task_date" type="date" name="task_date" value="<?= old('task_date', $task['task_date'] ?? '') ?>" required>

        <button type="submit">Save Task</button>
        <a href="<?= site_url('tasks') ?>">Cancel</a>
    </form>
</body>
</html>
