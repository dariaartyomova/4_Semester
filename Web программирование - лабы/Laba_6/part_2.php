<?php
function makeHttpCall($destination, $type = 'GET', $content = null, $extraHeaders = []) {
    $session = curl_init($destination);
    $settings = [CURLOPT_RETURNTRANSFER => true];

    switch (strtoupper($type)) {
        case 'POST':
            $settings[CURLOPT_POST] = true;
            break;
        case 'PUT':
        case 'DELETE':
            $settings[CURLOPT_CUSTOMREQUEST] = $type;
            break;
    }

    if ($content !== null) {
        $processedContent = is_array($content) ? json_encode($content) : $content;
        $settings[CURLOPT_POSTFIELDS] = $processedContent;
        
        if (is_array($content)) {
            array_push($extraHeaders, 'Content-Type: application/json');
        }
    }

    if (!empty($extraHeaders)) {
        $settings[CURLOPT_HTTPHEADER] = $extraHeaders;
    }

    curl_setopt_array($session, $settings);
    $result = curl_exec($session);
    curl_close($session);
    
    return $result;
}

echo "Custom Headers:\n";
print_r(makeHttpCall(
    'https://jsonplaceholder.typicode.com/posts/1',
    'GET',
    null,
    ['X-Custom-Header: 123123', 'User-Agent: UserPuzer']
)) . "\n\n";

echo "Отправка JSON:\n";
print_r(makeHttpCall(
    'https://jsonplaceholder.typicode.com/posts',
    'POST',
    ['title' => 'JSON Title', 'body' => 'With JSON', 'userId' => 42]
)) . "\n\n";

echo "GET c URL параметрами:\n";
$query = http_build_query(['userId' => 1]);
print_r(makeHttpCall("https://jsonplaceholder.typicode.com/posts?$query")) . "\n\n";