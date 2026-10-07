<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body { font-family: system-ui, sans-serif; max-width: 480px; margin: 40px auto; padding: 0 20px; }
        nav { margin-bottom: 24px; border-bottom: 1px solid #ddd; padding-bottom: 12px; }
        nav a { margin-right: 16px; text-decoration: none; color: #0a58ca; }
        label { display: block; margin-top: 14px; font-weight: 600; }
        input { box-sizing: border-box; width: 100%; padding: 9px; margin-top: 5px; }
        button { margin-top: 18px; padding: 9px 16px; }
        .error { color: #b00020; }
        .success { color: #087f23; }
    </style>
</head>
<body>
    <nav>
        <a href="<?= site_url('/') ?>">Welcome</a>
        <a href="<?= site_url('tasks') ?>">All Tasks</a>
        <a href="<?= site_url('profile') ?>">Profile</a>
        <a href="<?= site_url('about') ?>">About</a>
    </nav>

    <h1>Login</h1>
    <?php if ($message = session()->getFlashdata('error')): ?><p class="error"><?= esc($message) ?></p><?php endif; ?>
    <?php if ($message = session()->getFlashdata('success')): ?><p class="success"><?= esc($message) ?></p><?php endif; ?>
    <?php if (isset($error)): ?><p class="error"><?= esc($error) ?></p><?php endif; ?>
    <?php if (isset($validation)): ?><div class="error"><?= $validation->listErrors() ?></div><?php endif; ?>

    <form method="post" action="<?= site_url('login') ?>">
        <?= csrf_field() ?>
        <label for="username">Username</label>
        <input id="username" name="username" value="<?= old('username') ?>" required>

        <label for="password">Password</label>
        <input id="password" type="password" name="password" required>

        <button type="submit">Log In</button>
    </form>
</body>
</html>
