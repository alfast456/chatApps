<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- app/Views/login.php -->
    <form method="post" action="<?= base_url('/auth/authenticate') ?>">
        <?= csrf_field() ?>
        <label for="username">Username</label>
        <input type="text" name="username" id="username">
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <button type="submit">Login</button>
    </form>

</body>

</html>