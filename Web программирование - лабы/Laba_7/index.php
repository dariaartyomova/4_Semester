<?php

try {
	$mysqli = new mysqli('db', 'root', 'helloworld', 'web');
} catch (Exception $e) {
	echo "Creating db...";
	exit;
}

if (mysqli_connect_errno()) {
    printf("Connection to mysql failed with code: %s\n", mysqli_connect_error());
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $mysqli->real_escape_string($_POST['email']);
    $title = $mysqli->real_escape_string($_POST['title']);
    $category = $mysqli->real_escape_string($_POST['category']);
    $description = $mysqli->real_escape_string($_POST['description']);

    $query = "INSERT INTO ad (email, title, description, category) VALUES ('$email', '$title', '$description', '$category')";
    $mysqli->query($query);
}

$advertisements = [];
if ($result = $mysqli->query('SELECT * FROM ad ORDER BY created DESC')) {
    while ($row = $result->fetch_assoc()) {
        $advertisements[] = $row;
    }
    $result->close();
}
$mysqli->close();
?>

<!DOCTYPE html>
<head>
    <title>Ресторан</title>
</head>
<body>
    <form method="post">
        email: <input type="email" name="email"><br>
        Название: <input type="text" name="title"><br>
        Категория:
        <select name="category">
            <option>Меню</option>
        </select><br>
        Описание: <label><textarea name="description"></textarea></label><br>
        <button>Отправить</button>
    </form>
    <h3>Объявления:</h3>
    <table>
    <tr>
        <td><b>email</b></td>
        <td><b>Название</b></td>
        <td><b>Описание</b></td>
        <td><b>Категория</b></td>
    </tr>
    <?php foreach ($advertisements as $ad): ?>
        <tr>
            <td><?=$ad['email']?></td>
            <td><?=$ad['title']?></td>
            <td><?=$ad['description']?></td>
            <td><?=$ad['category']?></td>
        </tr>
    <?php endforeach; ?>
    </table>

</body>
</html>