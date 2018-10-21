<?php

declare(strict_types=1);

namespace GPlacesPhp\ApiClient;

use GPlacesPhp\ApiClient\Cache\NullCache;
use GPlacesPhp\ApiClient\Client\FindPlace;
use GPlacesPhp\ApiClient\Client\FindPlace\OptionalParameters;
use GPlacesPhp\ApiClient\Client\PlaceDetails;
use GPlacesPhp\ApiClient\Client\Url;
use GPlacesPhp\ApiClient\Exception\ApiException;
use GPlacesPhp\ApiClient\Exception\ClientException;
use Http\Client\HttpClient;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\StreamInterface;
use Psr\SimpleCache\CacheInterface;

final class Client implements ClientInterface
{
    /** @var string */
    private $key;
    /** @var HttpClient */
    private $httpClient;
    /** @var CacheInterface */
    private $cache;
    /** @var RequestFactoryInterface */
    private $requestFactory;

    /** @throws ClientException */
    private function __construct(
        string $apiKey,
        HttpClient $httpClient,
        RequestFactoryInterface $requestFactory,
        CacheInterface $cache
    ) {
        if ('' === $apiKey) {
            throw new ClientException('Argument "apiKey" cannot be empty string.');
        }

        $this->key = $apiKey;
        $this->httpClient = $httpClient;
        $this->cache = $cache;
        $this->requestFactory = $requestFactory;
    }

    public static function create(
        string $apiKey,
        HttpClient $httpClient,
        RequestFactoryInterface $requestFactory,
        CacheInterface $cache = null
    ): self {
        return new self(
            $apiKey,
            $httpClient,
            $requestFactory,
            $cache ?? new NullCache()
        );
    }

    public function placeDetails(string $placeId, PlaceDetails\OptionalParameters $parameters = null): PlaceDetails
    {
        $url = Url::details(
            $this->key,
            $placeId,
            $parameters ?? PlaceDetails\OptionalParameters::fromArray([])
        );
        $request = $this->requestFactory
            ->createRequest('GET', $url->toString());
        $isCached = $this->cache
            ->has($url->toHash());
        $placeDetailsData = null;

        if (!$isCached) {
            $response = $this->httpClient
                ->sendRequest($request);
            $responseData = $this->parseJsonResponse($response->getBody());
            $responseStatus = $responseData['status'] ?? '';

            if ('OK' !== $responseStatus) {
                throw ApiException::create($responseStatus, $responseData['error_message'] ?? '');
            }

            $placeDetailsData = $responseData['result'] ?? [];

            $this->cache
                ->set($url->toHash(), $placeDetailsData);
        } else {
            $placeDetailsData = $this->cache
                ->get($url->toHash());
        }

        return PlaceDetails::fromArray($placeDetailsData);
    }

    public function findPlace(
        string $input,
        string $inputType = self::INPUT_TYPE_TEXT,
        OptionalParameters $optionalParameters = null
    ): FindPlace {
        $url = Url::findPlace(
            $this->key,
            $input,
            $inputType,
            $optionalParameters ?? OptionalParameters::fromArray([])
        );
        $request = $this->requestFactory
            ->createRequest('GET', $url->toString());
        $response = $this->httpClient
            ->sendRequest($request);
        $responseData = $this->parseJsonResponse($response->getBody());
        $responseStatus = $responseData['status'] ?? '';

        if ('OK' !== $responseStatus) {
            throw ApiException::create($responseStatus, $responseData['error_message'] ?? '');
        }

        return FindPlace::fromArray($responseData['candidates'] ?? []);
    }

    private function parseJsonResponse(StreamInterface $stream): array
    {
        $data = \json_decode((string) $stream, true);

        if (\JSON_ERROR_NONE !== \json_last_error()) {
            $jsonErrorMessage = \json_last_error_msg();
            throw new ClientException("Unable to parse response, error message: '{$jsonErrorMessage}'.");
        }

        return $data;
    }
}
