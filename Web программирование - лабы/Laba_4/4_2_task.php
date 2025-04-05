<?php
session_start();
if (!isset($_SESSION['user'])) {
    die('Данные не найдены');
}


$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Профиль</title>
</head>
<body>
<h2>Ваши данные:</h2>
<p>Логин: <?= $user['login'] ?></p>
<p>Пароль: <?= $user['password'] ?></p>
<p>Дата рождения: <?= $user['birthdate'] ?></p>

<p><a href="index.php">Вернуться</a></p>
</body>
</html>