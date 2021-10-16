<?php

declare(strict_types=1);

namespace GPlacesPhp\ApiClient\Tests\Unit\Client\FindPlace;

use GPlacesPhp\ApiClient\Client\FindPlace\OptionalParameters;
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
            'fields' => [
                'place_id',
                'id',
            ],
        ];
        $parameters = OptionalParameters::fromArray($paramsArray);

        $this->assertSame(
            [
                'language' => 'pl',
                'fields' => 'place_id,id',
            ],
            $parameters->toArray(),
        );
    }

    public function test_parameters_can_be_constructed_from_arguments(): void
    {
        $parameters = OptionalParameters::fromArguments('en', ['geometry', 'icon']);

        $this->assertSame(
            [
                'language' => 'en',
                'fields' => 'geometry,icon',
            ],
            $parameters->toArray(),
        );
    }

    public function test_empty_array_parameters_are_ignored(): void
    {
        $paramsArray = [
            'language' => '',
            'fields' => [],
        ];
        $parameters = OptionalParameters::fromArray($paramsArray);

        $this->assertSame([], $parameters->toArray());
    }

    public function test_empty_arguments_parameters_are_ignored(): void
    {
        $parameters = OptionalParameters::fromArguments('', []);

        $this->assertSame([], $parameters->toArray());
    }
}
