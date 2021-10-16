<?php

declare(strict_types=1);

namespace GPlacesPhp\ApiClient\Tests\Unit\Client\PlaceDetails\AddressComponents;

use GPlacesPhp\ApiClient\Tests\TestCase\Mother\ComponentMother;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
final class ComponentTest extends TestCase
{
    public function test_component_can_be_created_from_array(): void
    {
        $component = ComponentMother::withData(
            'Poland',
            'PL',
            ...['country', 'political'],
        );

        $this->assertSame('PL', $component->shortName());
        $this->assertSame('Poland', $component->longName());
        $this->assertSame(['country', 'political'], $component->types());
    }

    public function test_component_can_be_represented_as_array(): void
    {
        $component = ComponentMother::withData(
            'Poland',
            'PL',
            ...['country', 'political'],
        );

        $this->assertSame(
            [
                'long_name' => 'Poland',
                'short_name' => 'PL',
                'types' => ['country', 'political'],
            ],
            $component->toArray(),
        );
    }
}
