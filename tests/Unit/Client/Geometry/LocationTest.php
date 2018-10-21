<?php

declare(strict_types=1);

namespace GPlacesPhp\ApiClient\Tests\Unit\Client\Geometry;

use GPlacesPhp\ApiClient\Tests\TestCase\Mother\LocationMother;
use PHPUnit\Framework\TestCase;

final class LocationTest extends TestCase
{
    /** @test */
    public function location_can_be_created_from_array(): void
    {
        $lat = 21.43242;
        $lng = 52.43243;
        $location = LocationMother::withValues($lat, $lng);

        $this->assertSame($lat, $location->latitude());
        $this->assertSame($lng, $location->longitude());
    }

    /** @test */
    public function location_can_be_converted_to_array(): void
    {
        $lat = 21.43242;
        $lng = 52.43243;
        $data = [
            'lat' => $lat,
            'lng' => $lng,
        ];
        $location = LocationMother::withValues($lat, $lng);

        $this->assertSame($data, $location->toArray());
    }
}
