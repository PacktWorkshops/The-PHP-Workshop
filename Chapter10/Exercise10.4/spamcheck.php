<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;

$email = 'test@test.com';

$client = new Client(['base_uri' => 'https://spamcheck.postmarkapp.com/']);

$requestBody = json_encode([
    'email' => $email,
    'options' => 'short'
]);

try
{
    $response = $client->request('POST', '/filter', [
        'headers' => [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json'
        ],
        'body' => $requestBody
    ]);

    if ($response->getStatusCode() !== 200) {
        throw new Exception("Status code was {$response->getStatusCode()}, not 200");
    }

    $responseObject = json_decode($response->getBody()->getContents());

    if ($responseObject->success !== true) {
        throw new Exception("Service returned an unsuccessful response: {$responseObject->message}");
    }

    echo "The SpamAssassin score for email {$email} is {$responseObject->score}" . PHP_EOL;
}
catch (Exception $ex)
{
    echo "An error occurred: " . $ex->getMessage() . PHP_EOL;
}