<?php
function CURLrequest($url, $method = 'GET', $data = null, $headers = []) 
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, false);

    if ($method === 'POST') 
    {
        curl_setopt($ch, CURLOPT_POST, true);
    } elseif (in_array($method, ['PUT', 'DELETE'])) 
    {
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
    }

    if ($data !== null) 
    {
        if (is_array($data)) {
            $data = json_encode($data);
            $headers[] = 'Content-Type: application/json';
        }
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    }

    if (!empty($headers)) 
    {
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    }

    $response = curl_exec($ch);
    $error = curl_error($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($error) 
    {
        echo "Ошибка запроса: $error\n";
    } elseif ($code >= 400) 
    {
        echo "HTTP ошибка, код: $code\n Ответ: $response\n";
    } else 
    {
        echo "Успешно\n";
        $data = json_decode($response, true);
        print_r($data);
    }

    echo "\n";
}
echo "Успешный запрос: " . CURLrequest('https://jsonplaceholder.typicode.com/posts/1') . "\n";
echo "Ошибка 404: " . CURLrequest('https://jsonplaceholder.typicode.com/posts/999999'). "\n";
echo "Ошибка CURL: " . CURLrequest('https://bad.domain.test') . "\n";