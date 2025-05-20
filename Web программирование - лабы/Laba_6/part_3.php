<?php

require_once 'app.php';

$client = new ApiClient('https://jsonplaceholder.typicode.com');

try {
    $posts = $client->get('/posts');
    echo "GET Response: " . print_r($posts[0], true) . "\n";

    $newPost = $client->post('/posts', [
        'title' => 'Пример поста',
        'body' => 'Тело поста',
        'userId' => 1
    ]);
    echo "POST Response: " . print_r($newPost, true) . "\n";

    $updatedPost = $client->put('/posts/1', [
        'title' => 'Обновленный заголовок'
    ]);
    echo "PUT Response: " . print_r($updatedPost, true) . "\n";

    $deleteResponse = $client->delete('/posts/1');
    echo "DELETE Response: " . print_r($deleteResponse, true) . "\n";

} catch (Exception $e) {
    echo "Ошибка: " . $e->getMessage() . "\n";
}

?>