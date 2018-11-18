# Google Places PHP Api Client

[![Packagist](https://img.shields.io/packagist/v/gplacesphp/api-client.svg?style=flat-square)](https://packagist.org/packages/gplacesphp/api-client)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/gplacesphp/api-client.svg?style=flat-square)](https://packagist.org/packages/gplacesphp/api-client)
[![Packagist](https://img.shields.io/packagist/dt/gplacesphp/api-client.svg?style=flat-square)](https://packagist.org/packages/gplacesphp/api-client)

## Build status

|Version|Linux build|Windows build|
|---|---|---|
|v1 (master)|[![Travis (.org) branch](https://img.shields.io/travis/gplacesphp/api-client/master.svg?style=flat-square)](https://travis-ci.org/gplacesphp/api-client)|[![AppVeyor branch](https://img.shields.io/appveyor/ci/PabloKowalczyk/api-client/master.svg?style=flat-square)](https://ci.appveyor.com/project/PabloKowalczyk/api-client)

## Introduction

Modern, Object-Oriented, client for using Google's Places API, requires PHP v7.1+.
Any PSR-7 (HTTP Message Interface) and PSR-17 (HTTP Factories) implementations is supported (and required).
Supports caching by any PSR-16 (simple cache) implementation,
also works with any HTTPlug client/adapter.

## Installation

```bash
composer require gplacesphp/api-client
```

## Usage

This examples uses `php-http/guzzle6-adapter` as a PSR-18 implementation
and `zendframework/zend-diactoros` as a PSR-7/PSR-17 implementation.
Any other PSR-7/PSR-17/PSR-18 implementations are supported.
If you don't have them installed you will need to run:

```bash
composer require \
    guzzlehttp/guzzle \
    php-http/guzzle6-adapter \
    zendframework/zend-diactoros
```

Remember to replace `<YOUR_API_KEY>` with you key. 

More usage examples are in `examples` directory.

### Place details

#### Basic example

```php
<?php

require_once __DIR__ . '/vendor/autoload.php';

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

var_dump($placeDetails);

```

### Find place

#### Basic example

```php
<?php

require_once __DIR__ . '/vendor/autoload.php';

$apiKey = '<YOUR_API_KEY>';
$guzzle = new \GuzzleHttp\Client();
$httpClient = new \Http\Adapter\Guzzle6\Client($guzzle);
$requestFactory = new \Zend\Diactoros\RequestFactory();

$client = \GPlacesPhp\ApiClient\Client::create(
    $apiKey,
    $httpClient,
    $requestFactory
);

$findPlace = $client->findPlace('Warszawa, Polska'); // Warsaw

var_dump($findPlace);

```

## TODOs

Things to do before stable `v1` release:

- [x] Place Details
- [x] Caching Place Details
- [ ] Places Search
    - [x] Find Place
    - [ ] Nearby Search
    - [ ] Text Search
- [ ] Caching Places Search
    - [x] Find Place
    - [ ] Nearby Search
    - [ ] Text Search
- [ ] Place Photos
- [ ] Caching Place Photos
- [x] Use `PSR-18` instead of `HTTPlug`

## License
This package is free software distributed under the terms of the MIT license.
