<?php

declare(strict_types=1);

namespace GPlacesPhp\ApiClient\Tests\Unit\Client;

use GPlacesPhp\ApiClient\Client\FindPlace\OptionalParameters as FindPlaceOptionalParameters;
use GPlacesPhp\ApiClient\Client\PlaceDetails\OptionalParameters;
use GPlacesPhp\ApiClient\Client\Url;
use GPlacesPhp\ApiClient\ClientInterface;
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

    /** @test */
    public function find_place_api_key_can_not_be_empty(): void
    {
        $this->expectException(UrlException::class);
        $this->expectExceptionMessage('Argument "apiKey" is required and cannot be empty.');

        Url::findPlace(
            '',
            '+48500600700',
            ClientInterface::INPUT_TYPE_PHONE,
            FindPlaceOptionalParameters::fromArray([])
        );
    }

    /** @test */
    public function find_place_input_can_not_be_empty(): void
    {
        $this->expectException(UrlException::class);
        $this->expectExceptionMessage('Argument "input" is required and cannot be empty.');

        Url::findPlace(
            'some-key',
            '',
            ClientInterface::INPUT_TYPE_PHONE,
            FindPlaceOptionalParameters::fromArray([])
        );
    }

    /** @test */
    public function find_place_input_type_can_not_be_empty(): void
    {
        $this->expectException(UrlException::class);
        $this->expectExceptionMessage('Argument "inputType" is required and cannot be empty.');

        Url::findPlace(
            'some-key',
            'some input',
            '',
            FindPlaceOptionalParameters::fromArray([])
        );
    }

    /** @test */
    public function find_place_input_type_must_be_supported_type(): void
    {
        $this->expectException(UrlException::class);
        $this->expectExceptionMessage(
            "Input type 'wrong-type' is not supported, try one of these: 'textquery', 'phonenumber'."
        );

        Url::findPlace(
            'some-key',
            'some input',
            'wrong-type',
            FindPlaceOptionalParameters::fromArray([])
        );
    }

    /** @test */
    public function find_place_string_representation_is_valid(): void
    {
        $apiKey = 'some-api-key';
        $input = 'some input';
        $inputType = ClientInterface::INPUT_TYPE_PHONE;

        $url = Url::findPlace(
            $apiKey,
            $input,
            $inputType,
            FindPlaceOptionalParameters::fromArray([])
        );
        $params = \http_build_query(
            [
                'key' => $apiKey,
                'input' => $input,
                'inputtype' => $inputType,
            ]
        );
        $this->assertSame(
            "https://maps.googleapis.com/maps/api/place/findplacefromtext/json?{$params}",
            $url->toString()
        );
    }

    /**
     * @test
     * @dataProvider findPlaceOptionalParameterProvider
     */
    public function find_place_append_optional_parameters(FindPlaceOptionalParameters $parameters): void
    {
        $apiKey = 'some-api-key';
        $input = 'some input';
        $inputType = ClientInterface::INPUT_TYPE_PHONE;
        $optionalParameters = $parameters->toArray();
        $optionalParameters['key'] = $apiKey;
        $optionalParameters['input'] = $input;
        $optionalParameters['inputtype'] = $inputType;
        $expectedUrl = $this->buildFindPlaceUrl($optionalParameters);

        $url = Url::findPlace(
            $apiKey,
            $input,
            $inputType,
            $parameters
        );

        $this->assertSame($expectedUrl, $url->toString());
    }

    /** @test */
    public function find_place_hash_is_correct_md5_hash(): void
    {
        $apiKey = 'some-api-key';
        $input = 'some input';
        $inputType = ClientInterface::INPUT_TYPE_PHONE;

        $url = Url::findPlace(
            $apiKey,
            $input,
            $inputType,
            FindPlaceOptionalParameters::fromArray([])
        );

        $this->assertSame('c47f12cc02098881b1a8ecbf56dc46dd', $url->toHash());
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

    public function findPlaceOptionalParameterProvider(): \Generator
    {
        yield 'language' => [
            FindPlaceOptionalParameters::fromArray(['language' => 'pl']),
        ];

        yield 'fields' => [
            FindPlaceOptionalParameters::fromArray(
                [
                    'field' => [
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

    private function buildFindPlaceUrl(array $params): string
    {
        $paramsString = \http_build_query($params);

        return "https://maps.googleapis.com/maps/api/place/findplacefromtext/json?{$paramsString}";
    }
}
