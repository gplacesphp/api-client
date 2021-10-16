<?php

declare(strict_types=1);

namespace GPlacesPhp\ApiClient\Tests\Unit\Client;

use GPlacesPhp\ApiClient\Client\Geometry;
use GPlacesPhp\ApiClient\Tests\TestCase\Mother\LocationMother;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
final class GeometryTest extends TestCase
{
    public function test_geometry_can_be_created_from_array(): void
    {
        $location = LocationMother::random();
        $viewportSouthWest = LocationMother::random();
        $viewportNorthEast = LocationMother::random();

        $geometry = Geometry::fromArray(
            [
                'location' => $location->toArray(),
                'viewport' => [
                    'northeast' => $viewportNorthEast->toArray(),
                    'southwest' => $viewportSouthWest->toArray(),
                ],
            ],
        );

        $viewport = $geometry->viewport();

        $this->assertEquals($location, $geometry->location());
        $this->assertEquals($viewportSouthWest, $viewport->southwest());
        $this->assertEquals($viewportNorthEast, $viewport->northeast());
    }
}
