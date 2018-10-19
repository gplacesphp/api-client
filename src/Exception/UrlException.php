<?php

declare(strict_types=1);

namespace GPlacesPhp\ApiClient\Exception;

class UrlException extends ClientException
{
    public static function emptyApiKey(): self
    {
        return new self('Argument "apiKey" is required and cannot be empty.');
    }

    public static function emptyPlaceId(): self
    {
        return new self('Argument "placeId" is required and cannot be empty.');
    }
}
