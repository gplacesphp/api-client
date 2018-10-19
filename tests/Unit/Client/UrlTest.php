<?php

declare(strict_types=1);

namespace GPlacesPhp\ApiClient\Tests\Unit\Client;

use GPlacesPhp\ApiClient\Client\PlaceDetails\OptionalParameters;
use GPlacesPhp\ApiClient\Client\Url;
use GPlacesPhp\ApiClient\Exception\UrlException;
use PHPUnit\Framework\TestCase;

final class UrlTest extends TestCase
{
    /** @test */
    public function details_api_key_can_not_be_empty(): void
    {
        $this->expectException(UrlException::class);
        $this->expectExceptionMessage('Argument "apiKey" is required and cannot be empty.');

        Url::details(
            '',
            'place-id',
            OptionalParameters::fromArray([])
        );
    }

    /** @test */
    public function details_place_id_can_not_be_empty(): void
    {
        $this->expectException(UrlException::class);
        $this->expectExceptionMessage('Argument "placeId" is required and cannot be empty.');

        Url::details(
            'some-key',
            '',
            OptionalParameters::fromArray([])
        );
    }

    /** @test */
    public function details_string_representation_is_valid(): void
    {
        $apiKey = 'some-api-key';
        $placeId = 'some-place-id';

        $url = Url::details(
            $apiKey,
            $placeId,
            OptionalParameters::fromArray([])
        );

        $this->assertSame(
            "https://maps.googleapis.com/maps/api/place/details/json?key={$apiKey}&placeid={$placeId}",
            $url->toString()
        );
    }

    /**
     * @test
     * @dataProvider optionalParameterProvider
     */
    public function details_append_optional_parameters(OptionalParameters $parameters): void
    {
        $apiKey = 'some-api-key';
        $placeId = 'some-place-id';
        $optionalParameters = $parameters->toArray();
        $optionalParameters['key'] = $apiKey;
        $optionalParameters['placeid'] = $placeId;
        $expectedUrl = $this->buildDetailsUrl($optionalParameters);

        $url = Url::details(
            $apiKey,
            $placeId,
            $parameters
        );

        $this->assertSame($expectedUrl, $url->toString());
    }

    /** @test */
    public function hash_is_correct_md5_hash(): void
    {
        $apiKey = 'some-api-key';
        $placeId = 'some-place-id';

        $url = Url::details(
            $apiKey,
            $placeId,
            OptionalParameters::fromArray([])
        );

        $this->assertSame('9a966127bfeee5cd729118e7e39be405', $url->toHash());
    }

    public function optionalParameterProvider(): \Generator
    {
        yield 'language' => [
            OptionalParameters::fromArray(['language' => 'pl']),
        ];

        yield 'region' => [
            OptionalParameters::fromArray(['region' => 'pl']),
        ];

        yield 'sessiontoken' => [
            OptionalParameters::fromArray(['sessiontoken' => 'unique-token']),
        ];

        yield 'fields' => [
            OptionalParameters::fromArray(
                [
                    'field' => [
                        'address_component',
                        'opening_hours',
                        'price_level',
                    ],
                ]
            ),
        ];
    }

    private function buildDetailsUrl(array $params): string
    {
        $paramsString = \http_build_query($params);

        return "https://maps.googleapis.com/maps/api/place/details/json?{$paramsString}";
    }
}
