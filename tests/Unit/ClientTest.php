<?php

declare(strict_types=1);

namespace GPlacesPhp\ApiClient\Tests\Unit;

use GPlacesPhp\ApiClient\Client;
use GPlacesPhp\ApiClient\Exception\ClientException;
use GPlacesPhp\ApiClient\Tests\TestCase\Cache\CacheSpy;
use GPlacesPhp\ApiClient\Tests\TestCase\FixtureLoader\FixtureLoader;
use GPlacesPhp\ApiClient\Tests\TestCase\Psr\Http\ResponseMock;
use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientInterface as HttpClient;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UriInterface;

/**
 * @internal
 */
final class ClientTest extends TestCase
{
    public function test_client_requires_api_key(): void
    {
        $this->expectException(ClientException::class);
        $this->expectExceptionMessage('Argument "apiKey" cannot be empty string.');
        $response = ResponseMock::withContent('[]');

        Client::create(
            '',
            $this->createDummyClient($response),
            $this->createDummyRequestFactory(),
        );
    }

    public function test_details_are_read_from_cache_if_cached(): void
    {
        $fixtureLoader = new FixtureLoader();
        $detailsData = $fixtureLoader->getJson('details-response')['result'] ?? [];
        $cacheMock = new CacheSpy($detailsData);
        $response = ResponseMock::withContent('[]');

        $client = Client::create(
            'some-api-key',
            $this->createDummyClient($response),
            $this->createDummyRequestFactory(),
            $cacheMock,
        );
        $client->placeDetails('some-place-id');

        $this->assertSame(1, $cacheMock->getCall);
    }

    public function test_find_place_fetch_data_by_http(): void
    {
        $fixtureLoader = new FixtureLoader();
        $detailsData = $fixtureLoader->getJson('find-place') ?? [];
        $response = ResponseMock::withContent(\json_encode($detailsData) ?: '');

        $client = Client::create(
            'some-api-key',
            $this->createDummyClient($response),
            $this->createDummyRequestFactory(),
        );
        $findPlace = $client->findPlace('some-place-id');
        $candidates = $findPlace->candidates();

        $this->assertCount(1, $candidates);
        $firstCandidate = \array_values($candidates)[0];
        $this->assertSame('Museum of Contemporary Art Australia', $firstCandidate->name());
        $this->assertSame('140 George St, The Rocks NSW 2000, Australia', $firstCandidate->formattedAddress());
    }

    public function test_find_place_fetched_form_cache_if_cached(): void
    {
        $fixtureLoader = new FixtureLoader();
        $candidatesData = $fixtureLoader->getJson('find-place')['candidates'] ?? [];
        $cacheMock = new CacheSpy($candidatesData);
        $response = ResponseMock::withContent('[]');

        $client = Client::create(
            'some-api-key',
            $this->createDummyClient($response),
            $this->createDummyRequestFactory(),
            $cacheMock,
        );
        $findPlace = $client->findPlace('some-place-id');
        $candidates = $findPlace->candidates();

        $this->assertCount(1, $candidates);
        $firstCandidate = \array_values($candidates)[0];
        $this->assertSame('Museum of Contemporary Art Australia', $firstCandidate->name());
        $this->assertSame('140 George St, The Rocks NSW 2000, Australia', $firstCandidate->formattedAddress());
    }

    private function createDummyClient(ResponseInterface $response): HttpClient
    {
        return new class($response) implements HttpClient {
            /** @var ResponseInterface */
            private $response;

            public function __construct(ResponseInterface $response)
            {
                $this->response = $response;
            }

            /** {@inheritdoc} */
            public function sendRequest(RequestInterface $request): ResponseInterface
            {
                return $this->response;
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
            public function getProtocolVersion(): void
            {
            }

            /** {@inheritdoc} */
            public function withProtocolVersion($version): void
            {
            }

            /** {@inheritdoc} */
            public function getHeaders(): void
            {
            }

            /** {@inheritdoc} */
            public function hasHeader($name): void
            {
            }

            /** {@inheritdoc} */
            public function getHeader($name): void
            {
            }

            /** {@inheritdoc} */
            public function getHeaderLine($name): void
            {
            }

            /** {@inheritdoc} */
            public function withHeader($name, $value): void
            {
            }

            /** {@inheritdoc} */
            public function withAddedHeader($name, $value): void
            {
            }

            /** {@inheritdoc} */
            public function withoutHeader($name): void
            {
            }

            /** {@inheritdoc} */
            public function getBody(): void
            {
            }

            /** {@inheritdoc} */
            public function withBody(StreamInterface $body): void
            {
            }

            /** {@inheritdoc} */
            public function getRequestTarget(): void
            {
            }

            /** {@inheritdoc} */
            public function withRequestTarget($requestTarget): void
            {
            }

            /** {@inheritdoc} */
            public function getMethod(): void
            {
            }

            /** {@inheritdoc} */
            public function withMethod($method): void
            {
            }

            /** {@inheritdoc} */
            public function getUri(): void
            {
            }

            /** {@inheritdoc} */
            public function withUri(UriInterface $uri, $preserveHost = false): void
            {
            }
        };
    }
}
