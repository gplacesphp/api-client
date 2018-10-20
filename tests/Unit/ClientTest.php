<?php

declare(strict_types=1);

namespace GPlacesPhp\ApiClient\Tests\Unit;

use GPlacesPhp\ApiClient\Client;
use GPlacesPhp\ApiClient\Exception\ClientException;
use GPlacesPhp\ApiClient\Tests\TestCase\Cache\CacheSpy;
use GPlacesPhp\ApiClient\Tests\TestCase\FixtureLoader\FixtureLoader;
use Http\Client\HttpClient;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UriInterface;

final class ClientTest extends TestCase
{
    /** @test */
    public function client_requires_api_key(): void
    {
        $this->expectException(ClientException::class);
        $this->expectExceptionMessage('Argument "apiKey" cannot be empty string.');

        Client::create(
            '',
            $this->createDummyClient(),
            $this->createDummyRequestFactory()
        );
    }

    /** @test */
    public function details_are_read_from_cache_if_cached(): void
    {
        $fixtureLoader = new FixtureLoader();
        $detailsData = $fixtureLoader->getJson('details-response')['result'] ?? [];
        $cacheMock = new CacheSpy($detailsData);

        $client = Client::create(
            'some-api-key',
            $this->createDummyClient(),
            $this->createDummyRequestFactory(),
            $cacheMock
        );
        $client->placeDetails('some-place-id');

        $this->assertSame(1, $cacheMock->getCall);
    }

    private function createDummyClient(): HttpClient
    {
        return new class() implements HttpClient {
            /**
             * {@inheritdoc}
             */
            public function sendRequest(RequestInterface $request)
            {
            }
        };
    }

    private function createDummyRequestFactory(): RequestFactoryInterface
    {
        $request = $this->createDummyRequest();

        return new class($request) implements RequestFactoryInterface {
            /** @var RequestInterface */
            private $request;

            public function __construct(RequestInterface $request)
            {
                $this->request = $request;
            }

            /** {@inheritdoc} */
            public function createRequest(string $method, $uri): RequestInterface
            {
                return $this->request;
            }
        };
    }

    private function createDummyRequest(): RequestInterface
    {
        return new class() implements RequestInterface {
            /** {@inheritdoc} */
            public function getProtocolVersion()
            {
            }

            /** {@inheritdoc} */
            public function withProtocolVersion($version)
            {
            }

            /** {@inheritdoc} */
            public function getHeaders()
            {
            }

            /** {@inheritdoc} */
            public function hasHeader($name)
            {
            }

            /** {@inheritdoc} */
            public function getHeader($name)
            {
            }

            /** {@inheritdoc} */
            public function getHeaderLine($name)
            {
            }

            /** {@inheritdoc} */
            public function withHeader($name, $value)
            {
            }

            /** {@inheritdoc} */
            public function withAddedHeader($name, $value)
            {
            }

            /** {@inheritdoc} */
            public function withoutHeader($name)
            {
            }

            /** {@inheritdoc} */
            public function getBody()
            {
            }

            /** {@inheritdoc} */
            public function withBody(StreamInterface $body)
            {
            }

            /** {@inheritdoc} */
            public function getRequestTarget()
            {
            }

            /** {@inheritdoc} */
            public function withRequestTarget($requestTarget)
            {
            }

            /** {@inheritdoc} */
            public function getMethod()
            {
            }

            /** {@inheritdoc} */
            public function withMethod($method)
            {
            }

            /** {@inheritdoc} */
            public function getUri()
            {
            }

            /** {@inheritdoc} */
            public function withUri(UriInterface $uri, $preserveHost = false)
            {
            }
        };
    }
}
