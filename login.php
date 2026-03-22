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
        $sorgu = $pdo->prepare("SELECT * FROM users WHERE username = ?");
        $sorgu->execute([$username]);
        $kullanici = $sorgu->fetch(PDO::FETCH_ASSOC);

        if ($kullanici) {
            if (password_verify($password, $kullanici["password"])) {
                $_SESSION["user_id"] = $kullanici["id"];
                $_SESSION["username"] = $kullanici["username"];
                header("Location: dashboard.php");
                exit;
            } else {
                $mesaj = "Şifre hatalı.";
            }
        } else {
            $mesaj = "Kullanıcı bulunamadı.";
        }
    }
}
?>

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