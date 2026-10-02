<!DOCTYPE html>
<html>
<head>
    <title>User Accounts</title>
</head>
<body>
    <nav>
    <a href="<?= base_url('/') ?>">Home</a> |
    <a href="<?= base_url('about') ?>">About</a> |
    <a href="<?= base_url('customers') ?>">Customers</a> |
    <a href="<?= base_url('users') ?>">Users</a>
</nav>
    <h1>User Accounts</h1>

    <?php foreach ($users as $user): ?>
    <article>
        <?php if (!empty($user['avatar'])): ?>
            <img
                src="<?= base_url('uploads/avatars/' . $user['avatar']) ?>"
                alt="Avatar of <?= esc($user['full_name']) ?>"
                width="120"
                height="120"
            >
        <?php else: ?>
            <img
                src="<?= base_url('images/avatar-placeholder.svg') ?>"
                alt="Placeholder avatar"
                width="120"
                height="120"
            >
        <?php endif; ?>

        <h2><?= esc($user['full_name']) ?></h2>
        <p>Username: <?= esc($user['username']) ?></p>

        <a href="<?= base_url('users/edit/' . $user['id']) ?>">
            Edit
        </a>
    </article>

    <hr>
    <?php endforeach; ?>

    
</body>
</html>