<?php

declare(strict_types=1);

namespace GPlacesPhp\ApiClient\Tests\Unit\Client\PlaceDetails;

use GPlacesPhp\ApiClient\Client\PlaceDetails\OptionalParameters;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
final class OptionalParametersTest extends TestCase
{
    public function test_parameters_can_be_constructed_from_array(): void
    {
        $paramsArray = [
            'language' => 'pl',
            'region' => 'pl',
            'sessiontoken' => 'some-token',
            'fields' => [
                'address_components',
                'alt_id',
            ],
        ];
        $parameters = OptionalParameters::fromArray($paramsArray);

        $this->assertSame(
            [
                'language' => 'pl',
                'region' => 'pl',
                'sessiontoken' => 'some-token',
                'fields' => 'address_components,alt_id',
            ],
            $parameters->toArray(),
        );
    }

    public function test_parameters_can_be_constructed_from_arguments(): void
    {
        $parameters = OptionalParameters::fromArguments(
            'en',
            'en',
            'other-token',
            ['geometry', 'icon'],
        );

        $this->assertSame(
            [
                'language' => 'en',
                'region' => 'en',
                'sessiontoken' => 'other-token',
                'fields' => 'geometry,icon',
            ],
            $parameters->toArray(),
        );
    }

    public function test_empty_array_parameters_are_ignored(): void
    {
        $paramsArray = [
            'language' => '',
            'region' => '',
            'sessiontoken' => '',
            'fields' => [],
        ];
        $parameters = OptionalParameters::fromArray($paramsArray);

        $this->assertSame([], $parameters->toArray());
    }

    public function test_empty_arguments_parameters_are_ignored(): void
    {
        $parameters = OptionalParameters::fromArguments(
            '',
            '',
            '',
            [],
        );

        $this->assertSame([], $parameters->toArray());
    }
}
