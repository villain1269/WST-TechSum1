<!DOCTYPE html>
<html>
<head>
    <title>
        <?= isset($user['id']) ? 'Edit User' : 'New User' ?>
    </title>
</head>
<body>

    <h1>
        <?= isset($user['id']) ? 'Edit User' : 'Add New User' ?>
    </h1>

    <?php if (isset($validation)): ?>
        <?= $validation->listErrors() ?>
    <?php endif; ?>

    <form
        action="<?= isset($user['id'])
            ? base_url('users/update/' . $user['id'])
            : base_url('users/store') ?>"
        method="post"
        enctype="multipart/form-data"
    >

        <label for="username">Username</label><br>
        <input
            type="text"
            id="username"
            name="username"
            value="<?= old('username', $user['username'] ?? '') ?>"
        >
        <br><br>

        <label for="full_name">Full Name</label><br>
        <input
            type="text"
            id="full_name"
            name="full_name"
            value="<?= old('full_name', $user['full_name'] ?? '') ?>"
        >
        <br><br>

        <?php if (isset($user['id'])): ?>
            <label for="avatar">Profile Picture</label><br>
            <input
                type="file"
                id="avatar"
                name="avatar"
                accept=".jpg,.jpeg,.png"
            >
            <p>JPG or PNG only. Maximum size: 2 MB.</p>
            <br>
        <?php endif; ?>

        <button type="submit">
            <?= isset($user['id']) ? 'Update User' : 'Save User' ?>
        </button>

    </form>

    <br>

    <a href="<?= base_url('users') ?>">
        Back to Users
    </a>

</body>
</html>