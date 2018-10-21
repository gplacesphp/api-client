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

    public static function emptyInput(): self
    {
        return new self('Argument "input" is required and cannot be empty.');
    }

    public static function emptyInputType(): self
    {
        return new self('Argument "inputType" is required and cannot be empty.');
    }

    public static function unsupportedInputType(string $inputType, array $inputTypes): self
    {
        $inputTypesString = \implode("', '", $inputTypes);

        return new self("Input type '{$inputType}' is not supported, try one of these: '{$inputTypesString}'.");
    }
}
