<?php

declare(strict_types=1);

namespace GPlacesPhp\ApiClient\Tests\Unit\Client\PlaceDetails;

use GPlacesPhp\ApiClient\Client\PlaceDetails\AddressComponents;
use GPlacesPhp\ApiClient\Tests\TestCase\Mother\ComponentMother;
use PHPUnit\Framework\TestCase;

final class AddressComponentsTest extends TestCase
{
    /** @test */
    public function components_can_be_created_from_array(): void
    {
        $randomComponents = [
            ComponentMother::random(),
            ComponentMother::random(),
        ];

        $addressComponents = AddressComponents::fromArray(
            \array_map(
                function (AddressComponents\Component $component): array {
                    return $component->toArray();
                },
                $randomComponents
            )
        );

        $components = $addressComponents->components();

        $this->assertEquals($randomComponents, $components);
    }

    public function components_can_be_converted_to_array(): void
    {
        $randomComponents = [
            ComponentMother::random()->toArray(),
            ComponentMother::random()->toArray(),
            ComponentMother::random()->toArray(),
        ];

        $addressComponents = AddressComponents::fromArray($randomComponents);

        $components = $addressComponents->toArray();

        $this->assertEquals($randomComponents, $components);
    }
}
