<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login Page</h2>

    <?php if (session()->getFlashdata('error')): ?>
        <p style="color:red;"><?= session()->getFlashdata('error'); ?></p>
    <?php endif; ?>

    <?php if (session()->getFlashdata('errors')): 
        $errors = session()->getFlashdata('errors');
    ?>
        <ul style="color:red;">
            <?php foreach ($errors as $err): ?>
                <li><?= $err ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form action="/auth/loginProcess" method="post">
        <input type="text" name="username" placeholder="Username" value="<?= old('username'); ?>" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <button type="submit">Login</button>
    </form>

    <p>Belum punya akun? <a href="/register">Daftar di sini</a></p>
</body>
</html>
