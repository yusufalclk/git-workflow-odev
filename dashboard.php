<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Hoş geldin, <?php echo $_SESSION["username"]; ?>!</h2>
    <p>Burada TicTacToe oyun ekranı olacak.</p>
    <a href="logout.php"><button>Çıkış Yap</button></a>
</div>
</body>
</html>