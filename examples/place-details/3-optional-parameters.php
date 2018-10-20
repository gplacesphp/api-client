<?php

require_once __DIR__ . '/../vendor/autoload.php';

$apiKey = '<YOUR_API_KEY>';
$httpClient = new \Http\Client\Curl\Client();
$requestFactory = new \Zend\Diactoros\RequestFactory();

$client = \GPlacesPhp\ApiClient\Client::create(
    $apiKey,
    $httpClient,
    $requestFactory
);
// Use PL language and fetch only address_components field
$optionalParams = \GPlacesPhp\ApiClient\Client\PlaceDetails\OptionalParameters::fromArguments(
    'pl',
    '',
    '',
    ['address_components']
);

$placeDetails = $client->placeDetails('ChIJAZ-GmmbMHkcR_NPqiCq-8HI', $optionalParams); // Warszawa

dump($placeDetails);
