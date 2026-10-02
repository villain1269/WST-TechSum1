<!DOCTYPE html>
<html>
<head>
    <title>
        <?= isset($customer['id']) ? 'Edit Customer' : 'New Customer' ?>
    </title>
</head>
<body>

    <h1>
        <?= isset($customer['id']) ? 'Edit Customer' : 'Add New Customer' ?>
    </h1>

    <?php if (isset($validation)): ?>
        <?= $validation->listErrors() ?>
    <?php endif; ?>

    <form
        action="<?= isset($customer['id'])
            ? base_url('customers/update/' . $customer['id'])
            : base_url('customers/store') ?>"
        method="post"
    >

        <label for="full_name">Full Name</label><br>
        <input
            type="text"
            id="full_name"
            name="full_name"
            value="<?= old('full_name', $customer['full_name'] ?? '') ?>"
        >
        <br><br>

        <label for="email">Email</label><br>
        <input
            type="email"
            id="email"
            name="email"
            value="<?= old('email', $customer['email'] ?? '') ?>"
        >
        <br><br>

        <label for="phone">Phone</label><br>
        <input
            type="text"
            id="phone"
            name="phone"
            value="<?= old('phone', $customer['phone'] ?? '') ?>"
        >
        <br><br>

        <button type="submit">
            <?= isset($customer['id']) ? 'Update Customer' : 'Save Customer' ?>
        </button>

    </form>

    <br>

    <a href="<?= base_url('customers') ?>">
        Back to Customers
    </a>

</body>
</html>