<?php

require_once __DIR__ . '/../vendor/autoload.php';

$apiKey = '<YOUR_API_KEY>';
$guzzle = new \GuzzleHttp\Client();
$httpClient = new \Http\Adapter\Guzzle6\Client($guzzle);
$requestFactory = new \Zend\Diactoros\RequestFactory();

$client = \GPlacesPhp\ApiClient\Client::create(
    $apiKey,
    $httpClient,
    $requestFactory
);

$placeDetails = $client->placeDetails('ChIJAZ-GmmbMHkcR_NPqiCq-8HI'); // Warsaw

\dump($placeDetails);
