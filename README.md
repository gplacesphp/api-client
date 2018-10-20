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

## TODOs

Things to do before stable `v1` release:

- [x] Place Details
- [x] Caching Place Details
- [ ] Places Search
- [ ] Caching Places Search
- [ ] Place Photos
- [ ] Caching Place Photos
- [ ] Use `PSR-18` instead of `HTTPlug`

## License
This package is free software distributed under the terms of the MIT license.
