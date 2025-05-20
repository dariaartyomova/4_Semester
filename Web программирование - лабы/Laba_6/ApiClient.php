<?php

class ApiClient {
    private $baseUrl;
    private $headers;
    private $authToken;

    public function __construct(string $baseUrl, string $authToken = null ) {
        $this->baseUrl = $baseUrl;
        $this->authToken = $authToken;
        $this->headers = ['Content-Type: application/json'];
    }

    private function sendRequest(string $method, string $endpoint, array $data= null) : array {
        $url = $this->baseUrl . $endpoint;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // auth
        if ($this->authToken) {
            $this->headers[] = "Authorization: Bearer {$this->authToken}";
        }

        // curl method setup
        if ($method === 'POST') {
            curl_setopt($ch, CURLOPT_POST, true);
        } elseif ($method !== 'GET') {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        }

        // setup POST body
        if ($data) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        }

        // setup headers
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);
        curl_close($ch);

        // Logging
        error_log("Request: $method $url - Code: $httpCode");

        if ($error) {
            throw new Exception("cURL Error: $error");
        }

        if ($httpCode >= 400) {
            throw new Exception("API Error: HTTP $httpCode");
        }

        return json_decode($response, true);
    }

    public function get(string $endpoint) : array {
        return $this->sendRequest('GET', $endpoint);
    }

    public function post(string $endpoint, array $data) : array {
        return $this->sendRequest('POST', $endpoint, $data);
    }

    public function put(string $endpoint, array $data) : array {
        return $this->sendRequest('PUT', $endpoint, $data);
    }

    public function delete(string $endpoint) : array {
        return $this->sendRequest('DELETE', $endpoint);
    }
}

?>