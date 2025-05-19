<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <h2>Register Page</h2>

    <?php if (session()->getFlashdata('errors')): 
        $errors = session()->getFlashdata('errors');
    ?>
        <ul style="color:red;">
            <?php foreach ($errors as $err): ?>
                <li><?= $err ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form action="/auth/registerProcess" method="post">
        <input type="text" name="username" placeholder="Username" value="<?= old('username'); ?>" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <input type="password" name="confirm_password" placeholder="Confirm Password" required><br><br>
        <button type="submit">Register</button>
    </form>

    <p>Sudah punya akun? <a href="/login">Login di sini</a></p>
</body>
</html>
