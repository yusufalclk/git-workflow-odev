<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Giriş Yap</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Giriş Yap</h1>

    <?php if (!empty($mesaj)): ?>
        <div class="mesaj"><?php echo $mesaj; ?></div>
    <?php endif; ?>

    <form method="POST">
        <input type="text" name="username" placeholder="Kullanıcı Adı">
        <input type="password" name="password" placeholder="Şifre">
        <button type="submit">Giriş Yap</button>
    </form>

    <div class="link">
        <a href="register.php">Hesabın yok mu? Kayıt Ol</a>
    </div>
</div>
</body>
</html>