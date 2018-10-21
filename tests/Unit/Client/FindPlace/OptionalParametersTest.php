<?php

declare(strict_types=1);

namespace GPlacesPhp\ApiClient\Tests\Unit\Client\FindPlace;

use GPlacesPhp\ApiClient\Client\FindPlace\OptionalParameters;
use PHPUnit\Framework\TestCase;

final class OptionalParametersTest extends TestCase
{
    /** @test */
    public function parameters_can_be_constructed_from_array(): void
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
            $parameters->toArray()
        );
    }

    /** @test */
    public function parameters_can_be_constructed_from_arguments(): void
    {
        $parameters = OptionalParameters::fromArguments('en', ['geometry', 'icon']);

        $this->assertSame(
            [
                'language' => 'en',
                'fields' => 'geometry,icon',
            ],
            $parameters->toArray()
        );
    }

    /** @test */
    public function empty_array_parameters_are_ignored(): void
    {
        $paramsArray = [
            'language' => '',
            'fields' => [],
        ];
        $parameters = OptionalParameters::fromArray($paramsArray);

        $this->assertSame([], $parameters->toArray());
    }

    /** @test */
    public function empty_arguments_parameters_are_ignored(): void
    {
        $parameters = OptionalParameters::fromArguments('', []);

        $this->assertSame([], $parameters->toArray());
    }
}
