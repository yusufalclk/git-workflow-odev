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