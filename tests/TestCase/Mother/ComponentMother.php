<?php

declare(strict_types=1);

namespace GPlacesPhp\ApiClient\Tests\TestCase\Mother;

use GPlacesPhp\ApiClient\Client\PlaceDetails\AddressComponents\Component;

final class ComponentMother
{
    use RandomElementTrait;

    private const COMPONENTS_DATA = [
        [
            'long_name' => '5',
            'short_name' => '5',
            'types' => ['floor'],
        ],
        [
            'long_name' => '48',
            'short_name' => '48',
            'types' => ['street_number'],
        ],
        [
            'long_name' => 'Pirrama Road',
            'short_name' => 'Pirrama Rd',
            'types' => ['route'],
        ],
        [
            'long_name' => 'Pyrmont',
            'short_name' => 'Pyrmont',
            'types' => ['locality', 'political'],
        ],
        [
            'long_name' => 'Council of the City of Sydney',
            'short_name' => 'Sydney',
            'types' => ['administrative_area_level_2', 'political'],
        ],
        [
            'long_name' => 'New South Wales',
            'short_name' => 'NSW',
            'types' => ['administrative_area_level_1', 'political'],
        ],
        [
            'long_name' => 'Australia',
            'short_name' => 'AU',
            'types' => ['country', 'political'],
        ],
        [
            'long_name' => '2009',
            'short_name' => '2009',
            'types' => ['postal_code'],
        ],
    ];

    public static function random(): Component
    {
        $componentData = self::randomElement(self::COMPONENTS_DATA);

        return Component::fromArray($componentData);
    }

    public static function withData(
        string $longName,
        string $shortName,
        string ...$types,
    ): Component {
        return Component::fromArray(
            [
                'long_name' => $longName,
                'short_name' => $shortName,
                'types' => $types,
            ],
        );
    }
}
