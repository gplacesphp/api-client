<?php

declare(strict_types=1);

namespace GPlacesPhp\ApiClient;

use GPlacesPhp\ApiClient\Exception\ClientException;

final class Client
{
    /** @var string */
    private $key;

    /** @throws ClientException */
    public function __construct(string $apiKey)
    {
        if ('' === $apiKey) {
            throw new ClientException('Argument "apiKey" cannot be empty string.');
        }

        $this->key = $apiKey;
    }
}
