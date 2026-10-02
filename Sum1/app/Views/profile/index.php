<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <style>
        body { font-family: system-ui, sans-serif; max-width: 720px; margin: 40px auto; padding: 0 20px; }
        nav { margin-bottom: 24px; border-bottom: 1px solid #ddd; padding-bottom: 12px; }
        nav a { margin-right: 16px; text-decoration: none; color: #0a58ca; }
        .card { border: 1px solid #ddd; border-radius: 8px; padding: 20px; }
        .row { margin-bottom: 12px; }
        .label { color: #666; font-size: 12px; text-transform: uppercase; letter-spacing: .5px; }
        .value { font-size: 18px; }
    </style>
</head>
<body>
    <nav>
        <a href="/">Welcome</a>
        <a href="/tasks">All Tasks</a>
        <a href="/profile">Profile</a>
        <a href="/about">About</a>
    </nav>

    <h1>User Profile</h1>

    <?php if (empty($user)): ?>
        <p>No user record found.</p>
    <?php else: ?>
        <div class="card">
            <div class="row">
                <div class="label">Full Name</div>
                <div class="value"><?= esc($user['full_name']) ?></div>
            </div>
            <div class="row">
                <div class="label">Username</div>
                <div class="value"><?= esc($user['username']) ?></div>
            </div>
            <div class="row">
                <div class="label">Email</div>
                <div class="value"><?= esc($user['email']) ?></div>
            </div>
            <div class="row">
                <div class="label">Member Since</div>
                <div class="value"><?= esc($user['created_at']) ?></div>
            </div>
        </div>
    <?php endif; ?>
</body>
</html>