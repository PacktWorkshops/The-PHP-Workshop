<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client(['base_uri' => 'http://httpbin.org/']);

try
{
    $response = $client->request('POST', '/response-headers', [
        'headers' => [
            'Accept' => 'application-json'
        ],
        'query' => [
            'first' => 'John',
            'last' => 'Doe'
        ]
    ]);

    if ($response->getStatusCode() !== 200) {
        throw new Exception("Status code was {$response->getStatusCode()}, not 200");
    }

    $responseObject = json_decode($response->getBody()->getContents());

    echo "The web service responded with {$responseObject->first} {$responseObject->last}" . PHP_EOL;
}
catch (Exception $ex)
{
    echo "An error occurred: " . $ex->getMessage() . PHP_EOL;
}