<?php
$sentenceCount = 0;
$paragraphCount = 0;
$inputText = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inputText = $_POST['text'] ?? '';
    $trimmedText = trim($inputText);


    $trimmedText = str_replace(["\r\n", "\r"], "\n", $trimmedText);


    if (!empty($trimmedText)) {
        $paragraphs = explode("\n", $trimmedText);
        $paragraphCount = count($paragraphs);
    }


    if (!empty($trimmedText)) {
        preg_match_all('/[.!?](?=\s|$)/', $trimmedText, $matches);
        $sentenceCount = count($matches[0] ?? []);
    }
}
?>

<!DOCTYPE html>
<html>
<body>
<form method="POST">
    <textarea name="text" rows="4" cols="50"><?= htmlspecialchars($inputText) ?></textarea>
    <br>
    <button type="submit">Посчитать</button>
</form>

<?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
    <p>Предложений: <?= $sentenceCount ?></p>
    <p>Абзацев: <?= $paragraphCount ?></p>
<?php endif; ?>
</body>
</html>