<?php

declare(strict_types=1);

namespace GPlacesPhp\ApiClient\Client;

use GPlacesPhp\ApiClient\Client\PlaceDetails\OptionalParameters;
use GPlacesPhp\ApiClient\Exception\UrlException;

final class Url
{
    private const BASE_URL = 'https://maps.googleapis.com/maps/api/place/';

    /** @var string */
    private $url;

    private function __construct(string $url)
    {
        $this->url = $url;
    }

    public function toString(): string
    {
        return $this->url;
    }

    public function toHash(): string
    {
        return \md5($this->toString());
    }

    public static function details(
        string $apiKey,
        string $placeId,
        OptionalParameters $optionalParams
    ): self {
        if ('' === $apiKey) {
            throw UrlException::emptyApiKey();
        }

        if ('' === $placeId) {
            throw UrlException::emptyPlaceId();
        }

        $params = $optionalParams->toArray();
        $params['key'] = $apiKey;
        $params['placeid'] = $placeId;
        $paramsString = \http_build_query($params);

        return new self(self::BASE_URL . "details/json?{$paramsString}");
    }
}
