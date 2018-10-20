<?php

require_once __DIR__ . '/../vendor/autoload.php';

$apiKey = '<YOUR_API_KEY>';
$httpClient = new \Http\Client\Curl\Client();
$requestFactory = new \Zend\Diactoros\RequestFactory();
$filesystemCache = new \Symfony\Component\Cache\Simple\FilesystemCache();

$client = \GPlacesPhp\ApiClient\Client::create(
    $apiKey,
    $httpClient,
    $requestFactory,
    $filesystemCache
);

$client->placeDetails('ChIJAZ-GmmbMHkcR_NPqiCq-8HI'); //Warsaw
// Data will be fetched from cache
$placeDetails = $client->placeDetails('ChIJAZ-GmmbMHkcR_NPqiCq-8HI'); // Warsaw

dump($placeDetails);
