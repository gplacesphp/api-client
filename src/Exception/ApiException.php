<?php

declare(strict_types=1);

namespace GPlacesPhp\ApiClient\Exception;

class ApiException extends ClientException
{
    public static function create(string $status, string $errorMessage): self
    {
        return new self("Requesting Google Places API failed. Status: '{$status}', error message: '{$errorMessage}'.");
    }
}
