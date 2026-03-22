<?php
session_start();
require_once "db.php";

$mesaj = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    if (empty($username) || empty($password)) {
        $mesaj = "Kullanıcı adı ve şifre boş bırakılamaz.";
    } else {
        $kontrol = $pdo->prepare("SELECT * FROM users WHERE username = ?");
        $kontrol->execute([$username]);

        if ($kontrol->rowCount() > 0) {
            $mesaj = "Bu kullanıcı adı zaten kayıtlı.";
        } else {
            $hashliSifre = password_hash($password, PASSWORD_DEFAULT);

            $ekle = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            $ekle->execute([$username, $hashliSifre]);

            $mesaj = "Kayıt başarılı. Giriş yapabilirsiniz.";
        }
    }
}
?>
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