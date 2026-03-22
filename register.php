<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Kayıt Ol</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Kayıt Ol</h1>

    <?php if (!empty($mesaj)): ?>
        <div class="mesaj"><?php echo $mesaj; ?></div>
    <?php endif; ?>

    <form method="POST">
        <input type="text" name="username" placeholder="Kullanıcı Adı">
        <input type="password" name="password" placeholder="Şifre">
        <button type="submit">Kayıt Ol</button>
    </form>

    <div class="link">
        <a href="login.php">Zaten hesabın var mı? Giriş Yap</a>
    </div>
</div>
</body>
</html>