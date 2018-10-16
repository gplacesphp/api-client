<?php

declare(strict_types=1);

namespace GPlacesPhp\ApiClient\Tests\Unit;

use GPlacesPhp\ApiClient\Client;
use GPlacesPhp\ApiClient\Exception\ClientException;
use PHPUnit\Framework\TestCase;

final class ClientTest extends TestCase
{
    /** @test */
    public function clientRequiresApiKey(): void
    {
        $this->expectException(ClientException::class);
        $this->expectExceptionMessage('Argument "apiKey" cannot be empty string.');

        new Client('');
    }
}
