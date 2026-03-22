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