
<?php
// GET
$ch = curl_init('https://jsonplaceholder.typicode.com/posts/1');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
echo "GET: " . $response . "\n";

// POST
$ch = curl_init('https://jsonplaceholder.typicode.com/posts');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(['title'=>'Hi','body'=>'Test','userId'=>1]));
$response = curl_exec($ch);
curl_close($ch);
echo "POST: " . $response . "\n";

// PUT
$ch = curl_init('https://jsonplaceholder.typicode.com/posts/1');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(['id'=>1,'title'=>'New','body'=>'Edit','userId'=>1]));
$response = curl_exec($ch);
curl_close($ch);
echo "PUT: " . $response . "\n";

// DELETE
$ch = curl_init('https://jsonplaceholder.typicode.com/posts/1');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
$response = curl_exec($ch);
curl_close($ch);
echo "DELETE: " . $response . "\n";