<?php

declare(strict_types=1);

namespace GPlacesPhp\ApiClient\Tests\TestCase\Mother;

use GPlacesPhp\ApiClient\Client\Geometry\Location;

final class LocationMother
{
    public static function random(): Location
    {
        $randomLat = \random_int(-89, 89) + (\mt_rand() / \mt_getrandmax());
        $randomLng = \random_int(-179, 179) + (\mt_rand() / \mt_getrandmax());

        return self::withValues($randomLat, $randomLng);
    }

    public static function withValues(float $lat, float $lng): Location
    {
        return Location::fromArray(
            [
                'lat' => $lat,
                'lng' => $lng,
            ]
        );
    }
}
