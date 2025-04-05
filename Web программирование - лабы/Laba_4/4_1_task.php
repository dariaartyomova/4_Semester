<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Сохраняем данные в сессию
    $_SESSION['user'] = [
        'login' => htmlspecialchars($_POST['login']),
        'password' => htmlspecialchars($_POST['password']),
        'birthdate' => htmlspecialchars($_POST['birthdate'])
    ];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ввод данных</title>
</head>
<body>
<form method="POST">
    <label>Логин:</label>
    <input type="text" name="login" required><br>

    <label>Пароль:</label>
    <input type="password" name="password" required><br>

    <label>Дата рождения:</label>
    <input type="date" name="birthdate" required><br>

    <button type="submit">Сохранить</button>
</form>

<p><a href="profile.php">Перейти к профилю</a></p>
</body>
</html>